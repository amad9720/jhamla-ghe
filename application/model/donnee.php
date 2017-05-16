<?php

class Donnee extends Db_object
{
    public $id;
    public $date;
    public $valeur;
    public $id_capteur;

    protected static $db_table = "donnee"; 
    protected static $db_table_fields = array("id", "date", "valeur", "id_capteur");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public static function find_donnee_by_capteur_id($capteur_id) {
        if (!empty($capteur_id)) {
            $sql = "SELECT d.id
                    FROM donnee d
                    WHERE d.id_capteur = '{$capteur_id}'
                    LIMIT 1 ";

            $results = self::find_by_query($sql);
            return array_shift($results)->id;
        }

        return false;
    }

}