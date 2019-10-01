<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Model/Department.php';
require_once 'Model/Localite.php';

class ControllerAdmin extends Controller {

    private $user;
    private $department;
    private $localite;

    public function __construct() {
        $this->user = new User();
        $this->department = new Department();
        $this->localite = new Localite();
    }

    // Affiche la page de connexion
    public function index(){
        // $vars = $this->var->getBillets();
        // $this->generateView(array('vars' => $vars));
        $this->generateView();
    }

    public function adminDashboard(){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $adminSession = $this->user->checkAdmin($email, $password);
        $departments = $this->department->getDepartments();
        $localites = $this->localite->getLocalites();

        if ($adminSession != null) {

            $this->generateView([
                'user' => $adminSession,
                'departments' => $departments,
                'localites' => $localites
            ]);
        } else {
            throw new Exception("Identifiants invalides", 403);
        }
    }

}
