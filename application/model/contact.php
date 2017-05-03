<?php

class Contact extends Db_object
{
    public $id;
    public $telephone;
    public $email;

    protected static $db_table = "contact"; 
    protected static $db_table_fields = array("id", "telephone", "email");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}