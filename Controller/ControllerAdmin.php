<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';

class ControllerAdmin extends Controller {

    private $User;

    public function __construct() {
        $this->User = new User();
    }

    // Affiche la page de connexion
    public function index(){
        // $vars = $this->var->getBillets();
        // $this->generateView(array('vars' => $vars));
        $this->generateView();
    }

    public function adminDashbord(){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $adminSession = $this->User->checkAdmin($email, $password);

        if ($adminSession != null) {
            $this->generateView(array('user' => $adminSession));
        } else {
            throw new Exception("Identifiants invalides", 403);
        }
    }

}
