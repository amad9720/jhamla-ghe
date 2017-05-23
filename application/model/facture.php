<?php

class Facture extends Db_object
{
    public $id;
    public $date;
    public $id_client;

    protected static $db_table = "facture"; 
    protected static $db_table_fields = array("id", "date", "id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }
    
    
    public static function show_facture($id_client){

        $sql = "SELECT * FROM facture WHERE id_client={$id_client}"; 
        $results = Facture::find_by_query($sql);
        return $results;
    }


}
