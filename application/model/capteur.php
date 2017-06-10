

<?php

class Capteur extends Db_object
{
    public $id;
    public $etat;
    public $id_piece;
    public $id_type;
    public $favoris;

    // add others attributes for the JOIN
    public $type;
    public $date;
    public $valeur;
    public $piece;

    protected static $db_table = "capteur"; 
    protected static $db_table_fields = array("etat", "id_piece", "id_type", "favoris");
    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public static function find_all_capteur() {

        $capteurs = Capteur::find_all();

        foreach ($capteurs as $capteur) {
            $capteur->type = $capteur->find_type_capteur()->type;
            $capteur->valeur = $capteur->find_donnee()->valeur;
            $capteur->date = $capteur->find_donnee()->date;
            if ($room = $capteur->find_capteur_room($capteur->id_piece))
                $capteur->piece = $room->nom;
            else $capteur->piece = "PAS DE PIECE";
        }

        return $capteurs;
    }

    /**
     * Find only one data row for the capteur, later on we have to make another function to fetch all the data related to one capteur
     * @return [Donne] [one object of the Donnee class]
     */
    public function find_type_capteur() {
        $sql = "SELECT *
                FROM type_capteurs t
                WHERE t.id = '{$this->id_type}'
                LIMIT 1 ";
        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);
        return array_shift($result);
    }

    /**
     * Find only one data row for the capteur, later on we have to make another function to fetch all the data related to one capteur
     * @return [Donne] [one object of the Donnee class]
     */
    public function find_donnee() {
        $sql = "SELECT *
                FROM donnee d
                WHERE d.id_capteur = '{$this->id}'
                LIMIT 1 ";
        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);
        return array_shift($result);
    }

    /**
     * Find the room of the capteur
     * @return [Piece] [one object of the Piece class]
     */
    public function find_capteur_room() {
        if ($this->id_piece) {
            $sql = "SELECT *
                    FROM piece p
                    WHERE p.id = '{$this->id_piece}'
                    LIMIT 1 ";
            $result = self::find_by_query($sql);
            return array_shift($result);
        }
        return false;
    }

    /**
     * remove_capteur_to_room removes a capteur from a room by setting it's id_capteur to NULL (if not working we will try to have a row specialy for capteurs without room)]
     * @return [type] [description]
     */
    public function remove_capteur_to_room() {
        $this->id_piece = -1;
            return $this->update();
    }

    /**
     * Add an already existing capteur to a room (just by changing it's id_piece)
     * @param [int] $id_piece [the id of the room]
     */
    public function add_capteur_to_room($id_piece) {
        
        $this->id_piece = $id_piece;
        return $this->update();
    }

    public static function get_room_capteurs($id_piece) {
        $sql = "SELECT *
                FROM capteur c
                WHERE c.id_piece = '{$id_piece}' ";

        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $results = self::find_by_query($sql);

        foreach ($results as $result) {
            $result->type = $result->find_type_capteur()->type;
            $result->valeur = $result->find_donnee()->valeur;
            $result->date = $result->find_donnee()->date;
            $result->piece = $result->find_capteur_room($result->id_piece)->nom;
        }

        return $results;
    }

    /**
     * add_new_capteur description Adds a new capteur which are not in a room
     * @return [type] [description]
     */
    public function add_new_capteur($id_piece, $id_type) {

        if (empty($this->id)) {

            $this->etat = 0;
            $this->id_piece = $id_piece;
            $this->id_type = $id_type;

            return $this->create();
        }
        else return false;
    }
    
    /**
     * remove_capteur Removes a Capteur and all it's data
     * @return [type] [description]
     */
    public function remove_capteur() {
        
        //find and delete all the data related to this capteur
        $donnee_to_delete = $this->find_donnee();
        $donnee_to_delete->delete();

        //then delete the capteur
        $this->delete();
    }

    /**
     * Change the state of a capteur to ON if OFF
     * @return [type] [description]
     */
    public function activer_capteur() {

            $this->etat = 1;
            $this->update();
    }
    /**
     * Change the state of a capteur to OFF if ON
     * @return [type] [description]
     */
    public function desactiver_capteur() {
        
            $this->etat = 0;
            $this->update();
    }

    public static function capteur_switch($id_capteur) {
        $capteur = Capteur::find_by_id($id_capteur);

        if ($capteur->etat === 0) $capteur->etat = 1;
        else $capteur->etat = 0;

        $capteur->update();
    }

    public function capteur_switch_favoris($id_capteur) {

        if ($this->favoris === 0) $this->favoris = 1;
        else $this->favoris = 0;

        $this->update();
    }

    public static function get_capteurs_favoris() {
        $sql = "SELECT * 
                FROM capteur c 
                WHERE c.favori = 1";

        $capteurs = self::find_by_query($sql);

        foreach ($capteurs as $capteur) {

            $capteur->type = $capteur->find_type_capteur()->type;
            $capteur->valeur = $capteur->find_donnee()->valeur;
            $capteur->date = $capteur->find_donnee()->date;

            if ($room = $capteur->find_capteur_room($capteur->id_piece))
                $capteur->piece = $room->nom;
            else $capteur->piece = "PAS DE PIECE";
        }

        return $capteurs;
    }
}


