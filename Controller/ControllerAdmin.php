<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Model/Department.php';
require_once 'Model/Localite.php';
require_once 'Service/Security.php';

class ControllerAdmin extends Controller {

    private $user;
    private $departmentModel;
    private $localiteModel;
    private $departments;
    private $localites;
    private $webroot;
    private $adminSession;
    private $adminId;
    private $_service;

    public function __construct() {

        $this->webroot = Configuration::get("webroot");
        $this->_service = new Security();

        $this->adminSession = !empty($_SESSION["adminGeoContact"]) ? $_SESSION["adminGeoContact"] : false;
        $this->adminId = !empty($_SESSION["adminId"]) ? $_SESSION["adminId"] : false;
        $this->user = new User();

        $this->departmentModel = new Department();
        $this->departments = $this->departmentModel->getDepartments();

        $this->localiteModel = new Localite();
        $this->localites = $this->localiteModel->getLocalites();
        
    }

    // Affiche la page de connexion
    public function index(){
        // $vars = $this->var->getBillets();
        // $this->generateView(array('vars' => $vars));
        if ($this->adminSession == true) header("Location: admin/admindashboard");

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

    public function departmentInsert(){

        if ($this->adminSession == true) {

            $depNewCode = $this->_service->checkInputFields($_POST, "dep-new-code");
            $depNewLibelle = $this->_service->checkInputFields($_POST, "dep-new-libelle");

            $this->departmentModel->insertDep($depNewCode, $depNewLibelle, $this->adminId);
    
            return header('Location: ' . $this->webroot . 'Admin/adminDashboard');

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function departmentUpdate(){

        if ($this->adminSession == true) {

            $depEditId = $this->_service->checkInputFields($_POST, "dep-edit-id");

            $depToEdit = $this->departmentModel->findOneBy($depEditId);

            if (!empty($depToEdit)) {

                $depEditCode = $this->_service->checkInputFields($_POST, "dep-edit-code");
                $depEditLibelle = $this->_service->checkInputFields($_POST, "dep-edit-libelle");

                $this->departmentModel->updateDep($depEditId, $depEditCode, $depEditLibelle, $this->adminId);
        
                return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function departmentDelete(){

        if ($this->adminSession == true) {

            $depEditId = $this->_service->checkInputFields($_POST, "dep-edit-id");

            $depToEdit = $this->departmentModel->findOneBy($depEditId);

            if (!empty($depToEdit)) {

                $this->departmentModel->deleteDep($depEditId);
        
                return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function localiteInsert(){

        if ($this->adminSession == true) {

            $locNewCodePostal = $this->_service->checkInputFields($_POST, "loc-new-codePostal");
            $locNewLibelle = $this->_service->checkInputFields($_POST, "loc-new-libelle");
            $locNewCodeInsee = (!empty($this->_service->checkInputFields($_POST, "loc-new-codeInsee"))) ? $this->_service->checkInputFields($_POST, "loc-new-codeInsee") : null ;
            $locNewDepId = $this->_service->checkInputFields($_POST, "loc-new-dep-id");

            $this->localiteModel->insertLoc($locNewCodePostal, $locNewLibelle, $locNewCodeInsee, $locNewDepId, $this->adminId);
    
            return header('Location: ' . $this->webroot . 'Admin/adminDashboard');

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function localiteUpdate(){

        if ($this->adminSession == true) {

            $locEditId = $this->_service->checkInputFields($_POST, "loc-edit-id");

            $locToEdit = $this->localiteModel->findOneBy($locEditId);

            if (!empty($locToEdit)) {

                $locEditCodePostal = $this->_service->checkInputFields($_POST, "loc-edit-codePostal");
                $locEditLibelle = $this->_service->checkInputFields($_POST, "loc-edit-libelle");
                $locEditCodeInsee = (!empty($this->_service->checkInputFields($_POST, "loc-edit-codeInsee"))) ? $this->_service->checkInputFields($_POST, "loc-edit-codeInsee") : null ;
                $locEditDepId = $this->_service->checkInputFields($_POST, "loc-edit-dep-id");

                $this->localiteModel->updateLoc($locEditId, $locEditCodePostal, $locEditLibelle, $locEditCodeInsee, $locEditDepId, $this->adminId);
        
                return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function localiteDelete(){

        if ($this->adminSession == true) {

            $locEditId = $this->_service->checkInputFields($_POST, "loc-edit-id");

            $locToEdit = $this->localiteModel->findOneBy($locEditId);

            if (!empty($locToEdit)) {

                $this->localiteModel->deleteLoc($locEditId);
        
                return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function adminConnect(){

        if ($this->adminSession == false) {

            $email = $this->_service->checkInputFields($_POST, "email");
            $password = $this->_service->checkInputFields($_POST, "password");

            $adminAccess = $this->user->checkAdmin($email, $password);

            if ($adminAccess != null) {

                $_SESSION["adminGeoContact"] = true;
                $_SESSION["adminId"] = $adminAccess["id"];

                $this->adminSession = $_SESSION["adminGeoContact"];
                $this->adminId = $_SESSION["adminId"];
                
                header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }
        }
    }

    public function adminDisconnect(){

        // destroy the session
        $_SESSION["adminGeoContact"] = false;
        session_destroy();

        header('Location: ' . $this->webroot . 'Admin');    }

}
