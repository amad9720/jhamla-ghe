<?php

class Client extends Controller
{

    /**
     * PAGE: index (page d'acceuil)
     * This method handles what happens when you move to http://egghome/client/index (which is the default page)
     */
    public function index()
    {
        //To make sure that only registered users can come to this page
        global $session;
        if (!$session->is_signed_in() && $_SESSION['role'] != CLIENT ) header("Location: " . URL . "problem/");

        // load views
        //require APP . 'view/_templates/header.php';
        $this->loadModel('Nouveaute');
        $this->loadModel('Capteur');
        $this->loadModel('TypeCapteur');
        $this->loadModel('Notification');

        $array_etat = array(1 => "ON", 0 => "OFF");

        //code to manage the actions
        if (isset($_POST['on'])) {


            $capteur_to_on = Capteur::find_by_id($_POST['on']);
            $capteur_to_on->activer_capteur();

            header("Location: " . URL . "client/#card_{$_POST['on']}");

        }

        if (isset($_POST['off'])) {

            $capteur_to_off = Capteur::find_by_id($_POST['off']);
            $capteur_to_off->desactiver_capteur();

            header("Location: " . URL . "client/#card_{$_POST['off']}");
        }


        $nouveautes = new Nouveaute();
        $n = $nouveautes->get_last_nouveautes(10, 0);

        $notifications = Notification::find_client_notification($session->user_id);

        $capteurs = Capteur::get_capteurs_favoris($session->user_id);

        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: gestion capteurs
     * This method handles what happens when you move to http://egghome/client/gestion_capteurs
     */
    public function gestion_capteurs()
    {

        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $_SESSION['role'] != CLIENT ) header("Location: " . URL . "problem/");


        // load models
        //Capteurs
        $this->loadModel('Capteur');
        $capteurs = Capteur::find_capteur_by_client($session->user_id);

        //type_capteurs
        $this->loadModel('TypeCapteur');
        $type_capteurs = TypeCapteur::find_all();

        //pieces
        $this->loadModel('Piece');
        $pieces = Piece::get_room_client($session->user_id);

        //donnee
        $this->loadModel('Donnee');

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/gestion_capteurs.php';
        require APP . 'view/_templates/footer.php';

        //code to manage the actions
        if (isset($_POST['deleteCapteur'])) {
            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {

                    $capteur_to_delete = Capteur::find_by_id($value_id);
                    $capteur_to_delete->remove_capteur();

                }
            }

            header("Location: " . URL . "client/gestion_capteurs");

        }

        if (isset($_POST['favorisCapteur'])) {
            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {

                    $capteur_to_favoris = Capteur::find_by_id($value_id);
                    $capteur_to_favoris->capteur_switch_favoris();

                }
            }

