<?php

class Client extends Controller {

    /**
     * PAGE: index (page d'acceuil)
     * This method handles what happens when you move to http://egghome/client/index (which is the default page)
     */
	public function index(){

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/acceuil.php';
    }
    
    /**
     * PAGE: gestion capteurs
     * This method handles what happens when you move to http://egghome/client/gestion_capteurs 
     */
    public function gestion_capteurs(){

        // load views
    	require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/gestion_capteurs.php';
    }

    /**
     * PAGE: ma maison
     * This method handles what happens when you move to http://egghome/client/ma_maison 
     */
    public function ma_maison(){

        // load views
    	require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
    	require APP . 'view/client/ma_maison.php';
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
    public function suivi_energetique(){

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/suivi_energetique.php';
    }

    /**
     * PAGE: profil
     * This method handles what happens when you move to http://egghome/client/profil 
     */
    public function profil(){

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/profil.php';
    }
}

?>