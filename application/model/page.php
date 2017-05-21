<?php

class Page extends Db_object
{
    public $id;
    public $titre;
    public $contenu;

    protected static $db_table = "page"; 
    protected static $db_table_fields = array("titre", "contenu");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    
}