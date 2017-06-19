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

    public function create_donnee($value) {
        global $database;

        $this->valeur = $value;
        $this->date = date('Y-m-d H:i:s');
        $this->id_capteur = $database->the_insert_id();
        
        return $this->create();
    }

    public static function recuperer_trame()
    {
        $ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
       return($data);
    }

    public static function tableau_trame($data)
    {
        $data_tab = str_split($data,33);
        return($data_tab);
    }

    public static function décoder_trame($trame)
    {
        // décodage avec sscanf
        return(list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s"));

    }

    public function ajouter_trame_BDD($trame) {
        $this->valeur = $trame->v;
        $this->date = date('Y-m-d H:i:s');
        $this->id_capteur = $trame->n;

        return $this->create();
    }



}
