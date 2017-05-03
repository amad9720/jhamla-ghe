<?php

class Utilisateur extends Db_object
{
    public $id;
    public $nom;
    public $prenom;
    public $adresse;
    public $type;
    public $nom_utilisateur;
    public $mdp;
    public $ville;
    public $pays;
    public $id_offre;
    public $id_role;
    public $email;

    protected static $db_table = "utilisateur"; 
    protected static $db_table_fields = array("id", "nom", "prenom", "adresse", "type", "nom_utilisateur", "mdp", "ville", "pays", "id_offre", "id_role", "email");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}