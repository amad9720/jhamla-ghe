<?php

class Mission extends Db_object
{
    public $id;
    public $date;
    public $etat;
    public $motif;
    public $id_technicien;
    public $id_client;

    public $prenom_client;
    public $nom_client;
    public $prenom_technicien;
    public $nom_technicien;


    protected static $db_table = "mission"; 
    protected static $db_table_fields = array("date", "etat", "motif", "id_technicien", "id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
       
    }

    
    public static function fetch_process_missions_technicien($id) { /* show missions of selectionned technician which are not finished yet*/
        $sql = $sql = "SELECT *
                FROM mission
                WHERE mission.id_technicien = '{$id}' AND etat=0";
        $results = self::find_by_query($sql); 

        return $results;
    }

    
    public static function fetch_process_missions_client($id) { /* show missions of selectionned client which are not finished yet*/

        $sql = $sql = "SELECT *
                FROM mission
                WHERE mission.id_client = '{$id}' AND etat=0";
        $results = self::find_by_query($sql);

        return $results;
    }
    
    public static function fetch_end_missions_technicien($id) { /* show missions of selectionned technician which are finished*/

        $sql = "SELECT *
                FROM mission
                WHERE mission.id_technicien = '{$id}' AND etat=1";
        $results = self::find_by_query($sql);

        return $results;
    }

    public static function fetch_end_missions_client($id_client) { /* show missions of selectionned client which are finished*/

        $sql = "SELECT *
                FROM mission
                WHERE mission.id_client = '{$id_client}' AND etat='1'";
        $results = self::find_by_query($sql);

        return $results;
    }
    
      
    public function add_new_mission($id_tech,$post_client,$post_date,$post_motif){ /* allows to add a new mission to a technician*/
        
        $this->id_technicien = $id_tech;
        $this->id_client = $post_client;	
        $this->date_debut = $post_date;
        $this->date_fin = NULL;
        $this->motif = $post_motif;
        $this->etat = 0;

        return $this->create();
    }
    
    public function set_end_mission() { 
        $this->etat = $Fini;
        return $this->update(); 
   }
}
