<?php 

define('CONTROL', true);

$routes = require_once('inclui/routes.php');
require_once('inclui/apiConsumo.php');

$route = $_GET['route'] ?? 'home';

if(!in_array($route, $routes)) {
    $route = '404';
}

//meu fluxo de rotas

switch($route){
    case 'home':
        require_once 'inclui/header.php';
        require_once 'scripts/home.php';
        require_once 'inclui/footer.php';
        break;
    case 'pais':
        require_once 'inclui/header.php';
        require_once 'scripts/pais.php';
        require_once 'inclui/footer.php';
        break;        
    case '404':
        require_once 'inclui/header.php';
        require_once 'scripts/404.php';
        require_once 'inclui/footer.php';
        break;    
}

?>