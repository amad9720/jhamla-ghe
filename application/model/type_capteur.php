<?php

class TypeCapteur extends Db_object
{
    public $id;
    public $type;

    protected static $db_table = "type_capteurs"; 
    protected static $db_table_fields = array("id", "type");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}