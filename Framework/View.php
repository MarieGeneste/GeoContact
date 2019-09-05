<?php

require_once 'Configuration.php';

/**
 * Class the create a view
 *
 * Based on Baptiste Pesquet tutorial
 */
class View {

    /** File name associate to the view */
    private $file;

    /** View title (Define in the view file) */
    private $title;

    /**
     * Constructor
     * 
     * @param string $action Action linked to the view
     * @param string $controller Controller name linked to the view
     */
    public function __construct($action, $controller = "") {
        // Determination of the view file name based on constructor and action
        // e.g. : View/<$controller>/<$action>.php
        $file = "View/";
        if ($controller != "") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    /**
     * Generate and show the view
     * 
     * @param array $data Data needed to the view generation
     */
    public function generate($data) {
        // Genration of the specific part of the view
        $content = $this->generateFile($this->file, $data);
        // We define a local variable that we can access on the view for the webroot
        $webroot = Configuration::get("webroot", "/");
        // Genration of the common template using the specific part
        $view = $this->generateFile('View/template.php',
                array('title' => $this->title, 'content' => $content,
                    'webroot' => $webroot));
        // Return the generate view
        echo $view;
    }

    /**
     * Generate a view file and return the result
     * 
     * @param string $file View file path to generate
     * @param array $data Data needed to the view generation
     * @return string Result of the view generation
     * @throws Exception If the view file is not found
     */
    private function generateFile($file, $data) {
        if (file_exists($file)) {
            // Allow access to elements of the data array in the view
            extract($data);
            // Start to buffering
            ob_start();
            // Include the view file and stock it in the buffering
            require $file;
            // Return of the buffering
            return ob_get_clean();
        }
        else {
            throw new Exception("File '$file' introuvable");
        }
    }

    /**
     * Sanitize value send to the HTML
     * Avoid XSS 
     * 
     * @param string $value Value to sanitize
     * @return string Sanitize value
     */
    private function san($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

}
