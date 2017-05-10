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
        require APP . 'view/client/gestion_capteurs.php';
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
    	require APP . 'view/client/pieces.php';
    }

    /**
     * PAGE: ma maison
     * This method handles what happens when you move to http://egghome/client/ma_maison 
     */
    public function contact(){

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/pieces.php';
    }

    /**
     * PAGE: ma maison
     * This method handles what happens when you move to http://egghome/client/ma_maison 
     */
    public function statistique(){

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/pieces.php';
    }

    /**
     * PAGE: ma maison
     * This method handles what happens when you move to http://egghome/client/ma_maison 
     */
    public function profil(){

        // load views
        require APP . 'view/_templates/head.php';
        require APP . 'view/client/includes/sidebar.php';
        require APP . 'view/client/pieces.php';
    }
}

?>