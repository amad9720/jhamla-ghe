<?php

class Page extends Db_object
{
    public $id;
    public $nom;
    public $titre;
    public $contenu;

    protected static $db_table = "page";
    protected static $db_table_fields = array("nom", "titre", "contenu");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {

    }

    public static function get_page_par_nom($nom)
    {
        $sql = "SELECT *
              FROM page p
              WHERE p.nom = '{$nom}'
            ";
        $result = self::find_by_query($sql);

        return array_shift($result);
    }

    public static function get_all_page()
    {
        $result = self::find_all();
        return $result;
    }

}