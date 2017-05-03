<?php

class Donnee extends Db_object
{
    public $id;
    public $date;
    public $valeur;
    public $id_capteur;

    protected static $db_table = "donnee"; 
    protected static $db_table_fields = array("id", "date", "valeur", "id_capteur");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}