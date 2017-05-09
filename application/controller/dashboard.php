<?php

class Dashboard extends Controller {
	public function index(){
        require APP . 'view/_templates/head.php';
        require APP . 'view/dashboard/sidebar.php';
        require APP . 'view/dashboard/objets.php';
    }

    public function objets(){
    	require APP . 'view/_templates/head.php';
        require APP . 'view/dashboard/sidebar.php';
        require APP . 'view/dashboard/objets.php';
    }

    public function pieces(){
    	require APP . 'view/_templates/head.php';
        require APP . 'view/dashboard/sidebar.php';
    	require APP . 'view/dashboard/pieces.php';
    }
}

?>