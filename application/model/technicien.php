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
    protected static $db_table_fields = array("id", "nom", "prenom", "localisation", "telephone", "id_utilisateur");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }
    
    
    public static function show_techniciens(){
        $results = Technicien::find_all();
        return $results;
    }
    
    public static function add_technicians(){
        $sql = "SELECT * FROM Technicien WHERE nom={$this->nom} AND prenom={$this->prenom}";
        $results = Technicien::find_by_query($sql);
        if(empty($results)){
            $this->create();
            return true;
        }
        else{
            return false;
        }
    }
       

}
