<?php

/**
 * Manager database connection configuration
 * Based on Baptiste Pesquet tutorial
 */
class Configuration {

    /** Array of configuration parameters */
    private static $parameters;

    /**
     * Return value of a configuration parameter
     * 
     * @param string $name Parameter name
     * @param string $defaultValue Default value to return
     * @return string Parameter value
     */
    public static function get($name, $defaultValue = null) {
        if (isset(self::getParameters()[$name])) {
            $value = self::getParameters()[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

    /**
     * Return array of parameters and load them if needed from a config file.
     * Config file are Config/dev.ini and Config/prod.ini (in that order)
     * 
     * @return array Array of parameters
     * @throws Exception If no config file founded
     */
    private static function getParameters() {
        if (self::$parameters == null) {
            $filePath = "Config/dev.ini";
            if (!file_exists($filePath)) {
                $filePath = "Config/prod.ini";
            }
            if (!file_exists($filePath)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else {
                self::$parameters = parse_ini_file($filePath);
            }
        }
        return self::$parameters;
    }

}

