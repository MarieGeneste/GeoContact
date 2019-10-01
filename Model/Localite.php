<?php

require_once 'Framework/Model.php';

class Localite extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function getLocalites() {

        $localites = $this->executeRequest("SELECT * FROM `Localites`");

        return $localites->fetchAll();
    }

}