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
        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/invite/offres.php';
        require APP . 'view/_templates/footer.php';
    }

    public function dashboard()
    {
        require APP . 'view/_templates/head.php';
        require APP . 'view/dashboard/sidebar.php';
        require APP . 'view/dashboard/objets.php';
    }

}