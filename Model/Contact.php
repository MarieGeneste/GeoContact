<?php

require_once 'Framework/Model.php';

class Contact extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    /* Récupère tous les contacts d'un utilisateur en fonction de son Id */
    public function getContacts($idUser) {
        $sql = "SELECT * FROM " . self::$_prefix . "Contacts WHERE `idUser` = :idUser";
                
        $contacts = $this->executeRequest($sql, array(":idUser" => $idUser));
        
        return $contacts->fetchAll();
    }

}