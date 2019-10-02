<?php

require_once 'Request.php';
require_once 'View.php';

/**
 * Abstrac class Controller
 * Give common service to the link Controller
 * 
 * Based on Baptiste Pesquet tutorial
 */
abstract class Controller {

    /** Action to perform */
    private $action;
    
    /** Incoming request */
    protected $request;

    /**
     * Define the incoming request
     * 
     * @param Request $request Incoming request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the action to perform.
     * Call the method which have the same name as the currrent Controller action
     * 
     * @throws Exception If the action doesn't exist in the current Controller
     */
    public function executeAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            if($_GET["id"]){
                $id = Security::verifyInput($_GET["id"]);
                $this->{$this->action}($id);
            } else {
                $this->{$this->action}();
            }
        }
        else {
            $classController = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classController");
        }
    }

    /** 
     * Abstract method corresponding at the default action
     * Force classes to implement this action by default
     */
    public abstract function index();

    /**
     * Generate the view paired to the current Controller
     * 
     * @param array $dataView Data needed to create the view
     */
    protected function generateView($dataView = array())
    {
        // Determination of view file name based on current Controller name
        $classController = get_class($this);
        $controller = str_replace("Controller", "", $classController);
        
        // Instanciation and generation of the view
        $view = new View($this->action, $controller);
        $view->generate($dataView);
    }

}
