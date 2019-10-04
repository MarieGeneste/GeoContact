<?php

require_once 'Framework/Model.php';

class Article extends Model {

    /** 
     * Ici, ajouter les fonctions de récupération de données voulue
     */
    public function getArticles() {
        $sql = "SELECT title, content FROM Contenu WHERE Contenu.ciblePage = 'accueil' AND Contenu.cibleDiv = 'article'";
        $homeArticles = $this->executeRequest($sql);
        return $homeArticles;
    }

}