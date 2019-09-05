<?php

require_once 'Framework/Model.php';

class Variable extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function getBillets() {
        $sql = 'SELECT * FROM ...';
        $vars = $this->executeRequest($sql);
        return $vars;
    }

}