<?php

require_once 'Framework/Model.php';

class Department extends Model {

    /** 
     * Retourne tous les départements
     */
    public function getDepartments() {

        $sql = "SELECT * FROM " . $this->_prefix . "Departements ORDER BY `libelle`";
        $departments = $this->executeRequest($sql, null);

        return $departments->fetchAll();
    }

    /** 
     * Retourne un département
     * @param int $id = id du département recherché
     */
    public function findOneBy($id) {

        $sql = "SELECT * FROM " . $this->_prefix . "Departements WHERE `id` = ?";
        $department = $this->executeRequest($sql, array($id));

        return $department->fetch();
    }

    /** 
     * Retourne un département
     * @param string $code = code du département recherché
     * @param string $libelle = libelle du département recherché
     */
    public function insertDep($code, $libelle, $userId) {

        $sql = "INSERT INTO " . $this->_prefix . "Departements (code, libelle, idUserMaj, dateMaj) VALUES (:code, :libelle, :idUserMaj, CURRENT_TIMESTAMP)";
        if ($this->executeRequest($sql, ["code" => $code, "libelle" => $libelle, "idUserMaj" => $userId])){
            return true;
        } else {
            return false;
        }
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

        $sql = "UPDATE " . $this->_prefix . "Departements SET `code` = :code, `libelle` = :libelle, `idUserMaj` = :idUserMaj, `dateMaj` = CURRENT_TIMESTAMP, `dateMajPrevious` = :previousMaj WHERE `id` = $id";
        if ($this->executeRequest($sql, array("code" => $code, "libelle" => $libelle, "idUserMaj" => $userId, "previousMaj" => $previousMaj))){
            return true;
        } else {
            return false;
        }
    }

    /** 
     * Retourne un département
     * @param int $id = id du département recherché
     */
    public function deleteDep($id) {

        $sql = "DELETE FROM " . $this->_prefix . "Departements WHERE `id` = :id";
        if ($this->executeRequest($sql, ["id" => $id])){
            return true;
        } else {
            return false;
        }
    }

    /** 
     * Return "true" si un département est trouvé avec ces code ou ce libellé
     * Sinon return "false
     * @param int $code = code du département recherché
     * @param int $libelle = libelle du département recherché
     */
    public function depExist($code, $libelle, $id = null) {

        if ($id != null) {
            $sql = "SELECT * FROM " . $this->_prefix . "Departements WHERE (`code` = :code OR `libelle` = :libelle) AND `id` != :id" ;
            $existantDep = $this->executeRequest($sql, ["code" => $code, "libelle" => $libelle, "id" => $id]);
        } else {
            $sql = "SELECT * FROM " . $this->_prefix . "Departements WHERE `code` = :code OR `libelle` = :libelle" ;
            $existantDep = $this->executeRequest($sql, ["code" => $code, "libelle" => $libelle]);
        }
        $existantDepFound = $existantDep->fetch();

        if(!empty($existantDepFound)){
            return true;
        } else {
            return false;
        }
    }

}

