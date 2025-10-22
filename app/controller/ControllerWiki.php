<!-- ----- debut ControllerWiki -->
<?php
require_once '../model/ModelUser.php';
require_once '../model/ModelPage.php';

class ControllerWiki
{
    // --- page d'accueil
    public static function wikiAccueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewWikiAccueil.php';
        if (DEBUG)
            echo ("ControllerWiki : wikiAccueil : vue = $vue");
        require($vue);
    }

    // TODO: ajouter d'autres méthodes générales si nécessaire
}
?>
<!-- ----- fin ControllerWiki -->