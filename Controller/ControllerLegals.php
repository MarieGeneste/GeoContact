<?php

require_once 'Framework/Controller.php';


class ControllerLegals extends Controller {
    
    // Affiche la page 
    public function index() {
        $this->generateView();
    }

}
