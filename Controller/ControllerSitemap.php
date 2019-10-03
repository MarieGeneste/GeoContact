<?php

require_once 'Framework/Controller.php';


class ControllerSitemap extends Controller {
    
    // Affiche la page 
    public function index() {
        $this->generateView();
    }

}
