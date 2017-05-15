<?php

class Mission extends Db_object
{
    public $id;
    public $date_debut;
    public $date_fin;
    public $etat;
    public $motif;
    public $id_technicien;
    public $id_client;


    protected static $db_table = "mission"; 
    protected static $db_table_fields = array("id", "date_debut", "date_fin", "etat", "motif", "id_technicien", "id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
       
    }
    
    public static function fetch_missions($id_technicien){
        $sql = "SELECT * FROM mission WHERE date_fin = NULL AND id_technicien = {$id_technicien}";
        $results = Mission::find_by_query($sql);
        return $results;
    }
    
    public static function fetch_end_missions($id_technicien){
        $sql = "SELECT * FROM mission WHERE date_fin != NULL AND id_technicien = {$id_technicien}";
        $results = Mission::find_by_query($sql);
        return $results;
    }
    
    public static function add_missions(){
        $sql = "SELECT id FROM mission WHERE date_fin = NULL AND id_client = {$id_client}";
        $results = Mission::find_by_query($sql);
        if($results==NULL){
            $this->create();
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function finished_missions($date_fin){
        $this->date_fin=$date_fin;
        $this->update();
    }
   
}
