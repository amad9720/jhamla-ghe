<?php

class Nouveaute extends Db_object
{
    public $id;
    public $image;
    public $description;

    protected static $db_table = "nouveaute"; 
    protected static $db_table_fields = array("id", "image", "description");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}
