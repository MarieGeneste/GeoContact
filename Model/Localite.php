<?php

require_once 'Framework/Model.php';

class Localite extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function getLocalites() {

        $localites = $this->executeRequest("SELECT * FROM `Localites` ORDER BY `codePostal`");

        return $localites->fetchAll();
    }

    /** 
     * Retourne une localité
     * var $depId = id de la localité recherchée
     */
    public function findOneBy($id) {

        $sql = "SELECT * FROM `Localites` WHERE `id` = ?";
        $localite = $this->executeRequest($sql, array($id));

        return $localite->fetch();
    }

    /** 
     * Retourne un département
     * @param string $codePostal = code Postal du département recherché
     * @param string $libelle = libelle du département recherché
     * @param string $codeInsee = code Insee du département recherché
     * @param string $depId = id du département de rattachement
     * @param string $userId = id de l'admin de rattachement
     */
    public function insertLoc($codePostal, $libelle, $codeInsee, $depId, $userId) {

        $sql = "INSERT INTO `Localites` (codePostal, libelle, codeInsee, idDepartements, idUserMaj, dateMaj) VALUES (:codePostal, :libelle, :codeInsee, :depId, :idUserMaj, CURRENT_TIMESTAMP)";
        if ($this->executeRequest($sql, ["codePostal" => $codePostal, "libelle" => $libelle, "codeInsee" => $codeInsee, "depId" => $depId, "idUserMaj" => $userId])){
            return true;
        } else {
            return false;
        }
    }

    /** 
     * Retourne un département
     * @param string $codePostal = code Postal du département recherché
     * @param string $libelle = libelle du département recherché
     * @param string $codeInsee = code Insee du département recherché
     * @param string $depId = id du département de rattachement
     * @param string $userId = id de l'admin de rattachement
     */
    public function updateLoc($id, $codePostal, $libelle, $codeInsee, $depId, $userId) {

        $depToEdit = $this->findOneBy($id);
        $previousMaj = $depToEdit["dateMaj"];

        $sql = "UPDATE `Localites` SET `codePostal` = :codePostal, `libelle` = :libelle, `codeInsee` = :codeInsee, `idDepartements` = :depId, `idUserMaj` = :idUserMaj, `dateMaj` = CURRENT_TIMESTAMP, `dateMajPrevious` = :previousMaj WHERE `id` = $id";
        if ($this->executeRequest($sql, array("codePostal" => $codePostal, "libelle" => $libelle, "codeInsee" => $codeInsee, "depId" => $depId, "idUserMaj" => $userId, "previousMaj" => $previousMaj))){
            return true;
        } else {
            return false;
        }
    }

    /** 
     * Retourne un département
     * @param int $id = id du département recherché
     */
    public function deleteLoc($id) {

        $sql = "DELETE FROM `Localites` WHERE `id` = :id";
        if ($this->executeRequest($sql, ["id" => $id])){
            return true;
        } else {
            return false;
        }
    }

    /** 
     * Return "true" si une localité est trouvé avec ces code ou ce libellé
     * Sinon return "false
     * @param int $codePostal = code postal de la localité recherché
     * @param int $libelle = libelle de la localité recherché
     */
    public function locExist($codePostal, $libelle) {

        $sql = "SELECT * FROM `Localites` WHERE `codePostal` = :codePostal OR `libelle` = :libelle" ;
        $existantLoc = $this->executeRequest($sql, ["codePostal" => $codePostal, "libelle" => $libelle]);
        $existantLocFound = $existantLoc->fetch();
        
        if(!empty($existantLocFound)){
            return true;
        } else {
            return false;
        }
    }

}