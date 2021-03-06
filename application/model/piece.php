<?php

class Piece extends Db_object
{

    public $id;
    public $nom;
    public $id_client;

    protected static $db_table = "piece"; 
    protected static $db_table_fields = array("nom", "id_client");


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

            return $this->delete();
        } else return false;
    }

    
    public static function get_room_client($id_client) { //$id_client sera defini par rapport a la session ici (du coup a l'id du client connecte)
        $sql = "SELECT * 
                FROM piece p
                WHERE p.id_client = '{$id_client}' ";

        $result = self::find_by_query($sql);

        return $result;
    }

}