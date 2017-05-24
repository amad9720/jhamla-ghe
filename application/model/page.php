<?php

class Page extends Db_object
{
    public $id;
    public $titre;
    public $contenu;

    protected static $db_table = "page"; 
    protected static $db_table_fields = array("titre", "contenu");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    function get_page_by_title($titre){
        $sql="SELECT *
              FROM page p
              WHERE p.titre='{$titre}'
              LIMIT 1 ";
        $result = self::find_by_query($sql);

        return $result;
    }
    
}