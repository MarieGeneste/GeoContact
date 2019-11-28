<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Model/Contact.php';
require_once 'Model/TypesVoie.php';
require_once 'Model/Localite.php';
require_once 'Service/Security.php';

class ControllerUser extends Controller {

    private $user;
    private $users;
    private $userId;
    private $userModel;
    private $userSession;
    private $contactModel;
    private $contacts;
    private $typesVoieModel;
    private $typesVoies;
    private $localiteModel;
    private $localites;
    private $_service;
    private $webroot;
    private $logSession;
    

    public function __construct() {

        $this->webroot = Configuration::get("webroot");
        $this->_service = new Security();

        $this->contactModel = new Contact();
        if(isset($_SESSION["userId"])) {
            $this->contacts = $this->contactModel->getContacts($_SESSION["userId"]);
        }
        
        $this->typesVoieModel = new TypesVoie();
        $this->typesVoies = $this->typesVoieModel->getTypesVoies();

        $this->logSession = !empty($_SESSION["userGeoContact"]) ? $_SESSION["userGeoContact"] : false;
        $this->userId = !empty($_SESSION["userId"]) ? $_SESSION["userId"] : false;
        $this->user = new User();

        $this->userModel = new User();
        $this->users = $this->userModel->getUsers();

        $this->localiteModel = new Localite();
        $this->localites = $this->localiteModel->getLocalites();
        
    }

    /**
     * Gestion de l'affichage d'inscription des nouveaux utilisateurs
     */
    public function new(){
        $this->generateView();
    }

    /**
     * Gestion de l'affichage des contacts d'un utilisateur
     */
    public function userDashboard(){
        // Si une session utilisateur existe 
        if ($this->logSession == true) {
            // Aucun message flash par défaut
            $flashMessage = null;

            // Si on paramètre un message flash, on l'affiche puis on le supprime
            if (!empty($_SESSION["flashMessage"])) {
                $flashMessage = $_SESSION["flashMessage"];
                unset($_SESSION["flashMessage"]);
            } 
            
            $this->generateView([
                'user' => $this->logSession,
                'typesVoies' => $this->typesVoies,
                'localites' => $this->localites,
                'contacts' => $this->contacts,
                'flashMessage' => $flashMessage
            ]);
        // Si aucun session n'a été créé
        } else {
            header('Location: ' . $this->webroot . 'User');
        }
    }

