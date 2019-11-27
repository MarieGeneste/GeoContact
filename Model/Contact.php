<?php

require_once 'Framework/Model.php';

class Contact extends Model {

    /*
     * Récupère tous les contacts d'un utilisateur en fonction de son Id
     */
    public function getContacts($idUser) {
        $sql = "SELECT * FROM " . self::$_prefix . "Contacts WHERE `idUser` = :idUser";
                
        $contacts = $this->executeRequest($sql, array(":idUser" => $idUser));
        
        return $contacts->fetchAll();
    }

    /**
     * Création d'un nouveau contact pour un utilisateur
     * @param string $organisme = libelle de l'organisme du contact
     * @param string $nom = libelle du nom du contact
     * @param string $prenom = libelle du prenom du contact
     * @param string $adrNum = libelle du numéro de rue du contact
     * @param string $adrBis = libelle du multiplicatif de rue du contact
     * @param string $adrType = libelle du type de voie du contact
     * @param string $adrVoie = libelle de la rue du contact
     * @param string $adrIdLocalites = libelle de la ville du contact
     * @param string $adrCompl = libelle du complément d'adresse du contact
     * @param string $email = libelle de l'email du contact
     * @param string $tel = libelle du téléphone du contact
     * @param string $site = libelle du site internet du contact
     * @param string $note = libelle d'une note complémentaire sur le contact
     * @param string $userId = ID de l'utilisateur qui créé le contact
     */
    public function insertContact($organisme, $nom, $prenom, $adrNum, $adrBis, $adrIdTypesVoie, $adrVoie, $adrIdLocalites, $adrCompl, $email, $tel, $site, $note, $userId) {

        $sql = "INSERT INTO " . self::$_prefix . "Contacts (organismeNom, contactNom, contactPrenom, adrNum, adrBis, adrIdTypesVoie, adrVoie, adrIdLocalites, adrComplement, email, telephone, siteWeb, note, idUserMaj, idUser) VALUES (:organismeNom, :contactNom, :contactPrenom, :adrNum, :adrBis, :adrIdTypesVoie, :adrVoie, :adrIdLocalites, :adrComplement, :email, :telephone, :siteWeb, :note, :idUserMaj, :idUser)";
        if ($this->executeRequest($sql, ["organismeNom" => $organisme, "contactNom" => $nom, "contactPrenom" => $prenom, "adrNum" => $adrNum, "adrBis" => $adrBis, "adrIdTypesVoie" => $adrIdTypesVoie, "adrVoie" => $adrVoie, "adrIdLocalites" => $adrIdLocalites, "adrComplement" => $adrCompl, "email" => $email, "telephone" => $tel, "siteWeb" => $site, "note" => $note, "idUserMaj" => $userId, "idUser" => $userId])){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Edition d'un contact pour un utilisateur
     * @param string $organisme = libelle de l'organisme du contact
     * @param string $nom = libelle du nom du contact
     * @param string $prenom = libelle du prenom du contact
     * @param string $adrNum = libelle du numéro de rue du contact
     * @param string $adrBis = libelle du multiplicatif de rue du contact
     * @param string $adrType = libelle du type de voie du contact
     * @param string $adrVoie = libelle de la rue du contact
     * @param string $adrIdLocalites = libelle de la ville du contact
     * @param string $adrCompl = libelle du complément d'adresse du contact
     * @param string $email = libelle de l'email du contact
     * @param string $tel = libelle du téléphone du contact
     * @param string $site = libelle du site internet du contact
     * @param string $note = libelle d'une note complémentaire sur le contact
     * @param string $userId = ID de l'utilisateur qui créé le contact
     */
    public function updateContact($organisme, $nom, $prenom, $adrNum, $adrBis, $adrIdTypesVoie, $adrVoie, $adrIdLocalites, $adrCompl, $email, $tel, $site, $note, $userId, $idToUpdate) {

        $sql = "UPDATE " . self::$_prefix . "Contacts SET `organismeNom` = :organismeNom, `contactNom` = :contactNom, `contactPrenom` = :contactPrenom, `adrNum` = :adrNum, `adrBis` = :adrBis, `adrIdTypesVoie` = :adrIdTypesVoie, `adrVoie` = :adrVoie, `adrIdLocalites` = :adrIdLocalites, `adrComplement` = :adrComplement, `email` = :email, `telephone` = :telephone, `siteWeb` = :siteWeb, `note` = :note, `idUserMaj` = :idUserMaj, `idUser` = :idUser WHERE `id` = $idToUpdate";
        if ($this->executeRequest($sql, ["organismeNom" => $organisme, "contactNom" => $nom, "contactPrenom" => $prenom, "adrNum" => $adrNum, "adrBis" => $adrBis, "adrIdTypesVoie" => $adrIdTypesVoie, "adrVoie" => $adrVoie, "adrIdLocalites" => $adrIdLocalites, "adrComplement" => $adrCompl, "email" => $email, "telephone" => $tel, "siteWeb" => $site, "note" => $note, "idUserMaj" => $userId, "idUser" => $userId])){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Suppression d'un contact pour un utilisateur
     * @param string $idToDelete = ID du contact à supprimer
     */
    public function deleteContact($idToDelete) {

        $sql = "DELETE FROM " . self::$_prefix . "Contacts WHERE `id` = :id";
        if ($this->executeRequest($sql, ["id" => $idToDelete])){
            return true;
        } else {
            return false;
        }
    }

}