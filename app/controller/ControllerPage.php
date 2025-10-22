<!-- ----- debut ControllerPage -->
<?php
require_once '../model/ModelPage.php';
require_once '../model/ModelUser.php';

class ControllerPage
{
    // --- Liste des pages
    public static function listPages()
    {
        $pages = ModelPage::getAll();
        include 'config.php';
        $vue = $root . '/app/view/viewListPages.php';
        if (DEBUG)
            echo ("ControllerPage : listPages : vue = $vue");
        require($vue);
    }

    // --- Voir une page
    public static function viewPage()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $page = ModelPage::getById($id);
            if ($page) {
                include 'config.php';
                $vue = $root . '/app/view/viewPage.php';
                require($vue);
            } else {
                // Page non trouvée
                header('Location: router.php?action=listPages');
            }
        } else {
            self::listPages();
        }
    }

    // --- Editer une page
    public static function editPage()
    {
        $user = $_SESSION['user'] ?? null;
        if (!$user) {
            header('Location: router.php?action=loginPage');
            exit;
        }

        $id = $_GET['id'] ?? null;
        $page = null;
        if ($id) {
            $page = ModelPage::getById($id);
        }

        include 'config.php';
        $vue = $root . '/app/view/viewEditPage.php';
        if (DEBUG)
            echo ("ControllerPage : editPage : vue = $vue");
        require($vue);
    }

    // --- Sauvegarder une page
    public static function savePage()
    {
        $user = $_SESSION['user'] ?? null;
        if (!$user) {
            header('Location: router.php?action=loginPage');
            exit;
        }

        if (isset($_POST['title']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $id = $_POST['id'] ?? null;

            if ($id) {
                // Update
                ModelPage::update($id, $title, $content);
            } else {
                // Insert
                ModelPage::insert($title, $content, $user['id']);
            }

            header('Location: router.php?action=listPages');
            exit;
        } else {
            self::editPage();
        }
    }

    // TODO: ajouter d'autres méthodes pour la gestion des pages
}
?>
<!-- ----- fin ControllerPage -->