<?php

class Utilisateur extends Db_object
{
    public $id;
    public $nom;
    public $prenom;
    public $photo;
    public $adresse;
    public $type;
    public $nom_utilisateur;
    public $mdp;
    public $ville;
    public $pays;
    public $id_offre;
    public $id_role;
    public $email;

    public $image_placeholder = "http://placehold.it/400x400&text=image";

    protected static $db_table = "utilisateur"; 
    protected static $db_table_fields = array("id", "nom", "prenom", "photo", "adresse", "type", "nom_utilisateur", "mdp", "ville", "pays", "id_offre", "id_role", "email");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    /**
     * manage the userImage, if the user has an image it load it or else it load an image placefolder from the placehold.it web site
     * @return [type] [description]
     */
    public function image_placeholder_default() {
        return empty($this->photo) ? $this->image_placeholder : $this->upload_directory. '/' .$this->photo;
    }

     public static function show_users(){
        $results = self::find_all();
        return $results;
    }
    
    public static function add_users(){
        $sql = "SELECT * FROM Technicien WHERE nom={$this->nom} AND prenom={$this->prenom} AND adresse = {$this->adresse} GROUP BY ville HAVING ville = {$this-> ville}";
        $results = self::find_by_query($sql);
        if(empty($results)){
            $this->create();
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * check if a user is existant in the db and return it, if not return NULL
     * @param  [type] $nom_utilisateur [description]
     * @param  [type] $mdp             [description]
     * @return [type]                  [description]
     */
    static public function verify_user($nom_utilisateur, $mdp) {
        global $database;

        $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur = '{$nom_utilisateur}' AND mdp = '{$mdp}' LIMIT 1 ";

        $user = self::find_by_query($sql);
        return $user = (!empty($user)) ? array_shift($user) : $user; //see find_user_by_id() method...
    }

    /**
     * [save_user_and_image description]
     * @return [type] [description]
     */
    public function save_user_and_image() {


        if(!empty($this->errors)) return false;

        if(empty($this->photo) || empty($this->tmp_path)) {
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = URL . '/' . $this->upload_directory . '/';

        
        $target_path_file = URL . '/' . $this->upload_directory . '/' . $this->photo;

        if (file_exists($target_path_file)) {
            $this->errors[] = "the file {$this->photo} already exists";
            return false;
        }

        if(move_uploaded_file($this->tmp_path, $target_path_file)){

            if ($this->create()) {

                unset($this->tmp_path);
                return true;

            }
        }else 
            $this->errors[] = "the folder probably does not allow permission to write.. moving unsuccessful";
    }
    
}
