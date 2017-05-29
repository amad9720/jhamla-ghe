<?php

class Utilisateur extends Db_object
{
    public $id;
    public $nom;
    public $prenom;
    public $photo;
    public $adresse;
    public $nom_utilisateur;
    public $mdp;
    public $ville;
    public $pays;
    public $id_offre;
    public $id_role;
    public $email;
    public $statut;

    public $offre;

    public $image_placeholder = "http://placehold.it/400x400&text=image";

    protected static $db_table = "utilisateur"; 
    protected static $db_table_fields = array("nom", "prenom", "photo", "adresse", "type", "nom_utilisateur", "mdp", "ville","pays", "id_offre", "id_role", "email", "statut");

    public $tmp_path;
    public $upload_directory = "public/img";

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


    /**
     * @return mixed
     */
    public static function find_all_customers() {
        $sql = "SELECT * 
                FROM utilisateur u 
                WHERE u.id_role = 1 
                GROUP BY u.nom";

        $clients = self::find_by_query($sql);

        foreach ($clients as $client) {
            $client->offre= $client->find_offre()->titre;
        }

        return $clients;
    }

    public function find_role() {
        $sql = "SELECT *
                FROM role r
                WHERE r.id = '{$this->id_role}'
                LIMIT 1 ";
        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);
        return array_shift($result);
    }

    public function find_offre() {
        $sql = "SELECT *
                FROM offre o
                WHERE o.id = '{$this->id_offre}'
                LIMIT 1 ";
        // $result contains an array of objects which has properties the columns fetched from the BD by the previous query
        $result = self::find_by_query($sql);
        return array_shift($result);
    }

    
    public static function show_clients(){
        $sql = "SELECT * FROM utilisateur WHERE role=1"; /*vérifier le numéro du role client*/
        $results = self::find_by_query($sql);
        return $results;
    }

    public function add_users(){
        $sql = "SELECT * FROM technicien WHERE nom = {$this->nom} AND prenom = {$this->prenom} AND adresse = {$this->adresse} GROUP BY ville HAVING ville = {$this->ville}";
        $results = self::find_by_query($sql);
        if(empty($results)){
            $this->create();
            return true;
        }
        else{
            return false;
        }
    }
    
    static function find_utilisateur($id_utilisateur)
    {
        $results = self::find_by_id($id_utilisateur);
        return $results;
    }

    // add user to offer

    public function accept_customer()
    {
            if ($this->statut == 0)
                $this->statut = 1;

            return $this->update();
    }



    public function remove_user() {

        //find and delete all the data related to this user
//        $donnee_to_delete = $this->find_donnee();
//        $donnee_to_delete->delete();

        //then delete the user
        $this->delete();
    }

    }

    /**
     * check if a user is existant in the db and return it, if not return NULL
     * @param  [type] $nom_utilisateur [description]
     * @param  [type] $mdp             [description]
     * @return [type]                  [description]
     */
    static public function verify_user($nom_utilisateur, $mdp) {

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

        $target_path = URL . $this->upload_directory;

        
        $target_path_file = ROOT . $this->upload_directory . '/' . $this->photo;
        // $target_path_file = "/Applications/MAMP/htdocs/egghome/public/img/" . $this->photo ;

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

    public function add_offer_to_customer($id_offre) {
        $this->id_offre = $id_offre;
        return $this->update();
    }
}
