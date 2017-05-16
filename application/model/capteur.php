<?php

class Capteur extends Db_object
{
    public $id;
    public $etat;
    public $id_piece;
    public $id_type;

    // add others attributes for the JOIN
    public $type;
    public $date;
    public $valeur;
    public $piece;

    protected static $db_table = "capteur"; 
    protected static $db_table_fields = array("etat", "id_piece", "id_type");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public function find_type_capteur() {

        $sql = "SELECT t.type
                FROM type_capteurs t
                WHERE t.id = '{$this->id_type}'
                LIMIT 1 ";

        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);

        return array_shift($result)->type;
    }
    /**
     * Find only one data row for the capteur, later on we have to make another function to fetch all the data related to one capteur
     * @return [Donne] [one object of the Donnee class]
     */
    public function find_donnee() {

        $sql = "SELECT d.date, d.valeur
                FROM donnee d
                WHERE d.id_capteur = '{$this->id}'
                LIMIT 1 ";

        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);

        return array_shift($result);
    }

    public function find_capteur_room() {
        if ($this->id_piece) {
            $sql = "SELECT p.nom
                    FROM piece p
                    WHERE p.id = '{$this->id_piece}'
                    LIMIT 1 ";

            $result = self::find_by_query($sql);

            return array_shift($result)->nom;
        }

        return false;
    }

    public function add_capteur_to_room($id_piece) {
        if ($id_piece) {
            $this->id_piece = $id_piece;
            return $this->update();
        }
        return false;
    }

    public function add_new_capteur() {
        if (empty($this->id))
            return $this->create();
        else return false;
    }

    public function remove_capteur() {

        //find and delete all the data related to this capteur
        $donne_to_delete = $this->find_donnee();
        $donnee_to_delete->delete();

        //then delete the capteur
        $this->delete();
    }

    public function activer_capteur() {

    }

    public function desactiver_capteur() {

    }



}
