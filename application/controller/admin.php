<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/fr/language.oop5.decon.php
 *
 */
class Admin extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page)
     */
    public function index()
    {
        //to load a model use :
        //$this->loadModel("modelName");

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: page_qui_gere_admin (just an exemple for iluustration)
     * This method handles what happens when you move to http://yourproject/home/page_qui_gere_admin
     */
    public function administrateur()
    {

        if (isset($_POST['create'])) {

            
            $this->loadModel("Admin");
            $new_user = $this->model;
            echo "new_user";
            

            if ($new_user) {

                $new_user->nom_utilisateur  = $_POST['username'];
                $new_user->mdp  = $_POST['password'];

                var_dump($new_user);

                $new_user->save_admin();
            }


        }

        // load views
        require APP . 'view/_templates/header.php';
        //require APP . 'view/home/page_qui_gere_admin.php';
        require APP . 'view/_templates/footer.php';
    }

}