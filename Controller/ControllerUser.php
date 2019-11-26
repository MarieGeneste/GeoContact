<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Model/Contact.php';
require_once 'Model/TypesVoie.php';
require_once 'Service/Security.php';


class ControllerUser extends Controller {

    private $user;
    private $contactModel;
    private $contacts;
    private $typesVoieModel;
    private $typesVoies;
    private $webroot;
    private $userSession;
    private $userId;
    private $_service;

    public function __construct() {

        $this->webroot = Configuration::get("webroot");
        $this->_service = new Security();

        $this->userSession = !empty($_SESSION["userGeoContact"]) ? $_SESSION["userGeoContact"] : false;
        $this->userId = !empty($_SESSION["userId"]) ? $_SESSION["userId"] : false;
        $this->user = new User();

        $this->contactModel = new Contact();
        $this->contacts = $this->contactModel->getContacts(2); // 2 est un userId factice pour le dev, à remplacer par la variable $userId
        
        $this->typesVoieModel = new TypesVoie();
        $this->typesVoies = $this->typesVoieModel->getTypesVoies();

    }

    public function index(){

        $this->generateView();
    }

    public function userDashboard(){
        // Si une session utilisateur existe 
        // if ($this->userSession == true) {
            // Aucun message flash par défaut
            $flashMessage = null;

            // Si on paramètre un message flash, on l'affiche puis on le supprime
            if (!empty($_SESSION["flashMessage"])) {
                $flashMessage = $_SESSION["flashMessage"];
                unset($_SESSION["flashMessage"]);
            } 
            
            $this->generateView([
                'user' => $this->userSession,
                'typesVoies' => $this->typesVoies,
                'contacts' => $this->contacts,
                'flashMessage' => $flashMessage
            ]);
        // Si aucun session n'a été créé
        // } else {
        //     // header('Location: ' . $this->webroot . 'User');
        // }
    }

    /* Connection de l'utilisateur */
    public function userConnect(){
        // Si aucun session d'utilisateur n'exsite, on en créé une
        if ($this->userSession == false) {

            $email = $this->_service->checkInputFields($_POST, "email");
            $password = $this->_service->checkInputFields($_POST, "password");
            
            // Vérifie les données de l'utilisateur
            $userAccess = $this->user->checkUser($email, $password);

            // Si la vérification est ok
            if ($userAccess != null) {
                // Création des sessions utilisateurs 
                $_SESSION["userGeoContact"] = true;
                $_SESSION["userId"] = $userAccess["id"];
                // Assigne les valeurs des sessions au variable 
                $this->userSession = $_SESSION["userGeoContact"];
                $this->userId = $_SESSION["userId"];
                // Redirige l'utilisateur vers le dashboard utilisateur
                
                header('Location: ' . $this->webroot . 'User/userDashboard');
            }
        }
    }

    /* Déconnection de l'utilisateur */
    public function userDisconnect(){
        // Destruction de la session utilisateur
        $_SESSION["userGeoContact"] = false;
        session_destroy();
        // Redirige vers la page de connexion utilisateur
        header('Location: ' . $this->webroot . 'User');    
    }

    /* Ajout d'un contact */
    public function contactInsert(){
        if ($this->userSession == true) {
            $ctcNewOrganisme = $this->_service->checkInputFields($_POST, "ctc-organisme");
            $ctcNewNom = $this->_service->checkInputFields($_POST, "ctc-nom");
            $ctcNewPrenom = $this->_service->checkInputFields($_POST, "ctc-prenom");
            $ctcNewAdrNum = $this->_service->checkInputFields($_POST, "ctc-adr-num");
            $ctcNewAdrBis = $this->_service->checkInputFields($_POST, "ctc-adr-bis");
            $ctcNewAdrType = $this->_service->checkInputFields($_POST, "ctc-adr-type");
            $ctcNewAdrVoie = $this->_service->checkInputFields($_POST, "ctc-adr-voie");
            $ctcNewAdrLoc = $this->_service->checkInputFields($_POST, "ctc-adr-loc");
            $ctcNewAdrCompl = $this->_service->checkInputFields($_POST, "ctc-adr-compl");
            $ctcNewEmail = $this->_service->checkInputFields($_POST, "ctc-email");
            $ctcNewTel = $this->_service->checkInputFields($_POST, "ctc-tel");
            $ctcNewSite = $this->_service->checkInputFields($_POST, "ctc-site");
            $ctcNewNote = $this->_service->checkInputFields($_POST, "ctc-note");

            //
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
        if ($this->adminSession == true) {
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

        if ($this->adminSession == true) {

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
}