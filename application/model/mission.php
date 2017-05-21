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

    // ici aussi c'est bien static car tu ne modifie pas une mission specifique mais tu vas chercher des misssions dans la db.
    public static function fetch_process_missions_technicien($id_technicien) { /* show missions of selectionned technician which are not finished yet*/
        $sql = "SELECT * FROM mission WHERE date_fin = NULL AND id_technicien = {$id_technicien}"; 
        //tu a oublie d'envoyer la requete je le corrige en dessous
        $results = self::find_by_query($sql); //plutot utiliser self que le nom de la classe mm si ca marche

        return $results;
    }

    // ici aussi c'est bien static car tu ne modifie pas une mission specifique mais tu vas chercher des misssions dans la db.
    public static function fetch_process_missions_client($id_client) { /* show missions of selectionned client which are not finished yet*/

        $sql = "SELECT * FROM mission WHERE date_fin = NULL AND id_client = {$id_client}"; 
        //tu a oublie d'envoyer la requete je le corrige en dessous
        $results = self::find_by_query($sql);

        return $results;
    }
    
    //celle la peut etre static car tu cherche les mission... tu ne la pas encoe du coup c'est liee a la classe.
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
    
    //elle sont specifique a une mission en particulier pas a la classe mission en generale... pas de static
    //ici tu cree la mission que tu veux ajouter puis tu appel cette fonction sur l'object cree... du coup elle est specifique a la mission elle meme
    public function add_missions(){ /* allows to add a new mission to a technician*/

        $sql = "SELECT id FROM mission WHERE date_fin = NULL AND id_client = {$this->id_client}";
        $results = self::find_by_query($sql);

        if(empty($results)){
            $this->create();
            return true;
        }
        else{
            return false;
        }
    }
    
    //ici aussi c'est pas du static ... tu vas modifier une mission en particulier
    public function set_date_fin($date_fin) { //ce nom de function est plus adapte ... oft les fonction ne sont pas forcement statique dans ce context car tu les appliques a des technicient ou missions deja recupere depuis la db... elle sont specifique a une mission en particulier pas a la classe mission en generale
        $this->date_fin = $date_fin;
        return $this->update(); //c'est bien d'ajouter return pour pouvoir deboguer en cas de problem
   }
}
