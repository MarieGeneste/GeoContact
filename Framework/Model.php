<?php

require_once 'Configuration.php';

/**
 * Abstract class Model.
 * Centralize database access services
 *
 * Based on Baptiste Pesquet tutorial
 */
abstract class Model {

    /** PDO Object to access database shared by all Class */
    private static $db;

    /**
     * Execute an SQL request
     * 
     * @param string $sql SQL request
     * @param array $params Request parameters
     * @return PDOStatement Request result
     */
    protected function executeRequest($sql, $params = null) {
        if ($params == null) {
            $result = self::getDatabase()->query($sql);   // direct execution
        }
        else {
            $result = self::getDatabase()->prepare($sql); // prepared execution
            $result->execute($params);
        }
        return $result;
    }

    /**
     * Return a connexion object to the database and initiate it if needed
     * 
     * @return PDO PDO Object to connect to the database
     */
    private static function getDatabase() {
        if (self::$db === null) {
            // Get configuration parameters
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $password = Configuration::get("password");
            // Connection creation
            self::$db = new PDO($dsn, $login, $password, 
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        }
        return self::$db;
    }

}
