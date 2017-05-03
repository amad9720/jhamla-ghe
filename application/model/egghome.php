<?php

class Egghome extends Db_object
{
    public $id;
    public $presentation;
    public $logo;

    protected static $db_table = "egghome"; 
    protected static $db_table_fields = array("id", "presentation", "logo");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}