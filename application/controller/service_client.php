<?php

/**
 * Created by PhpStorm.
 * User: johannaprevost
 * Date: 23/05/2017
 * Time: 11:46
 */

class Service_client extends Controller
{

    public function gestion_client()
    {
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

        $this->loadModel('Technicien');
        $techniciens = Technicien::show_techniciens();

        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
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
        if (isset($_POST['Voir'])) {
            foreach ($array_id as $value_id) {
                header("Location: " . URL . "service_client/technicien/". $_POST['Voir']);
            }
        }
        
    }

    public function technicien($id_tech)
    {
        $this->loadModel('Mission');

        $this->loadModel('Utilisateur');
        $clients = Utilisateur::show_clients();

        $this->loadModel('Technicien');

        $technicien_selected = Technicien::find_by_id($id_tech);

        $process_missions = Mission::fetch_process_missions_technicien($id_tech);
            
        $end_missions = Mission::fetch_end_missions_technicien($id_tech);
        

        require APP . 'view/_templates/head.php';
        //require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/service_client/technicien.php';
        require APP . 'view/_templates/footer.php';



        if (isset($_POST['add_mission'])) {
            $mission = new Mission();
            $mission->add_new_mission($id_tech, $_POST['id_client'], $_POST['date'], $_POST['motif']);

            header("Location: " . URL . "service_client/technicien/" . $id_tech);
        }
            

        if (isset($_POST['small_checkBoxArray'])){
            $array_id = $_POST['small_checkBoxArray'];
            if(isset($_POST['End_mission'])){   
                foreach($array_id as $small_value_id){

                    $end_mission = Mission::find_by_id($small_value_id);
                    $end_mission->set_end_mission();
                }
            }
        }


        if (isset($_POST['Modifier'])) {
                $technicien = Technicien::find_by_id($id_tech);
                $technicien->nom = $_POST['nom'];
                $technicien->prenom = $_POST['prenom'];
                $technicien->tel = $_POST['tel'];
                $technicien->lieu = $_POST['lieu'];
                $technicien->update();
            
        }

    }

}