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
    protected static $db_table_fields = array("date_debut", "date_fin", "etat", "motif", "id_technicien", "id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
       
    }
    
    public static function fetch_process_missions() { /* show missions of selectionned technician which are not finished yet*/
        $sql = "SELECT * FROM mission WHERE date_fin = NULL AND id_technicien = {$this->id_technicien}"; 
        return $results;
    }
    
    public static function fetch_end_missions( { /* show missions of selectionned technician which are finished*/
        $sql = "SELECT * FROM mission WHERE date_fin != NULL AND id_technicien = {$this->id_technicien}";
        $results = Mission::find_by_query($sql);
        return $results;
    }
    
    public static function add_missions(){ /* allows to add a new mission to a technician*/
        $sql = "SELECT id FROM mission WHERE date_fin = NULL AND id_client = {$this->id_client}";
        $results = Mission::find_by_query($sql);
        if(empty($results)){
            $this->create();
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function finished_missions($date_fin) { 
        $this->date_fin=$date_fin;
        $this->update();
   }
}
