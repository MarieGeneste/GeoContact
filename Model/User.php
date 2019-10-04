<?php

require_once 'Framework/Model.php';

class User extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function checkAdmin($email, $password) {
        $sql = "SELECT * FROM " . $this->_prefix . "Users WHERE `email` = :email AND `password` = :pwd AND `idRoles` = 1 ";
                
        $adminSession = $this->executeRequest($sql, array(":email" => $email, ":pwd" => $password));
        
        return $adminSession->fetch();
    }

}