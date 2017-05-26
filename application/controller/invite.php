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
    
    public function gestion_technicien()
    {
        $this->loadModel('Mission');


        $this->loadModel('Utilisateur');
        $clients = Utilisateur::show_clients();

        $this->loadModel('Technicien');
        $clients = Technicien::show_techniciens();


        if (isset($_POST['checkBoxArray'])) {
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
                    $technicien->nom = $_POST['nom'];
                    $technicien->prenom = $_POST['prenom'];
                    $technicien->tel = $_POST['tel'];
                    $technicien->lieu = $_POST['lieu'];
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


            if (isset($_POST['small_checkBoxArray'])) {
                $array_id = $_POST['small_checkBoxArray'];
                if (isset($_POST['End_mission'])) {
                    foreach ($small_array_id as $small_value_id) {
                        $end_mission = Mission::find_by_id($small_array_id);
                        $end_mission->set_end_mission();
                    }
                }
            }
        }
    }


    public function dashboard()
    {
        require APP . 'view/_templates/head.php';
        require APP . 'view/dashboard/sidebar.php';
        require APP . 'view/dashboard/objets.php';
    }

    public function connexion() {

        require APP . 'view/_templates/head.php';
        require APP . 'view/connexion.php';
        require APP . 'view/_templates/footer.php';
    }

    public function egghome() {

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/egghome.php';
        require APP . 'view/_templates/footer.php';
    }

}
