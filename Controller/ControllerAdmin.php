<?php

session_start();

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Model/Department.php';
require_once 'Model/Localite.php';

class ControllerAdmin extends Controller {

    private $user;
    private $department;
    private $localite;
    private $webroot;

    public function __construct() {
        $this->user = new User();
        $this->department = new Department();
        $this->localite = new Localite();
        $this->webroot = Configuration::get("webroot");
    }

    // Affiche la page de connexion
    public function index(){
        // $vars = $this->var->getBillets();
        // $this->generateView(array('vars' => $vars));
        $this->generateView();
    }

    public function adminDashboard(){

        $adminSession = $_SESSION["adminGeoContact"];
        
        if ($adminSession == true) {

            $departments = $this->department->getDepartments();
            $localites = $this->localite->getLocalites();
            
            $this->generateView([
                'user' => $adminSession,
                'departments' => $departments,
                'localites' => $localites
            ]);
        } else {
            header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function adminConnect(){

        $adminSession = $_SESSION["adminGeoContact"];

        if ($adminSession == false) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $adminAccess = $this->user->checkAdmin($email, $password);

            if ($adminAccess != null) {

                $_SESSION["adminGeoContact"] = true;
                
                header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }
        }
    }

    public function adminDisconnect(){

        // destroy the session
        $_SESSION["adminGeoContact"] = false;
        session_destroy();
    }

}
