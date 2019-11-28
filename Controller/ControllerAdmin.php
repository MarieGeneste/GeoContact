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
    private $logSession;
    private $adminId;
    private $_service;

    public function __construct() {

        $this->webroot = Configuration::get("webroot");
        $this->_service = new Security();

        $this->logSession = !empty($_SESSION["adminGeoContact"]) ? $_SESSION["adminGeoContact"] : false;
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
        if ($this->logSession == true) header("Location: Admin/adminDashboard");

        $this->generateView();
    }

    public function adminDashboard(){
        
        if ($this->logSession == true) {

            $flashMessage = null;
            
            if (!empty($_SESSION["flashMessage"])) {
                $flashMessage = $_SESSION["flashMessage"];
                unset($_SESSION["flashMessage"]);
            } 
            
            $this->generateView([
                'user' => $this->logSession,
                'departments' => $this->departments,
                'localites' => $this->localites,
                'flashMessage' => $flashMessage
            ]);
        } else {
            header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function departmentInsert(){

        if ($this->logSession == true) {

            $depNewCode = $this->_service->checkInputFields($_POST, "dep-new-code");
            $depNewLibelle = $this->_service->checkInputFields($_POST, "dep-new-libelle");

            if($this->departmentModel->depExist($depNewCode, $depNewLibelle) == true){
                $message = "Il existe déjà un département avec ce code ou ce nom";
                $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
            } else {

                $depInsert = $this->departmentModel->insertDep($depNewCode, $depNewLibelle, $this->adminId);

                if ($depInsert == true) {
                    $message = "Le département <em class='font-weight-bold'>" . $depNewLibelle . " </em> a bien été ajouté";
                    $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                } else {
                    $message = "Le nouveau département n'a pas pu être ajouté";
                    $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
                }
            }
    
            return header('Location: ' . $this->webroot . 'Admin/adminDashboard');

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function departmentUpdate(){

        if ($this->logSession == true) {

            $depEditId = $this->_service->checkInputFields($_POST, "dep-edit-id");

            $depToEdit = $this->departmentModel->findOneBy($depEditId);

            $depEditCode = $this->_service->checkInputFields($_POST, "dep-edit-code");
            $depEditLibelle = $this->_service->checkInputFields($_POST, "dep-edit-libelle");

            if($this->departmentModel->depExist($depEditCode, $depEditLibelle, $depToEdit['id']) == true){
                $message = "Il existe déjà un département avec ce code ou ce nom";
                $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
            } else {

                if (!empty($depToEdit)) {

                    $depEdit = $this->departmentModel->updateDep($depEditId, $depEditCode, $depEditLibelle, $this->adminId);

                    if ($depEdit == true) {
                        $message = "Le département <em class='font-weight-bold'>" . $depEditLibelle . " </em> a bien été modifié";
                        $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                    } else {
                        $message = "Le département n'a pas pu être modifié";
                        $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
                    }
            
                    return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
                }
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function departmentDelete(){

        if ($this->logSession == true) {

            $depEditId = $this->_service->checkInputFields($_POST, "dep-edit-id");

            $depToEdit = $this->departmentModel->findOneBy($depEditId);

            if (!empty($depToEdit)) {

                $depDelete = $this->departmentModel->deleteDep($depEditId);

                if ($depDelete == true) {
                    $message = "Le département <em class='font-weight-bold'>" . $depToEdit["libelle"] . " </em> a bien été supprimé";
                    $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                } else {
                    $message = "Le département n'a pas pu être supprimé";
                    $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
                }
        
                return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function localiteInsert(){

        if ($this->logSession == true) {

            $locNewCodePostal = $this->_service->checkInputFields($_POST, "loc-new-codePostal");
            $locNewLibelle = $this->_service->checkInputFields($_POST, "loc-new-libelle");
            $locNewCodeInsee = (!empty($this->_service->checkInputFields($_POST, "loc-new-codeInsee"))) ? $this->_service->checkInputFields($_POST, "loc-new-codeInsee") : null ;
            $locNewDepId = $this->_service->checkInputFields($_POST, "loc-new-dep-id");

            if($this->localiteModel->locExist($locNewLibelle) == true){
                $message = "Il existe déjà une localité avec ce code postal et ce nom";
                $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
            } else {

                $locInsert = $this->localiteModel->insertLoc($locNewCodePostal, $locNewLibelle, $locNewCodeInsee, $locNewDepId, $this->adminId);

                if ($locInsert == true) {
                    $message = "La localité <em class='font-weight-bold'>" . $locNewLibelle . " </em> a bien été ajouté";
                    $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                } else {
                    $message = "Le nouvelle localité n'a pas pu être ajoutée";
                    $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
                }
            }
    
            return header('Location: ' . $this->webroot . 'Admin/adminDashboard');

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function localiteUpdate(){

        if ($this->logSession == true) {

            $locEditId = $this->_service->checkInputFields($_POST, "loc-edit-id");

            $locToEdit = $this->localiteModel->findOneBy($locEditId);

            if (!empty($locToEdit)) {

                $locEditCodePostal = $this->_service->checkInputFields($_POST, "loc-edit-codePostal");
                $locEditLibelle = $this->_service->checkInputFields($_POST, "loc-edit-libelle");
                $locEditCodeInsee = (!empty($this->_service->checkInputFields($_POST, "loc-edit-codeInsee"))) ? $this->_service->checkInputFields($_POST, "loc-edit-codeInsee") : null ;
                $locEditDepId = $this->_service->checkInputFields($_POST, "loc-edit-dep-id");

                if($this->localiteModel->locExist($locEditLibelle, $locToEdit['id']) == true){
                    $message = "Il existe déjà une localité avec ce code postal et ce nom";
                    $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
                } else {
    
                    $locUpdate = $this->localiteModel->updateLoc($locEditId, $locEditCodePostal, $locEditLibelle, $locEditCodeInsee, $locEditDepId, $this->adminId);

                    if ($locUpdate == true) {
                        $message = "La localité <em class='font-weight-bold'>" . $locEditLibelle . " </em> a bien été modifiée";
                        $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                    } else {
                        $message = "La localité n'a pas pu être modifiée";
                        $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
                    }
                }
        
                return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function localiteDelete(){

        if ($this->logSession == true) {

            $locEditId = $this->_service->checkInputFields($_POST, "loc-edit-id");

            $locToEdit = $this->localiteModel->findOneBy($locEditId);

            if (!empty($locToEdit)) {

                $locDelete = $this->localiteModel->deleteLoc($locEditId);

                if ($locDelete == true) {
                    $message = "La localité <em class='font-weight-bold'>" . $locToEdit["libelle"] . " </em> a bien été supprimée";
                    $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                } else {
                    $message = "La localité n'a pas pu être supprimée";
                    $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
                }
        
        
                return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            }

        } else {
            return header('Location: ' . $this->webroot . 'Admin');
        }
    }

    public function adminConnect(){

        if ($this->logSession == false) {

            $email = $this->_service->checkInputFields($_POST, "email");
            $password = $this->_service->checkInputFields($_POST, "password");
            $idrole = 1;

            $adminAccess = $this->user->check($email, $password, $idrole);

            if ($adminAccess != null) {

                $_SESSION["adminGeoContact"] = true;
                $_SESSION["adminId"] = $adminAccess["id"];

                $this->logSession = $_SESSION["adminGeoContact"];
                $this->adminId = $_SESSION["adminId"];
                
                header('Location: ' . $this->webroot . 'Admin/adminDashboard');
            } else {
                $message = "Vos identifiants sont incorrects.";
                $_SESSION["flashMessage"] = ["status" => "errors", "message" => $message];
                header('Location: ' . $this->webroot . 'Admin');
            }
        }
    }

    public function adminDisconnect(){

        // destroy the session
        $_SESSION["adminGeoContact"] = false;
        session_destroy();

        header('Location: ' . $this->webroot . 'Admin');    }

}
