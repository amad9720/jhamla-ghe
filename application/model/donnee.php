<?php

class Donnee extends Db_object
{
    public $id;
    public $date;
    public $valeur;
    public $id_capteur;

    protected static $db_table = "donnee"; 
    protected static $db_table_fields = array( "date", "valeur", "id_capteur");


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

    //========= Integration =========

    // public static function recuperer_trame()
    // {
    //     $ch = curl_init();
    //     curl_setopt(
    //         $ch,
    //         CURLOPT_URL,
    //         "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=008E");
    //     curl_setopt($ch, CURLOPT_HEADER, FALSE);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //     $data = curl_exec($ch);
    //     curl_close($ch);
    //    return($data);
    // }

    // public static function tableau_trame($data)
    // {
    //     $data_tab = str_split($data,33);
    //     return($data_tab);
    // }

    // public static function décoder_trame($trame)
    // {
    //     // décodage avec sscanf
    //     list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    //     $a = $o.$n;
    //     $d = $year.'-'.$month.'-'.$day.' '.$hour.'-'.$min.'-'.$sec;

    //     $array = array("address" => $a, "value" => $v, 'date' =>$d);
    //     return $array;
    // }


    // public static function ajouter_trame_BDD($trames, $date) {
    //     foreach($trames as $trame) {

    //        //  if ($trame["date"] > $date) {
    //             $tramebdd = new Donnee();
    //             $tramebdd->valeur = $trame["value"];
    //             $tramebdd->date = $trame["date"];
    //             $tramebdd->adress = $trame["address"];
    //             $tramebdd->id_capteur = $trame["id_capteur"];

    //             $tramebdd->create();
    //         //}
    //     }

    // }

    // public static function get_date()
    // {
    //     $sql = "SELECT *
    //             FROM donnee d
    //             ORDER BY d.date DESC
    //             LIMIT 1";
    //     $results = self::find_by_query($sql);
    //     return array_shift($results)->date;
    // }

    // public static function getIdAdresse() {
    //     $sql = "SELECT *
    //             FROM capteur c
    //         ";

    //     $results = self::find_by_query($sql);
    //     $ids = array();
    //     $n = 0;

    //     foreach ($results as $result) {
    //         $id = array();
    //         $id['id_capteur'] = $result->id;
    //         $id['adress'] = $result->adress;
    //         $ids[$n] = $id;
    //         $n = $n + 1;
    //     }

    //     return $ids;
    // }

    // public static function setIdTrame($trames, $ids) {
    //     foreach ($trames as $trame) {
    //         foreach ($ids as $id) {
    //             if ($trame->adress == $id[1]) {
    //                 $trame->adress = $id[0];
    //             }
    //         }
    //     }
    //     return $trames;
    // }

}
