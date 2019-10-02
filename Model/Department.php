<?php

require_once 'Framework/Model.php';

class Department extends Model {

    /** 
     * Retourne tous les départements
     */
    public function getDepartments() {

        $sql = "SELECT * FROM `Departements` ORDER BY `code`";
        $departments = $this->executeRequest($sql, null);

        return $departments->fetchAll();
    }

    /** 
     * Retourne un département
     * @param int $id = id du département recherché
     */
    public function findOneBy($id) {

        $sql = "SELECT * FROM `Departements` WHERE `id` = ?";
        $department = $this->executeRequest($sql, array($id));

        return $department->fetch();
    }

    /** 
     * Retourne un département
     * @param string $code = code du département recherché
     * @param string $libelle = libelle du département recherché
     */
    public function insertDep($code, $libelle, $userId) {

        $sql = "INSERT INTO `Departements` (code, libelle, idUserMaj, dateMaj) VALUES (:code, :libelle, :idUserMaj, CURRENT_TIMESTAMP)";
        $this->executeRequest($sql, ["code" => $code, "libelle" => $libelle, "idUserMaj" => $userId]);

        return true;
    }

    /** 
     * Retourne un département
     * @param int $id = id du département recherché
     * @param string $code = code du département recherché
     * @param string $libelle = libelle du département recherché
     */
    public function updateDep($id, $code, $libelle, $userId) {

        $depToEdit = $this->findOneBy($id);
        $previousMaj = $depToEdit["dateMaj"];

        $sql = "UPDATE `Departements` SET `code` = :code, `libelle` = :libelle, `idUserMaj` = :idUserMaj, `dateMaj` = CURRENT_TIMESTAMP, `dateMajPrevious` = :previousMaj WHERE `id` = $id";
        $this->executeRequest($sql, array("code" => $code, "libelle" => $libelle, "idUserMaj" => $userId, "previousMaj" => $previousMaj));
        return true;
    }

    /** 
     * Retourne un département
     * @param int $id = id du département recherché
     */
    public function deleteDep($id) {

        $sql = "DELETE FROM `Departements` WHERE `id` = :id";
        $this->executeRequest($sql, ["id" => $id]);

        return true;
    }

}

