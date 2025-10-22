<!-- ----- debut config -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

// ===============
// Configuration de la base de données
$dsn = 'mysql:dbname=zzz_wiki;host=localhost;charset=utf8';
$username = 'root';
$password = '';

if (!defined('LOCAL')) {
    define('LOCAL', TRUE); // Ajuster selon l'environnement
}

// chemin absolu vers le répertoire du projet
$root = dirname(dirname(__DIR__)) . "/";

if (DEBUG) {
    echo ("<ul>");
    echo (" <li>dsn = $dsn</li>");
    echo (" <li>username = $username</li>");
    echo (" <li>password = $password</li>");
    echo (" <li>root = $root</li>");
    echo ("</ul>");
}
?>
<!-- ----- fin config -->