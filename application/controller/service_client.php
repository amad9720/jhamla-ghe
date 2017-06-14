<?php

/**
 * Created by PhpStorm.
 * User: johannaprevost
 * Date: 23/05/2017
 * Time: 11:46
 */

class Service_client extends Controller
{
    public function index()
    {
        // load models
        //Panne
        $this->loadModel('Panne');
        $pannes = Panne::find_all_pannes();

        //Mission
        $this->loadModel('Mission');
        $missions = Mission::find_all_last_missions();

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/service_client/includes/sidebar.php';
        require APP . 'view/service_client/index.php';
        require APP . 'view/_templates/footer.php';

//        $array_id = $_POST['checkBoxArray'];
//        $pannes_select = array();
//        //we are looping around the checkbox array and processing it's values
//        foreach ($array_id as $value_id) {
//            $panne_select = Panne::find_by_id($value_id);
//            $pannes_select[] = $panne_select;
//
//            header("Location: " . URL . "service_client/index");
        //}

    }

    public function gestion_client()
    {
        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $session->role != SERVICE_CLIENT) header("Location: " . URL . "problem/");

        // load models
        //Utilisateur
        $this->loadModel('Utilisateur');
        $clients = Utilisateur::find_all_customers();

        //Offre
        $this->loadModel('Offre');
        $offres = Offre::find_all();

        //Notification
        $this->loadModel('Notification');
        $notifications = Notification::find_all_notifications();

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/service_client/includes/sidebar.php';
        require APP . 'view/service_client/gestion_client.php';
        require APP . 'view/_templates/footer.php';

        //code to manage the actions
        if (isset($_POST['deleteClient'])) {
            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {

                    $client_to_delete = Utilisateur::find_by_id($value_id);
                    $client_to_delete->remove_user();

                }
            }

