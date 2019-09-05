<?php

// Contrôleur frontal : instancie un router pour traiter la requête entrante

require 'Framework/Router.php';

$router = new Router();
$router->routerRequest();


