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

}