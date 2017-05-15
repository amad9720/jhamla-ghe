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
    
    public function fetch_missions($id_technicien){
        $sql = 
        $missions_en_cours = instanciate('SELECT * FROM mission WHERE date_fin = NULL AND id_technicien = $id_technicien');
        $missions_finies = instanciate(SELECT * FROM mission WHERE date_fin != NULL AND id_technicien = $id_technicien);
    }
    
    public function formulaire(){
        /*return an array with different information : date_debut,motif,nom_client, prenom_client*/
    }
    
    public function add_missions($id_technicien){
        $info = formulaire();
        
        $sql = INSERT INTO mission(id,date_debut,date_fin,etat,motif,id_technicien,id_client) VALUES ('',
        $database->query($sql);
        

}
