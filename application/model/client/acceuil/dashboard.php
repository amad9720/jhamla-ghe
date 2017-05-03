<?php

class DashboardCl extends Db_object
{
    //placeholder for all the properties (public they should be)

    protected static $db_table = "Dashboard"; //this is the table name for this object 
    protected static $db_table_fields = array(/*here list all these properties as columns in the db*/);


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    //here we will write all the functions to manage the queries and actions related to the "Dashboard" module.

}
