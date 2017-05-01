<?php

class Controller
{
    /**
     * @var null Model
     */
    public $model = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        

    }

    /**
     * Loads the "model".
     * @return [object model]
     */
    public function loadModel($model_name)
    {
        require APP . 'model/' . strtolower($model_name) . '.php';
        // create new "model" (and pass the database connection)
        $this->model = new $model_name();
    }
}
