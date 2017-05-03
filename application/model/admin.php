<?php

class Admin extends Db_object
{
    public $id;
    public $nom_utilisateur;
    public $mdp;

    protected static $db_table = "Administrateur"; 
    protected static $db_table_fields = array("id","nom_utilisateur", "mdp");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public function save_admin() {
        $this->create();
    }

}