            header("Location: " . URL . "service_client/gestion_client");

        }

        if (isset($_POST['paramClient'])) {

            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {

                    $client_to_param = Utilisateur::find_by_id($value_id);
                    echo $client_to_param->id_offre;
                    $client_to_param->add_offer_to_customer($_POST['offre']);
                    echo $client_to_param->id_offre;
                }
            }

            header("Location: " . URL . "service_client/gestion_client");

        }

        if (isset($_POST['notificationClient'])) {

            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {
                    $new_notification = new Notification();
                    $new_notification->send_notification($value_id, $_POST['titre'], $_POST['contenu']);
                }

            }

            header("Location: " . URL . "service_client/gestion_client");

        }

        if (isset($_POST['acceptClient'])) {
            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {

                    $client_to_accept = Utilisateur::find_by_id($value_id);
                    $client_to_accept->accept_customer();

                }
            }

            header("Location: " . URL . "service_client/gestion_client");

        }


    }

    public function gestion_technicien()
    {

        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $session->role != SERVICE_CLIENT) header("Location: " . URL . "problem/");

        $this->loadModel('Mission');

        $this->loadModel('Utilisateur');
        $clients = Utilisateur::show_clients();

        $this->loadModel('Technicien');
        $techniciens = Technicien::show_techniciens();

        require APP . 'view/_templates/head.php';
        //require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/service_client/gestion_technicien.php';
        require APP . 'view/_templates/footer.php';
        
        if (isset($_POST['checkBoxArray'])){
            $array_id = $_POST['checkBoxArray'];
            if (isset($_POST['Supprimer'])) {
                foreach ($array_id as $value_id) {
                    $technicien = Technicien::find_by_id($value_id);
                    $technicien->delete();
                }
            }
        }

        if (isset($_POST['Voir'])) header("Location: " . URL . "service_client/technicien/". $_POST['Voir']);
            
        if (isset($_POST['create_tech'])) {
        
            $technicien = new Technicien();
            $technicien->nom = htmlentities(trim($_POST['tech_nom']));
            $technicien->prenom = htmlentities(trim($_POST['tech_prenom']));
            $technicien->telephone = htmlentities(trim($_POST['tech_tel']));
            $technicien->localisation = htmlentities(trim($_POST['tech_localisation']));
            $technicien->create();

            header("Location: " . URL . "service_client/gestion_technicien");

        }

        if (isset($_POST['checkBoxArray'])){
            $array_id = $_POST['checkBoxArray'];

            if (isset($_POST['Profil'])) {
                foreach ($array_id as $value_id) {
                    $techniciens_selected = Technicien::find_by_id($value_id);

                    $end_missions = Mission::fetch_end_missions_technicien($value_id);
                    $process_missions = Mission::fetch_process_missions_technicien($value_id);
                }
            }


            if (isset($_POST['Modifier'])) {
                foreach ($array_id as $value_id) {
                    $technicien = Technicien::find_by_id($value_id);
                    $technicien->nom = htmlentities(trim($_POST['nom']));
                    $technicien->prenom = htmlentities(trim($_POST['prenom']));
                    $technicien->tel = htmlentities(trim($_POST['tel']));
                    $technicien->lieu = htmlentities(trim($_POST['lieu']));
                    $technicien->update();
                }
            }

            if (isset($_POST['Supprimer'])) {
                foreach ($array_id as $value_id) {
                    $technicien = Technicien::find_by_id($value_id);
                    $technicien->delete();
                }
            }

            if (isset($_POST['Add_mission'])) {
                foreach ($array_id as $value_id) {
                    $mission = new Mission();
                    $mission->add_new_mission($value_id, $_POST['id_client'], $_POST['date'], $_POST['motif']);
                }
            }


            if (isset($_POST['small_checkBoxArray'])){
                $array_id = $_POST['small_checkBoxArray'];
                if(isset($_POST['End_mission'])){   
                    foreach($small_array_id as $small_value_id){

                        $end_mission = Mission::find_by_id($small_array_id);
                        $end_mission->set_end_mission();
                    }
                }
            }
        }
    }

    public function technicien($id_tech)
    {
        
        //To make sure that only registered users can come to this page 
        global $session;
        if (!$session->is_signed_in() && $session->role != SERVICE_CLIENT) header("Location: " . URL . "problem/");


        $this->loadModel('Mission');

        $this->loadModel('Utilisateur');

        $this->loadModel('Technicien');


        $technicien_selected = Technicien::find_by_id($id_tech);

        $process_missions = Mission::fetch_process_missions_technicien($id_tech);

        $end_missions = Mission::fetch_end_missions_technicien($id_tech);

        $clients = Utilisateur::show_clients();


        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/service_client/technicien.php';
        require APP . 'view/_templates/footer.php';


        if (isset($_POST['add_mission'])) {
            $mission = new Mission();
            $mission->add_new_mission($id_tech, $_POST['id_client'], $_POST['date'], $_POST['motif']);

            header("Location: " . URL . "service_client/technicien/" . $id_tech);
        }


        if (isset($_POST['modifier_profil'])) {

            $technicien = Technicien::find_by_id($id_tech);

            $technicien->nom = htmlentities(trim($_POST['nom']));
            $technicien->prenom = htmlentities(trim($_POST['prenom']));
            $technicien->telephone = htmlentities(trim($_POST['tel']));
            $technicien->localisation = htmlentities(trim($_POST['lieu']));
            
            $technicien->update();

            header("Location: " . URL . "service_client/technicien/" . $id_tech);

        }

        if (isset($_POST['end_mission'])) {
            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                foreach ($array_id as $small_value_id) {
                   

                    $end_mission = Mission::find_by_id($small_value_id);
                    $end_mission->set_end_mission();
                    header("Location: " . URL . "service_client/technicien/" . $id_tech);
                        
                }
            }
        }
    }



    public function offres()
    {
        // load models
        //Offre
        $this->loadModel('Offre');
        $offres = Offre::find_all();

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/service_client/includes/sidebar.php';
        require APP . 'view/service_client/gestion_offres.php';
        require APP . 'view/_templates/footer.php';


        if (isset($_POST['paramOffre'])) {

            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {
                    $offre_to_param = Offre::find_by_id($value_id);

                    if (isset($_POST['contenu'])) {
                        $offre_to_param->update_detail($_POST['contenu']);
                    }

                    if (isset($_POST['titre'])) {
                        $offre_to_param->update_titre($_POST['titre']);
                    }

                    if (isset($_POST['prix'])) {
                        $offre_to_param->update_prix($_POST['prix']);
                    }
                }
            }

            header("Location: " . URL . "service_client/offres");

        }

        if (isset($_POST['addOffre'])) {

            // Save new capteur
            $new_offre = new Offre();
            $new_offre->add_new_offre($_POST['titre'], $_POST['prix'], $_POST['contenu']);

            header("Location: " . URL . "service_client/offres");

        }

        if (isset($_POST['deleteOffre'])) {
            if (isset($_POST['checkBoxArray'])) {
                $array_id = $_POST['checkBoxArray'];

                //we are looping around the checkbox array and processing it's values
                foreach ($array_id as $value_id) {

                    $offre_to_delete = Offre::find_by_id($value_id);
                    $offre_to_delete->remove_offer();

                }
            }

            header("Location: " . URL . "service_client/offres");

        }


    }
}