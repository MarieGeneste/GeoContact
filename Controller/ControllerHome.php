<?php

require_once 'Framework/Controller.php';
require_once 'Model/Article.php';

class ControllerHome extends Controller {

    private $homeArticles;

    public function __construct() {
        $this->homeArticles = new Article();
    }

    // Affiche la page d'acceuil
    public function index() {
        $articles = $this->homeArticles->getArticles();
        $this->generateView(array('articles' => $articles));
        $this->generateView();
    }

}

