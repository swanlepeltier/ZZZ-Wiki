<?php
require('../controller/ControllerWiki.php');
require('../controller/ControllerUser.php');
require('../controller/ControllerPage.php');

$query_string = $_SERVER['QUERY_STRING'];
parse_str($query_string, $param);

$action = htmlspecialchars($param["action"] ?? "wikiAccueil");

// Table de routage : action => [Contrôleur, méthode]
$routes = [
    // Wiki général
    "wikiAccueil"      => ["ControllerWiki", "wikiAccueil"],
    // User
    "loginPage"        => ["ControllerUser", "loginPage"],
    "login"            => ["ControllerUser", "login"],
    "logout"           => ["ControllerUser", "logout"],
    "registerPage"     => ["ControllerUser", "registerPage"],
    "register"         => ["ControllerUser", "register"],
    // Page
    "listPages"        => ["ControllerPage", "listPages"],
    "viewPage"         => ["ControllerPage", "viewPage"],
    "editPage"         => ["ControllerPage", "editPage"],
    "savePage"         => ["ControllerPage", "savePage"],
    // TODO: ajouter d'autres routes selon les besoins
];

if (isset($routes[$action])) {
    $controller = $routes[$action][0];
    $method = $routes[$action][1];
    $controller::$method();
} else {
    // Action inconnue, redirection vers accueil
    header('Location: router.php?action=wikiAccueil');
}
