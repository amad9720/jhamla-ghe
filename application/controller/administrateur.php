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
    // public function index()
    // {
    //     // load a models
        
    //     // load views
    //     require APP . 'view/_templates/head.php';
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/administrateur/index.php';
    //     require APP . 'view/_templates/footer.php';
    // }
        public function gestion_offre()
    {
        // load a models
        
        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/administrateur/gestion_offre.php';
        require APP . 'view/_templates/footer.php';
    }

    public function save_client()
    {

        //loadModels
        //Role
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

            $user->nom = $_POST['user_nom'];
            $user->prenom = $_POST['user_prenom'];
            $user->set_file($_FILES['user_image']);
            $user->adresse = $_POST['user_address'];
            $user->nom_utilisateur = $_POST['user_username'];
            $user->mdp = $_POST['user_password'];
            $user->ville = $_POST['user_ville'];
            $user->pays = $_POST['user_pays'];
            $user->id_offre = $_POST['user_offre'];
            $user->id_role = $_POST['user_role'];
            $user->email = $_POST['user_email'];

            $user->save_user_and_image();


            header("Location: " . URL . "administrateur/save_client");
            
        }
        
    }

    public function add_pages()
    {
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
            $page->titre = $_POST['title'];
            $page->contenu = $_POST['content'];
            
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

        //loadModels

        //Page
        $this->loadModel('typecapteur');
        $capteurs = typecapteur::get_all_capteurs();

        require APP . 'view/_templates/head.php';
        require APP . 'view/administrateur/includes/sidebar.php';
        require APP . 'view/administrateur/gestion_capteur.php';
        require APP . 'view/_templates/footer.php';

        if (isset($_POST['delete_capteur'])) {

            $capteur = typecapteur::find_by_id($_POST['type_capteurs']);
            $capteur->delete();

            header("Location: " . URL . "administrateur/save_capteurs");

        }

        if (isset($_POST['add_capteur'])) {

            $capteur = new TypeCapteur();
            $capteur->type = $_POST['nom_du_capteur'];
            $capteur->create();

            header("Location: " . URL . "administrateur/save_capteurs");

        }



    }


}