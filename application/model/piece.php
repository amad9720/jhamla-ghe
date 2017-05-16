<?php

class Piece extends Db_object
{

    public $id;
    public $nom;
    public $id_client;

    protected static $db_table = "piece"; 
    protected static $db_table_fields = array("id", "nom", "id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public function add_room() {
        if (empty($this->id) /*&& !empty($this->id_client)*/ )
            return $this->create() ? true : false;
        else
            return false;
    }

    public function remove_room() {
        if(!empty($this->id)){

            // remove the capteurs of the room first
            $capteurs_room = $this->get_room_capteurs();
            foreach ($capteurs_room as $capteur) {
                $capteur->remove_capteur();
            }


            return $this->delete();
        } else return false;
    }

    public function get_room_capteurs() {
        $sql = "SELECT *
                FROM capteur c
                WHERE c.id_piece = '{$this->id}' ";

        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);

        return $result;
    }

    public static function get_room_client($id_client) { //$id_client sera defini par rapport a la session ici (du coup a l'id du client connecte)
        $sql = "SELECT * 
                FROM capteur c
                WHERE c.id_client = '{$id_client}' ";

        $result = self::find_by_query($sql);

        return $result;

    }

}