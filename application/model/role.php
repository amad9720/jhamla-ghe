<?php

class Role extends Db_object
{
    public $id;
    public $role;

    protected static $db_table = "role"; 
    protected static $db_table_fields = array("id", "role");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}