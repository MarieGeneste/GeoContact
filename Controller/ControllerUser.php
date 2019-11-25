<?php

require_once 'Framework/Controller.php';


class ControllerUser extends Controller {

    public function index(){

        $this->generateView();
    }

    public function login(){
        $this->generateView();
    }
}