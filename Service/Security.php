<?php

class Security
{
    public function checkInputFields($_method, $name)
    {
        if(isset($_method[$name]))
        {
            $_method[$name] = trim($_method[$name]);
            $_method[$name] = stripslashes($_method[$name]);
            $_method[$name] = htmlspecialchars($_method[$name]);
            return $_method[$name];
        }
        else
        {
            throw new Exception("Le champs ". $name ."n'est pas renseigné");
        }
    }

    public static function verifyInput($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
}
