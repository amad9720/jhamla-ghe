<?php

class Offre extends Db_object
{
    public $id;
    public $date;
    public $detail;
    public $prix;
    public $titre;

    protected static $db_table = "offre"; 
    protected static $db_table_fields = array("id", "date", "detail", "prix", "titre");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}