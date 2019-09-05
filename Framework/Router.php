<?php

require_once 'Controller.php';
require_once 'Request.php';
require_once 'View.php';

/*
 * Routing class of incoming request
 * 
 * Based on Baptiste Pesquet tutorial
 */
class Router {

    /**
     * Main method called by the front controller
     * Look at the request and execute the appropriate action
     */
    public function routerRequest() {
        try {
            // Fusion of GET and POST request parameters
            // Allow to manage both types as the same
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->manageError($e);
        }
    }

    /**
     * Instanciate the appropriate Controller depend on received request
     * 
     * @param Request $request Received request
     * @return Instance of a controller
     * @throws Exception If creation of controller miss
     */
    private function createController(Request $request) {
        // Thanks to the rewrite, incoming URL look like :
        // index.php?controller=XXX&action=YYY&id=ZZZ

        $controller = "Home";  // Default controller
        if ($request->parameterExist('controller')) {
            $controller = $request->getParameter('controller');
            // First letter in captial
            $controller = ucfirst(strtolower($controller));
        }
        // Create file name of controller
        // e.g. : Controller/Controller<$controller>.php
        $classController = "Controller" . $controller;
        $fileController = "Controller/" . $classController . ".php";
        if (file_exists($fileController)) {
            // Require of the needed controller
            require($fileController);
            $controller = new $classController();
            $controller->setRequest($request);
            return $controller;
        }
        else {
            throw new Exception("File '$fileController' introuvable");
        }
    }

    /**
     * Determinate the action to execute depend on received request
     * 
     * @param Request $request Received request
     * @return string Action to execute
     */
    private function createAction(Request $request) {
        $action = "index";  // Default action
        if ($request->parameterExist('action')) {
            $action = $request->getParameter('action');
        }
        return $action;
    }

    /**
     * Manage execution error (exception)
     * 
     * @param Exception $exception Exception which happened
     */
    private function manageError(Exception $exception) {
        $view = new View('error');
        $view->generate(array('msgError' => $exception->getMessage()));
    }

}
