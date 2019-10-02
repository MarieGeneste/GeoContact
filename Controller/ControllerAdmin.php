<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Model/Department.php';
require_once 'Model/Localite.php';

class ControllerAdmin extends Controller {

    private $user;
    private $departments;
    private $localites;
    private $webroot;
    private $adminSession;

    public function __construct() {

        $this->webroot = Configuration::get("webroot");
        $this->adminSession = $_SESSION["adminGeoContact"];
        $this->user = new User();

        $department = new Department();
        $this->departments = $department->getDepartments();

        $localite = new Localite();
        $this->localites = $localite->getLocalites();
        
    }

    // Affiche la page de connexion
    public function index(){
        // $vars = $this->var->getBillets();
        // $this->generateView(array('vars' => $vars));
        $this->generateView();
    }

    public function adminDashboard(){
        
        if ($this->adminSession == true) {
            
            $this->generateView([
                'user' => $this->adminSession,
                'departments' => $this->departments,
                'localites' => $this->localites
            ]);
        } else {
            header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function departmentUpdate(){
            
        if ($this->adminSession == true) {

            $this->generateView([
                'user' => $this->adminSession,
                'departments' => $this->departments,
                'localites' => $this->localites
            ]);

        } else {

            header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function adminConnect(){

        if ($this->adminSession == false) {

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
