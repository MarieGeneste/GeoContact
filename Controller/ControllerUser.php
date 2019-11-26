<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';
require_once 'Model/Contact.php';
require_once 'Model/TypesVoie.php';
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
    private $_service;
    private $webroot;
    private $logSession;
    

    public function __construct() {

        $this->webroot = Configuration::get("webroot");
        $this->_service = new Security();

        $this->contactModel = new Contact();
        $this->contacts = $this->contactModel->getContacts(2); // 2 est un userId factice pour le dev, à remplacer par la variable $userId
        
        $this->typesVoieModel = new TypesVoie();
        $this->typesVoies = $this->typesVoieModel->getTypesVoies();

        $this->logSession = !empty($_SESSION["userGeoContact"]) ? $_SESSION["userGeoContact"] : false;
        $this->userId = !empty($_SESSION["userId"]) ? $_SESSION["userId"] : false;
        $this->user = new User();

        $this->userModel = new User();
        $this->users = $this->userModel->getUsers();
        
    }

    public function new(){
        $this->generateView();
    }

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
                'contacts' => $this->contacts,
                'flashMessage' => $flashMessage
            ]);
        // Si aucun session n'a été créé
        } else {
            header('Location: ' . $this->webroot . 'User');
        }
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

    /* Connection de l'utilisateur */
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

    /* Déconnection de l'utilisateur */
    public function userDisconnect(){

        // destroy the session
        $_SESSION["userGeoContact"] = false;
        session_destroy();

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

    // public function departmentUpdate(){
    //     if ($this->adminSession == true) {
    //         $depEditId = $this->_service->checkInputFields($_POST, "dep-edit-id");

    //         $depToEdit = $this->departmentModel->findOneBy($depEditId);

    //         $depEditCode = $this->_service->checkInputFields($_POST, "dep-edit-code");
    //         $depEditLibelle = $this->_service->checkInputFields($_POST, "dep-edit-libelle");

    //         if($this->departmentModel->depExist($depEditCode, $depEditLibelle, $depToEdit['id']) == true){
    //             $message = "Il existe déjà un département avec ce code ou ce nom";
    //             $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
    //         } else {
    //             if (!empty($depToEdit)) {
    //                 $depEdit = $this->departmentModel->updateDep($depEditId, $depEditCode, $depEditLibelle, $this->adminId);

    //                 if ($depEdit == true) {
    //                     $message = "Le département <em class='font-weight-bold'>" . $depEditLibelle . " </em> a bien été modifié";
    //                     $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
    //                 } else {
    //                     $message = "Le département n'a pas pu être modifié";
    //                     $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
    //                 }
            
    //                 return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
    //             }
    //         }

    //     } else {
    //         return header('Location: ' . $this->webroot . 'Admin');
    //     }
    // }

    // public function departmentDelete(){

    //     if ($this->adminSession == true) {

    //         $depEditId = $this->_service->checkInputFields($_POST, "dep-edit-id");

    //         $depToEdit = $this->departmentModel->findOneBy($depEditId);

    //         if (!empty($depToEdit)) {

    //             $depDelete = $this->departmentModel->deleteDep($depEditId);

    //             if ($depDelete == true) {
    //                 $message = "Le département <em class='font-weight-bold'>" . $depToEdit["libelle"] . " </em> a bien été supprimé";
    //                 $_SESSION["flashMessage"] = ["status" => "success", "message" => $message];
    //             } else {
    //                 $message = "Le département n'a pas pu être supprimé";
    //                 $_SESSION["flashMessage"] =["status" => "error", "message" => $message];;
    //             }
        
    //             return header('Location: ' . $this->webroot . 'Admin/adminDashboard');
    //         }

    //     } else {
    //         return header('Location: ' . $this->webroot . 'Admin');
    //     }
    // }
}