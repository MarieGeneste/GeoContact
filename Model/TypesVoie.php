<?php

require_once 'Framework/Model.php';

class TypesVoie extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function getTypesVoies() {

        $typesVoies = $this->executeRequest("SELECT * FROM " . self::$_prefix . "TypesVoie");

        return $typesVoies->fetchAll();
    }

}