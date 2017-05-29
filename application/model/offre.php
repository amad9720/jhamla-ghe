<?php

class Offre extends Db_object
{
    public $id;
    public $date;
    public $detail;
    public $prix;
    public $titre;

    protected static $db_table = "offre"; 
    protected static $db_table_fields = array("id", "date", "detail", "prix", "titre");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }
//trouver toutes les offres
    public static function get_offres(){
        $offres = Offre::find_all();

        return $offres;

    }
    
    // trouver une offre grace à son id
    public static function get_offre($id_offre){
        $offre = Offre::find_by_id($id_offre);

        return array_unshift($offre);
    }

    public function update_offre(){
        //verif l'existance de l'offre 
        if ($this->id){
            $this->update();
        }
    }

        public function add_offre() {
        if (empty($this->id) /*&& !empty($this->id_client)*/ )
            return $this->create() ? true : false;
        else
            return false;
    }


}