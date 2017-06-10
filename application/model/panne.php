<?php

/**
 * Created by PhpStorm.
 * User: johannaprevost
 * Date: 02/06/2017
 * Time: 11:22
 */
class Panne extends Db_object
{
    public $id;
    public $titre;
    public $contenu;
    public $id_client;

    public $nom;
    public $prenom;

    protected static $db_table = "panne";
    protected static $db_table_fields = array("id", "titre", "contenu","id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {

    }

    public static function find_all_pannes()
    {
        $pannes = Panne::find_all();

        foreach ($pannes as $panne) {
            $panne->nom = $panne->find_client()->nom;
            $panne->prenom = $panne->find_client()->prenom;

        }

        return $pannes;
    }

    public function find_client() {
        $sql = "SELECT *
                FROM utilisateur
                WHERE utilisateur.id = '{$this->id_client}'
                LIMIT 1 ";
        $result = self::find_by_query($sql);
        return array_shift($result);
    }

}