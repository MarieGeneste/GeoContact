<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Service/Security.php';

class ControllerUser extends Controller {

    private $user;
    private $users;
    private $userModel;
    private $webroot;
    private $logSession;
    private $userId;
    private $_service;

    public function __construct() {

        $this->webroot = Configuration::get("webroot");
        $this->_service = new Security();

        $this->logSession = !empty($_SESSION["userGeoContact"]) ? $_SESSION["userGeoContact"] : false;
        $this->userId = !empty($_SESSION["userId"]) ? $_SESSION["userId"] : false;
        $this->user = new User();

        $this->userModel = new User();
        $this->users = $this->userModel->getUsers();
        
    }

    public function new(){
        $this->generateView();
    }

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
                $userInsert = $this->userModel->insertUser($email, $lastname, $firstname, sha1($password), 2, $this->userId);
                if ($userInsert == true) 
                {
                    $message = "Votre compte a été créé avec succès.";
                    $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
                    
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

            // return header('Location: ' . $this->webroot . 'User/userDashboard');
        }
        else {
            return header('Location: ' . $this->webroot . 'User');
        }
    }

    public function index(){

        if ($this->logSession == true) header("Location: User/userDashboard");
        $this->generateView();
    }

    public function userDashboard(){
        
        if ($this->logSession == true) {

            $flashMessage = null;
            
            if (!empty($_SESSION["flashMessage"])) {
                $flashMessage = $_SESSION["flashMessage"];
                unset($_SESSION["flashMessage"]);
            } 
            
            $this->generateView([
                'user' => $this->logSession,
                'flashMessage' => $flashMessage
            ]);
        } else {
            header('Location: ' . $this->webroot . 'User');
        }
    }

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
            }
        }
    }

    public function userDisconnect(){

        // destroy the session
        $_SESSION["userGeoContact"] = false;
        session_destroy();

        header('Location: ' . $this->webroot . 'User');    
    }

}