    /**
     * Gestion de l'inscription de nouveaux utilisateurs
     */
    public function userInsert()
    {
        if($this->logSession == false) {
            $errors = [];
            $email = $this->_service->checkInputFields($_POST, "email");
            $lastname = $this->_service->checkInputFields($_POST, "lastname");
            $firstname = $this->_service->checkInputFields($_POST, "firstname");
            $password = $this->_service->checkInputFields($_POST, "password");
            $confirmpassword = $this->_service->checkInputFields($_POST, "confirmpassword");

            // Erreurs
            if ($confirmpassword != $password) array_push($errors, 'Vos mots de passe ne concordent pas. ');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) array_push($errors, 'Votre email est incorrect. ');
            if ($email === '' || $lastname ==='' || $firstname === '' || $password === '' || $confirmpassword === '') array_push($errors, 'Tous les champs doivent être renseignés. ');

            // Traitement des erreurs
            if(empty($errors))
            {
                // Création de l'utilisateur dans la base de données
                $userInsert = $this->userModel->insertUser($email, $lastname, $firstname, sha1($password), 2, $this->userId);
                if ($userInsert == true) 
                {
                    $message = "Votre compte a été créé avec succès.";
                    $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                    return header('Location: ' . $this->webroot . 'User');
                    unset($_SESSION['email']);
                    unset($_SESSION['lastname']);
                    unset($_SESSION['firstname']);
                }
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['firstname'] = $firstname;

                for ($i=0; $i < count($errors) ; $i++) { 
                    $message .= $errors[$i] . '<br>';
                }

                $_SESSION["flashMessage"] = ["status" => "errors", "message" => $message];
                return header('Location: ' . $this->webroot . 'User/new');
            }
        }
        else {
            return header('Location: ' . $this->webroot . 'User');
        }
    }

    /**
     * Gestion de l'affichage du tableau de bord utilisateur
     */
    public function index(){

        if ($this->logSession == true) header("Location: User/userDashboard");
        $this->generateView();
    }

    /** 
     * Connection de l'utilisateur
     */
    public function userConnect(){

        if ($this->logSession == false) {

            $email = $this->_service->checkInputFields($_POST, "email");
            $password = $this->_service->checkInputFields($_POST, "password");
            $idrole = 2;
            // MDP HASHE ICI AU LIEU DU MODEL CAR PAS DE HASH COTE ADMIN
            $userAccess = $this->user->check($email, sha1($password), $idrole);

            if ($userAccess != null) {
                $_SESSION["userGeoContact"] = true;
                $_SESSION["userId"] = $userAccess["id"];

                $this->logSession = $_SESSION["userGeoContact"];
                $this->userId = $_SESSION["userId"];
                
                header('Location: ' . $this->webroot . 'User/userDashboard');
            } else {
                $message = "Vos identifiants sont incorrects.";
                $_SESSION["flashMessage"] = ["status" => "errors", "message" => $message];
                header('Location: ' . $this->webroot . 'User');
            }
        }
    }

    /**
     * Déconnection de l'utilisateur
     */ 
    public function userDisconnect(){
        // destroy the session
        $_SESSION["userGeoContact"] = false;
        session_destroy();

        header('Location: ' . $this->webroot . 'User');    
    }


    /**
     * Gestion de l'ajout d'un contact
     */
    public function contactInsert(){
        if ($this->logSession == true) {
            $organisme = $this->_service->checkInputFields($_POST, "ctc-organisme");
            $nom = $this->_service->checkInputFields($_POST, "ctc-nom");
            $prenom = $this->_service->checkInputFields($_POST, "ctc-prenom");
            $adrNum = $this->_service->checkInputFields($_POST, "ctc-adr-num");
            $adrBis = $this->_service->checkInputFields($_POST, "ctc-adr-bis");
            $adrIdTypesVoie = $this->_service->checkInputFields($_POST, "ctc-adr-type");
            $adrVoie = $this->_service->checkInputFields($_POST, "ctc-adr-voie");
            $adrIdLocalites = $this->_service->checkInputFields($_POST, "ctc-adr-loc");
            $adrCompl = $this->_service->checkInputFields($_POST, "ctc-adr-compl");
            $email = $this->_service->checkInputFields($_POST, "ctc-email");
            $tel = $this->_service->checkInputFields($_POST, "ctc-tel");
            $site = $this->_service->checkInputFields($_POST, "ctc-site");
            $note = $this->_service->checkInputFields($_POST, "ctc-note");

            $userId = $_SESSION["userId"];
            
            // Insertion du contact
            $contactInsert = $this->contactModel->insertContact($organisme, $nom, $prenom, $adrNum, $adrBis, $adrIdTypesVoie, $adrVoie, $adrIdLocalites, $adrCompl, $email, $tel, $site, $note, $userId);
    
            return header('Location: ' . $this->webroot . 'User/userDashboard');
        } else {
            return header('Location: ' . $this->webroot . 'User');
        }
    }

    /**
     * Gestion de la mise à jour d'un contact
     */
    public function contactUpdate(){
        if ($this->logSession == true) {
            $organisme = $this->_service->checkInputFields($_POST, "ctc-organisme");
            $nom = $this->_service->checkInputFields($_POST, "ctc-nom");
            $prenom = $this->_service->checkInputFields($_POST, "ctc-prenom");
            $adrNum = $this->_service->checkInputFields($_POST, "ctc-adr-num");
            $adrBis = $this->_service->checkInputFields($_POST, "ctc-adr-bis");
            $adrIdTypesVoie = $this->_service->checkInputFields($_POST, "ctc-adr-type");
            $adrVoie = $this->_service->checkInputFields($_POST, "ctc-adr-voie");
            $adrIdLocalites = $this->_service->checkInputFields($_POST, "ctc-adr-loc");
            $adrCompl = $this->_service->checkInputFields($_POST, "ctc-adr-compl");
            $email = $this->_service->checkInputFields($_POST, "ctc-email");
            $tel = $this->_service->checkInputFields($_POST, "ctc-tel");
            $site = $this->_service->checkInputFields($_POST, "ctc-site");
            $note = $this->_service->checkInputFields($_POST, "ctc-note");

            $userId = $_SESSION["userId"];
            $idToUpdate = $_POST["ctc-id-hidden"];

            $contactEdit = $this->contactModel->updateContact($organisme, $nom, $prenom, $adrNum, $adrBis, $adrIdTypesVoie, $adrVoie, $adrIdLocalites, $adrCompl, $email, $tel, $site, $note, $userId, $idToUpdate);
            
            return header('Location: ' . $this->webroot . 'User/userDashboard');

        } else {
            return header('Location: ' . $this->webroot . 'User');
        }
    }

    /**
     * Gestion de la suppression d'un contact
     */
    public function contactDelete(){
        if ($this->logSession == true) {
            $idToDelete = $_POST["ctc-id-hidden"];
            $contactDelete = $this->contactModel->deleteContact($idToDelete);
            return header('Location: ' . $this->webroot . 'User/userDashboard');
        } else {
            return header('Location: ' . $this->webroot . 'User');
        }
    }
}