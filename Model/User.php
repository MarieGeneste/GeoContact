<?php

require_once 'Framework/Model.php';

class User extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function check($email, $password, $idrole) {
        $sql = "SELECT * FROM " . self::$_prefix . "Users WHERE `email` = :email AND `password` = :pwd AND `idRoles` = :idrole ";
                
        $logSession = $this->executeRequest($sql, array(":email" => $email, ":pwd" => $password, ":idrole" => $idrole));
        
        return $logSession->fetch();
    }

    public function getUsers() {

        $sql = "SELECT * FROM " . self::$_prefix . "Users ORDER BY `nom`";
        $users = $this->executeRequest($sql, null);

        return $users->fetchAll();
    }

    public function insertUser($email, $lastname, $firstname, $password, $idrole) {

        $sql = "INSERT INTO " . self::$_prefix . "Users (email, nom, prenom, password, idRoles) VALUES (:email, :nom, :prenom, :password, :idRoles)";
            if ($this->executeRequest($sql, ["email" => $email, "nom" => $lastname, "prenom" => $firstname, "password" => $password, "idRoles" => $idrole])){
                return true;
            } else {
                return false;
            }
    }
}