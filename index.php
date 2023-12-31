<?php

require_once "./src/Views/includes/head.php";
include "./vendor/autoload.php";

 $routes = [
    '/' => 'HomeController::index',
    '/admin' => 'AdminController::index',
    '/admin/panel' => 'AdminController::adminPanel',
    '/login' => 'LoginController::index',
    '/register' => 'RegisterController::index',
    '/logout' => 'LogoutController::index',
    '/profile' => 'ProfileController::index',
    '/profile/edit' => 'ProfileController::editProfile',
    '/actuality' => 'ForumController::index',
    '/annonce' => 'AnnonceController::index',
    '/annonce/create' => 'AnnonceController::createAnnnonce',
    '/annonce/list' => 'AnnonceController::getAnnonceUserLoggedIn',
    '/annonce/me' => 'AnnonceController::getAnnonceUserLoggedIn',
    '/annonce/detail' => 'AnnonceController::createAnnnonce',
    '/category' => 'CategoryController::displayByCategory',
    '/message' => 'MessageController::index',
    '/wallet' => 'WalletController::index',
    '/wallet/create' => 'WalletController::newWallet'
   
];

$requestUrl = $_SERVER['REQUEST_URI'];

 

// Extraire le chemin d'URL sans la chaîne de requête
$parsedUrl = parse_url($requestUrl);
$path = $parsedUrl['path'];
// Récupérer l'URL demandée
//$requestUri = $_SERVER['REQUEST_URI'];

// Vérifier si l'URL correspond à une route définie
if (array_key_exists($path, $routes)) {
    // Extraire le contrôleur et la méthode à partir de la route
    $routeParts = explode('::', $routes[$path]);
    $controllerName = $routeParts[0];
    $methodName = $routeParts[1];

    // Inclure le fichier du contrôleur
    require_once './src/Controllers/' . $controllerName . '.php';

    // Instancier le contrôleur
    $controller = new $controllerName();


    // Appeler la méthode du contrôleur
    $controller->$methodName();
} else {
    // Gérer la page non trouvée (404)
    echo 'Page not found';
  //dump($controller);
}  ?>


