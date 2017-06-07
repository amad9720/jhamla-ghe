<?php

class Client extends Controller {

    /**
     * PAGE: index (page d'acceuil)
     * This method handles what happens when you move to http://egghome/client/index (which is the default page)
     */
    public function index(){

        // load views
        //require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/index.php';
    }
    
    /**
     * PAGE: gestion capteurs
     * This method handles what happens when you move to http://egghome/client/gestion_capteurs 
     */
    public function gestion_capteurs() {

        // load models
        //Capteurs
        $this->loadModel('Capteur');
        $capteurs = Capteur::find_all_capteur();

        //type_capteurs
        $this->loadModel('TypeCapteur');
        $type_capteurs = TypeCapteur::find_all();

        //pieces
        $this->loadModel('Piece');
        $pieces = Piece::find_all();

        //donnee
        $this->loadModel('Donnee');

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/gestion_capteurs.php';
        require APP . 'view/_templates/footer.php';

        //code to manage the actions
        if(isset($_POST['deleteCapteur'])) {
            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];
            
                //we are looping around the checkbox array and processing it's values
                foreach($array_id as $value_id ){
                
                    $capteur_to_delete = Capteur::find_by_id($value_id);
                    $capteur_to_delete->remove_capteur(); 

                }
            }

            header("Location: " . URL . "client/gestion_capteurs");

        }

        if (isset($_POST['paramCapteur'])) {

            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];
            
                //we are looping around the checkbox array and processing it's values
                foreach($array_id as $value_id ){
                
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
    public function ma_maison(){

        // loadModels
        
        //Piece
        $this->loadModel('Piece');
        $pieces_client = Piece::get_room_client(2); // pour linstant on urilise le client 2 pour test
        
        //Capteur
        $this->loadModel('Capteur');

        //typeCapteur
        $this->loadModel('TypeCapteur');

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
            $new_room->id_client = 2;

            
            $new_room->add_room();

            header("Location: " . URL . "client/ma_maison");
            
        }

        
    }

    /**
     * PAGE: contact
     * This method handles what happens when you move to http://egghome/client/contact 
     */

    public function contact(){

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/contact.php';
    }

    /**
     * PAGE: suivi Energetique
     * This method handles what happens when you move to http://egghome/client/suivi_energetique 
     */
    public function suivi_energetique() {

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
        
        // load models
        //Mission
        $this->loadModel('Mission');

        $this->loadModel('Technicien');

        $end_missions = Mission::fetch_end_missions_client(2); /*we take client 2 as an example*/

        $process_missions = Mission::fetch_process_missions_client(2);

        //Infos personnelles
        $this->loadModel('Utilisateur');
        $client = Utilisateur::find_utilisateur(2);

     
        //Factures
        $this->loadModel('Facture');
        $factures = Facture::show_facture(2); /*we take client 4 as an example*/

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/profil.php';

        //code to manage the actions
        if (isset($_POST['modif_profil'])) {
            $client = Utilisateur::find_utilisateur(4);
            $client->nom = $_POST['nom'];
            $client->prenom = $_POST['prenom'];
            $client->email = $_POST['email'];
            $client->adresse = $_POST['adresse'];
            $client->pays = $_POST['pays'];
            $client->ville = $_POST['ville'];
            $client->nom_utilisateur = $_POST['nom_utilisateur'];
            $client->mdp = $_POST['mdp'];
            $client->photo = $_POST['photo'];
            $client->update();

        }
    }

    public function inscription()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/inscription.php';
    }
}