            header("Location: " . URL . "client/gestion_capteurs");

        }

        if (isset($_POST['paramCapteur'])) {

            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {

                    $capteur_to_param = Capteur::find_by_id($value_id);
                    echo $capteur_to_param->id_piece;
                    $capteur_to_param->add_capteur_to_room($_POST['piece']);
                    echo $capteur_to_param->id_piece;
                }
            }

            header("Location: " . URL . "client/gestion_capteurs");

        }

        if (isset($_POST['addCapteur'])) {

            // Save new capteur
            $new_capteur = new Capteur();
            $new_capteur->id_client = $session->user_id;
            $new_capteur->add_new_capteur($_POST['piece'], $_POST['type_capteur']);
            

            //save data for the new capteur
            $new_donnee = new Donnee();
            $new_donnee->create_donnee($_POST['donnee']);

            header("Location: " . URL . "client/gestion_capteurs");

        }
    }

    /**
     * PAGE: ma maison
     * This method handles what happens when you move to http://egghome/client/ma_maison
     */
    public function ma_maison()
    {
        global $session;
        if (!$session->is_signed_in() && $_SESSION['role'] != CLIENT ) header("Location: " . URL . "problem/");

        // loadModels

        //Piece
        $this->loadModel('Piece');


        $pieces_client = Piece::get_room_client($session->user_id);


        //Capteur
        $this->loadModel('Capteur');

        //typeCapteur
        $this->loadModel('TypeCapteur');

        //Donnee
        $this->loadModel('Donnee');

        //========= Integration =========
        //
        //
        // $correspondance = Donnee::getIdAdresse();

        // $trames = Donnee::recuperer_trame(); 
        // $trames_tab = Donnee::tableau_trame($trames);
        // $date = Donnee::get_date();
        // $trames_d = array();
        // $size = count($trames_tab);

        // for ($i = 0; $i < $size; $i++) {
        //     $trame_d = Donnee::décoder_trame($trames_tab[$i]);

        //     if (strstr($trame_d["date"],"2017")){
        //         $trames_d[$i] = $trame_d;
        //     }
        // }

        // $trame_final = array();

        // foreach ($trames_d as $tramescore) {

        //     foreach ($correspondance as $corres) {
        //         if ($tramescore["address"] == $corres["adress"]) {

        //             $tramescore['id_capteur'] = $corres["id_capteur"];
        //             $trame_final[] = $tramescore;
        //             break;
        //         }
        //     }
        // }



        // Donnee::ajouter_trame_BDD($trame_final,$date);


        $array_etat = array(1 => "ON", 0 => "OFF");

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/ma_maison.php';
        require APP . 'view/_templates/footer.php';

        //code to manage the actions
        if (isset($_POST['on'])) {


            $capteur_to_on = Capteur::find_by_id($_POST['on']);
            $capteur_to_on->activer_capteur();

            header("Location: " . URL . "client/ma_maison#card_{$_POST['on']}");

        }

        if (isset($_POST['off'])) {

            $capteur_to_off = Capteur::find_by_id($_POST['off']);
            $capteur_to_off->desactiver_capteur();

            header("Location: " . URL . "client/ma_maison#card_{$_POST['off']}");

        }

        if (isset($_POST['delete_room'])) {

            $room_to_delete = Piece::find_by_id($_POST['delete_room']);
            $room_capteurs = Capteur::get_room_capteurs($room_to_delete->id);

            foreach ($room_capteurs as $room_capteur)
                $room_capteur->remove_capteur_to_room();


            $room_to_delete->remove_room();

            header("Location: " . URL . "client/ma_maison");

        }

        if (isset($_POST['addRoom'])) {

            // Save new room
            $new_room = new Piece();
            $new_room->nom = $_POST['piece'];
            $new_room->id_client = $session->user_id;


            $new_room->add_room();

            header("Location: " . URL . "client/ma_maison");

        }
    }

    /**
     * PAGE: contact
     * This method handles what happens when you move to http://egghome/client/contact
     */

    public function contact()
    {
        global $session;
        if (!$session->is_signed_in() && $_SESSION['role'] != CLIENT ) header("Location: " . URL . "problem/");

        //load Model
        //Page
        $this->loadModel('Page');

        $infos = Page::get_page_par_nom("Informations de contact");

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/contact.php';
    }

    /**
     * PAGE: suivi Energetique
     * This method handles what happens when you move to http://egghome/client/suivi_energetique
     */
    public function suivi_energetique()
    {
        global $session;
        if (!$session->is_signed_in() && $_SESSION['role'] != CLIENT ) header("Location: " . URL . "problem/");

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/suivi_energetique.php';
    }

    /**
     * PAGE: profil
     * This method handles what happens when you move to http://egghome/client/profil
     */
    public function profil() {
        global $database;
        global $session;
        if (!$session->is_signed_in() && $_SESSION['role'] != CLIENT ) header("Location: " . URL . "problem/");

        // load models
        //Mission
        $this->loadModel('Mission');

        $this->loadModel('Technicien');

        $end_missions = Mission::fetch_end_missions_client($session->user_id); /*we take client $session->user_id as an example*/

        $process_missions = Mission::fetch_process_missions_client($session->user_id);

        //Infos personnelles
        $this->loadModel('Utilisateur');
        $client = Utilisateur::find_utilisateur($session->user_id);


        //Factures
        $this->loadModel('Facture');
        $factures = Facture::show_facture($session->user_id);

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/profil.php';
        require APP . 'view/_templates/footer.php';

        //code to manage the actions
        if (isset($_POST['modif_profil'])) {
            $client = Utilisateur::find_utilisateur($session->user_id);
            $client->nom = htmlentities($_POST['nom']);
            $client->prenom = htmlentities($_POST['prenom']);
            $client->email = htmlentities($_POST['email']);
            $client->adresse = htmlentities($_POST['adresse']);
            $client->pays = htmlentities($_POST['pays']);
            $client->ville = htmlentities($_POST['ville']);
            $client->nom_utilisateur = htmlentities($_POST['nom_utilisateur']);
            $client->mdp = $database->crypter(htmlentities($_POST['mdp']));
            // $client->photo = $_POST['photo'];
            $client->update();

        }
    }
}
