<?php

require_once 'Framework/Model.php';

class Department extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function getDepartments() {

        $sql = "SELECT * FROM `Departements`";
        $departments = $this->executeRequest($sql, null);

        return $departments->fetchAll();
    }

}