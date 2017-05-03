<?php

class DonneeEnergetique extends Db_object
{
    public $id;
    public $valeur;
    public $date;
    public $id_client;

    protected static $db_table = "donnee_energetique"; 
    protected static $db_table_fields = array("id", "valeur", "date", "id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}