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

    protected static $db_table = "capteur"; 
    protected static $db_table_fields = array("id", "etat", "id_piece", "id_type");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public function find_type_capteur() {
        global $database;

        $sql = "SELECT t.type
                FROM type_capteurs t
                WHERE t.id = '{$this->id_type}'
                LIMIT 1 ";

        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);

        return $result->type;
    }

    public function find_donnee() {
        global $database;

        $sql = "SELECT d.date, d.valeur
                FROM donnee d
                WHERE d.id_capteur = '{$this->id}'
                LIMIT 1 ";

        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);

        return $result;
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
        if (!empty($this->id))
            return $this->delete();
        return false;
    }

}
