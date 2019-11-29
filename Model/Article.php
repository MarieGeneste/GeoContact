<?php

require_once 'Framework/Model.php';

class Article extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function getArticles() {
        $sql = "SELECT title, content FROM " . self::$_prefix . "Contenu WHERE ciblePage = 'accueil' AND cibleDiv = 'article'";
        $homeArticles = $this->executeRequest($sql);
        return $homeArticles;
    }

}