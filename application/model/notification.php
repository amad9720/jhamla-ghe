<?php

class Notification extends Db_object
{
    public $id;
    public $id_client;
    public $contenu;

    protected static $db_table = "notification"; 
    protected static $db_table_fields = array("id", "id_client", "contenu");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}