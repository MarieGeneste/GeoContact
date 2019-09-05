<?php

require_once 'Framework/Controller.php';
// require_once 'Model/Var.php';

class ControllerHome extends Controller {

    // private $var;

    // public function __construct() {
    //     $this->var = new Variable();
    // }

    // Affiche la page d'acceuil
    public function index() {
        // $vars = $this->var->getBillets();
        // $this->generateView(array('vars' => $vars));
        $this->generateView();
    }

}

