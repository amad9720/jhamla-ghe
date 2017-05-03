<?php

class Mission extends Db_object
{
    public $id;
    public $date_debut;
    public $date_fin;
    public $etat;
    public $motif;
    public $id_technicien;
    public $id_client;


    protected static $db_table = "mission"; 
    protected static $db_table_fields = array("id", "date_debut", "date_fin", "etat", "motif", "id_technicien", "id_client");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

}