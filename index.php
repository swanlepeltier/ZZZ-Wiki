<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Location: app/router/router.php?action=wikiAccueil');
