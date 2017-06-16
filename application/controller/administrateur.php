<?php

/**
 * Class Administrateur
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/fr/language.oop5.decon.php'
 *
 */
class Administrateur extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://egghome/administrateur/index (which is the default page)
     */
    public function index()
    {

        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $session->role != ADMIN) header("Location: " . URL . "problem/");

        // // load a models
        
        // // load views
         
        header("Location: " . URL . "administrateur/save_client");

    }
    

    public function save_client()
    {
        global $database;
        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $session->role != ADMIN) header("Location: " . URL . "problem/");

        //loadModels
        //utilisateur
        $this->loadModel('Utilisateur');
        
        //Role
        $this->loadModel('Role');
        $roles = Role::find_all();

        //Offre
        $this->loadModel('Offre');
        $offres = Offre::find_all();

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/administrateur/includes/sidebar.php';
        require APP . 'view/administrateur/save_client.php';
        require APP . 'view/_templates/footer.php';

        //code to manage the actions
        if (isset($_POST['create_user'])) {

            $user = new Utilisateur();

            $user->nom = htmlentities($_POST['user_nom']);
            $user->prenom = htmlentities($_POST['user_prenom']);
            $user->set_file($_FILES['user_image']);
            $user->adresse = htmlentities($_POST['user_address']);
            $user->nom_utilisateur = htmlentities($_POST['user_username']);
            $user->mdp = $database->crypter($_POST['user_password']);
            $user->ville = htmlentities($_POST['user_ville']);
            $user->pays = htmlentities($_POST['user_pays']);
            $user->id_offre = $_POST['user_offre'];
            $user->id_role = $_POST['user_role'];
            $user->email = htmlentities($_POST['user_email']);

            $user->save_user_and_image();


            header("Location: " . URL . "administrateur/save_client");
            
        }
        
    }

    public function add_pages()
    {

        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $session->role != ADMIN) header("Location: " . URL . "problem/");

        //loadModels
        //Page
        $this->loadModel('Page');
        $pages = Page::get_all_page();

        require APP . 'view/_templates/head.php';
        require APP . 'view/administrateur/includes/sidebar.php';
        require APP . 'view/administrateur/add_pages.php';
        require APP . 'view/_templates/footer.php';

         if (isset($_POST['create_content'])) {

            $page = Page::find_by_id($_POST['nom_contenu']);
            $page->titre = htmlentities($_POST['title']);
            $page->contenu = htmlentities($_POST['content']);
            
            $page->update();

            header("Location: " . URL . "administrateur/add_pages");
            
        }
        if (isset($_POST['delete_name'])) {

            $page = Page::find_by_id($_POST['nom_contenu']);
            $page->delete();

            header("Location: " . URL . "administrateur/add_pages");

        }

        if (isset($_POST['create_name'])) {

            $page = new Page();
            $page->nom = $_POST['nom_page'];
            $page->create();

            header("Location: " . URL . "administrateur/add_pages");

        }

    }

    public function save_capteurs(){

        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $session->role != ADMIN) header("Location: " . URL . "problem/");

        //loadModels

        //Page
        $this->loadModel('TypeCapteur');
        $capteurs = TypeCapteur::find_all();

        //Role
        $this->loadModel('Role');
        $roles = Role::find_all();

        require APP . 'view/_templates/head.php';
        require APP . 'view/administrateur/includes/sidebar.php';
        require APP . 'view/administrateur/gestion_capteur.php';
        require APP . 'view/_templates/footer.php';

        if (isset($_POST['delete_capteur'])) {

            $capteur = TypeCapteur::find_by_id($_POST['type_capteurs']);
            $capteur->delete();

            header("Location: " . URL . "administrateur/save_capteurs");

        }

        if (isset($_POST['add_capteur'])) {

            $capteur = new TypeCapteur();
            $capteur->type = $_POST['nom_du_capteur'];
            $capteur->create();

            header("Location: " . URL . "administrateur/save_capteurs");

        }

        if (isset($_POST['add_role'])) {

            $role = new Role();
            $role->role = htmlentities($_POST['nom_du_role']);
            $role->create();

            header("Location: " . URL . "administrateur/save_capteurs");

        }

        if (isset($_POST['delete_role'])) {

            $role = Role::find_by_id($_POST['type_role']);
            $role->delete();

            header("Location: " . URL . "administrateur/save_capteurs");

        }



    }

    public function gestion_nouveaute() {
        require APP . 'core/modelform.php';
        
        $this->loadModel('Nouveaute');
        $nouveautes = new Nouveaute();
        $n = $nouveautes->get_last_nouveautes(10, 0);

        require APP . 'view/_templates/head.php';
        require APP . 'view/administrateur/includes/sidebar.php';
        require APP . 'view/administrateur/gestion_nouveaute.php';
        require APP . 'view/_templates/footer.php';

        if (isset($_POST['titre'])) {
            $nouveaute = new Nouveaute();
            $nouveaute->titre = htmlspecialchars($_POST['titre']);
            $nouveaute->description = $_POST['description'];
            $nouveaute->slider_id = htmlspecialchars($_POST['slider_id']);
            $nouveaute->date = date("Y-m-d H:i:s");
            $nouveaute->set_file($_FILES['image']);
            $nouveaute->save_nouveaute_and_image();

        }
    }
}