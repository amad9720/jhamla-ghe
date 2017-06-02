<?php

class Technicien extends Db_object
{
    public $id;
    public $nom;
    public $prenom;
    public $localisation;
    public $telephone;
    public $id_utilisateur;

    protected static $db_table = "technicien"; 
    protected static $db_table_fields = array("nom", "prenom", "localisation", "telephone", "id_utilisateur");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }
    
    
    public static function show_techniciens(){
        $results = self::find_all();

        return $results;
    }
    
     
    public function add_technicians(){

        $sql = "SELECT * FROM technicien WHERE nom = {$this->nom} AND prenom = {$this->prenom}";
        $results = self::find_by_query($sql);

        if(empty($results)){
            $this->create();
            return true;
        }
        else return false;
        
    }
       

}
