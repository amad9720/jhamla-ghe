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

    
    public static function fetch_process_missions_technicien($id_technicien) { /* show missions of selectionned technician which are not finished yet*/
        $sql = "SELECT * FROM mission WHERE date_fin = NULL AND id_technicien = {$id_technicien}"; 
        $results = self::find_by_query($sql); 

        return $results;
    }

    
    public static function fetch_process_missions_client($id_client) { /* show missions of selectionned client which are not finished yet*/

        $sql = "SELECT * FROM mission WHERE date_fin = NULL AND id_client = {$id_client}"; 
        $results = self::find_by_query($sql);

        return $results;
    }
    
    public static function fetch_end_missions_technicien($id_technicien) { /* show missions of selectionned technician which are finished*/

        $sql = "SELECT * FROM mission WHERE date_fin != NULL AND id_technicien = {$id_technicien}";
        $results = self::find_by_query($sql);

        return $results;
    }

    public static function fetch_end_missions_client($id_client) { /* show missions of selectionned client which are finished*/

        $sql = "SELECT * FROM mission WHERE date_fin != NULL AND id_client = {$id_client}";
        $results = self::find_by_query($sql);

        return $results;
    }
    
      
    public function add_new_mission($id_technicien,$post_client,$post_date,$post_motif){ /* allows to add a new mission to a technician*/
        $this->id_client = Utilisateur::find_by_name($post_client);	
        $this->date_debut = $_POST['date'];
        $this->motif = $_POST['motif'];
        $this->etat ="Non Fini";
        return this->create();
    }
    
    public function set_end_mission() { 
        $this->etat = $Fini;
        return $this->update(); 
   }
}
