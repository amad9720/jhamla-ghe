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
        require APP . 'view/client/includes/sidebar.php';
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

            $new_notification = new Notification();
            $new_notification->send_notification($_POST['checkBoxArray[]'],$_POST['titre'], $_POST['contenu']);


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
    }

    public function technicien()
    {
        $this->loadModel('Mission');

        $this->loadModel('Utilisateur');
        $clients = Utilisateur::show_clients();

        $this->loadModel('Technicien');
        

        require APP . 'view/_templates/head.php';
        //require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/service_client/technicien.php';
        require APP . 'view/_templates/footer.php';



        if (isset($_POST['add_mission'])) {
            $mission = new Mission();
            $mission->add_new_mission($_POST['id_technicien'], $_POST['id_client'], $_POST['date'], $_POST['motif']);

            header("Location: " . URL . "service_client/technicien?id_technicien=" . $_POST['id_technicien']);
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


        if (isset($_POST['Modifier'])) {
            foreach ($array_id as $value_id) {
                $technicien = Technicien::find_by_id($value_id);
                $technicien->nom = $_POST['nom'];
                $technicien->prenom = $_POST['prenom'];
                $technicien->tel = $_POST['tel'];
                $technicien->lieu = $_POST['lieu'];
                $technicien->update();
            }
        }

    }

}