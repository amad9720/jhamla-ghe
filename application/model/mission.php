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

    public static function find_all_last_missions() {
        $sql = "SELECT *
                FROM mission m
                WHERE m.etat = 0
                ";

        $results = self::find_by_query($sql);

     

        foreach ($results as $result) {
            $result->nom_client = $result->find_client()->nom;
            $result->prenom_client = $result->find_client()->prenom;
            $result->nom_technicien = $result->find_technicien()->nom;
            $result->prenom_technicien = $result->find_technicien()->prenom;
        }

        return $results;

    }

    public function find_client() {
        $sql = "SELECT *
                FROM utilisateur u
                WHERE u.id = '{$this->id_client}'
                LIMIT 1 ";

        $result = self::find_by_query($sql);
        return array_shift($result);
    }

    public function find_technicien() {
        $sql = "SELECT *
                FROM technicien t
                WHERE t.id = '{$this->id_technicien}'
                LIMIT 1 ";

        $result = self::find_by_query($sql);
        return array_shift($result);
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
                INNER JOIN technicien
                ON mission.id_technicien = technicien.id
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
                INNER JOIN technicien
                ON mission.id_technicien = technicien.id
                WHERE mission.id_client = '{$id_client}' AND etat='1'";
        $results = self::find_by_query($sql);

        return $results;
    }


    public function add_new_mission($id_tech,$post_client,$post_date,$post_motif){ /* allows to add a new mission to a technician*/

        $this->id_technicien = $id_tech;
        $this->id_client = $post_client;	
        $this->date = $post_date;
        $this->motif = $post_motif;
        $this->etat = 0;
        $this->create();
        return $this;
    }


    
    public function set_end_mission() { 
        $this->etat = 1;
        $this->update();
        return $this;  
   }
}

