<?php

class Capteur extends Db_object
{
    public $id;
    public $etat;
    public $id_piece;
    public $id_type;

    //add others attributes for the JOIN

    protected static $db_table = "capteur"; 
    protected static $db_table_fields = array("id", "etat", "id_piece", "id_type");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}
