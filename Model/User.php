<?php

require_once 'Framework/Model.php';

class User extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    /* Vérifie les informations de connection de l'administrateur */
    public function checkAdmin($email, $password) {
        $sql = "SELECT * FROM " . self::$_prefix . "Users WHERE `email` = :email AND `password` = :pwd AND `idRoles` = 1 ";
                
        $adminSession = $this->executeRequest($sql, array(":email" => $email, ":pwd" => $password));
        
        return $adminSession->fetch();
    }

    /* Vérifie les informations de connection de l'utilisateur */
    public function checkUser($email, $password) {
        $sql = "SELECT * FROM " . self::$_prefix . "Users WHERE `email` = :email AND `password` = :pwd AND `idRoles` = 2 ";
                
        $adminSession = $this->executeRequest($sql, array(":email" => $email, ":pwd" => $password));
        
        return $adminSession->fetch();
    }

}