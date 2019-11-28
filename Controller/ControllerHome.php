<?php

require_once 'Framework/Controller.php';
require_once 'Model/Article.php';

class ControllerHome extends Controller {

    private $homeArticles;
    private $webroot;


    public function __construct() {
        $this->homeArticles = new Article();
        $this->webroot = Configuration::get("webroot");

    }

    // Affiche la page d'acceuil
    public function index() {
        // Si connexion redirection vers userDashboard
        if(isset($_SESSION["userGeoContact"])) {
            header('Location: ' . $this->webroot . 'User');
        } else {
            $articles = $this->homeArticles->getArticles();
            $this->generateView(array('articles' => $articles));
        }

    }

}