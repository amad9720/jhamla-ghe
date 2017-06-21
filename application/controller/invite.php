<?php

/**
 * Class Invite
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/fr/language.oop5.decon.php'
 *
 */
class Invite extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://egghome/invite/index (which is the default page)
     */
    public function index()
    {
        global $session;

        // load a models
        $this->loadModel("Nouveaute");
        $nouveautes = Nouveaute::find_all();
        $nouveaute_id = Nouveaute::find_by_id(1);

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/index.php';
        require APP . 'view/_templates/footer.php';
    }


    public function offres()
    {
        global $session;
        
        $this->loadModel("Offre");
        $offres = Offre::get_offres();

        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/offres.php';
        require APP . 'view/_templates/footer.php';
    }

    public function egghome()
    {

        global $session;

        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/egghome.php';
        require APP . 'view/_templates/footer.php';
    }

	public function contact() {

        global $session;

        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/contact.php';
        require APP . 'view/_templates/footer.php';
    }


    public function connexion() {
        global $database;
        global $session;

        //load models
        //Utilisateur
        $this->loadModel('Utilisateur');

        require APP . 'view/_templates/head.php';
        require APP . 'view/invite/connexion.php';
        require APP . 'view/_templates/footer.php';

        // case 1 : the user is already logged in... and so, he can't access this page
        global $session;
        if ($session->is_signed_in()) header("Location: " . URL . "invite/");

        // case 2 : the user is not logged in, he can access the page to identify via the form
        if (isset($_POST['submit']) && ($_POST['user_password'] != "") && ($_POST['user_email'] != "")) {
            
            //trim — Strip whitespace (or other characters) from the beginning and end of a string (see Dash)
            $email = trim($_POST['user_email']); 
            $password = $database->crypter($_POST['user_password']);

            //This function will check if the user exist in the db... 
            //The result of the checks will be retrned in the $user_found variable (matched or not)
            $user_found = Utilisateur::verify_user($email, $password);
            
            if ($user_found) {

                $session->login($user_found);

                switch ($session->role) {
                    case CLIENT:
                        header("Location: " . URL . "client/");
                        break;
                    case SERVICE_CLIENT:
                        header("Location: " . URL . "service_client/");
                        break;
                    case ADMIN:
                        header("Location: " . URL . "administrateur/");
                        break;
                    default:
                        header("Location: " . URL . "invite/");
                        break;
                }
                
            } else 
                echo $session->message = "Unable to login... Check your credentials";
        }else {
            echo $session->message = "Please, Login";
            $email = "";
            $password = "";
        }
    }

    public function deconnexion() {
        global $session;

        if (isset($_GET['deconnect'])) {
            $session->logout();
            $session->message = "Vous etes deconnecté" ;
            header("Location: " . URL . "invite/");
        }
    }

    public function inscription()
    {

        global $database;
        global $session;

        //loadModels
        //utilisateur
        $this->loadModel('Utilisateur');

        //Offre
        $this->loadModel('Offre');
        $offres = Offre::find_all();

        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/inscription.php';
        require APP . 'view/_templates/footer.php';

        if(isset($_POST['create_user'])) {
        
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
            $user->id_role = CLIENT;
            $user->statut = 0;
            $user->email = htmlentities($_POST['user_email']);

            $user->save_user_and_image();

            //header("Location: " . URL . "invite/index");
        }
    }
}
