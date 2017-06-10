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
        // load a models
        $this->loadModel("Nouveaute");
        $nouveautes = Nouveaute::find_all();
        $nouveaute_id = Nouveaute::find_by_id(1);

        // echo $nouveaute_id->image;

        // foreach ($nouveautes as $nouveaute) :
        //     echo $nouveaute->image;
        //     echo $nouveaute->filename;
        //     echo $nouveaute->description;
        // endforeach; 

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function offres()
    {
        $this->loadModel("Offre");
        $offres = Offre::get_offres();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/offres.php';
        require APP . 'view/_templates/footer.php';
    }

    public function egghome() {

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/egghome.php';
        require APP . 'view/_templates/footer.php';
    }

    public function connexion() {

        //load models
        //Utilisateur
        $this->loadModel('Utilisateur');
        require APP . 'view/_templates/head.php';
        require APP . 'view/connexion.php';
        require APP . 'view/_templates/footer.php';

        // case 1 : the user is already logged in... and so, he can't access this page
        global $session;
        if ($session->is_signed_in()) header("Location: " . URL . "invite/");

        // case 2 : the user is not logged in, he can access the page to identify via the form
        if (isset($_POST['submit'])) {
            
            //trim — Strip whitespace (or other characters) from the beginning and end of a string (see Dash)
            $username = trim($_POST['username']); 
            $password = trim($_POST['password']);

            $hashFormat = "$2y$10$"; //this is the blowfish type of salt format
            $salt = "iusesomecrazystrings22"; // should be 22 characters long
            $hashF_and_salt = $hashFormat.$salt;
            $randSalt = crypt($password, $hashF_and_salt);

            //This function will check if the user exist in the db... 
            //The result of the checks will be retrned in the $user_found variable (matched or not)
            $user_found = Utilisateur::verify_user($username, $randSalt);

            if ($user_found) {

                $session->login($user_found);

                switch ($session->role) {
                    case 1:
                        header("Location: " . URL . "client/");
                        break;
                    case 2:
                        header("Location: " . URL . "service_client/");
                        break;
                    case 3:
                        header("Location: " . URL . "administrateur/");
                        break;
                    default:
                        header("Location: " . URL . "invite/");
                        break;
                }
                
            } else 
                $info_message = "Unable to login... Check your credentials";

        }else {
            $info_message = "Please, Login";
            $username = "";
            $password = "";
        }
    }

    public function inscription()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/inscription.php';

        if(isset($_POST['create_user'])) {

            $hashFormat = "$2y$10$"; //this is the blowfish type of salt format
            $salt = "iusesomecrazystrings22"; // should be 22 characters long
            $hashF_and_salt = $hashFormat.$salt;
            $randSalt = crypt(trim($_POST['user_password']), $hashF_and_salt);
        
            $user = new Utilisateur();

            $user->nom = htmlentities($_POST['user_nom']);
            $user->prenom = htmlentities($_POST['user_prenom']);
            $user->set_file($_FILES['user_image']);
            $user->adresse = htmlentities($_POST['user_address']);
            $user->nom_utilisateur = htmlentities($_POST['user_username']);
            $user->mdp = $randSalt;
            $user->ville = htmlentities($_POST['user_ville']);
            $user->pays = htmlentities($_POST['user_pays']);
            $user->id_offre = $_POST['user_offre'];
            $user->id_role = $_POST['user_role'];
            $user->email = htmlentities($_POST['user_email']);

            $user->save_user_and_image();

            header("Location: " . URL . "invite/index");
        }
    }
