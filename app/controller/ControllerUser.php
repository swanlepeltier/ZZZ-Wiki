<!-- ----- debut ControllerUser -->
<?php
require_once '../model/ModelUser.php';

class ControllerUser
{
    // --- Login page
    public static function loginPage()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewLogin.php';
        if (DEBUG)
            echo ("ControllerUser : loginPage : vue = $vue");
        require($vue);
    }

    // --- Login
    public static function login()
    {
        include 'config.php';
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = ModelUser::checkLogin($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: router.php?action=wikiAccueil');
                exit;
            } else {
                $error = "Identifiants incorrects.";
                require($root . '/app/view/viewLogin.php');
            }
        } else {
            self::loginPage();
        }
    }

    // --- Logout
    public static function logout()
    {
        session_destroy();
        header('Location: router.php?action=wikiAccueil');
        exit;
    }

    // --- Register page
    public static function registerPage()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewRegister.php';
        if (DEBUG)
            echo ("ControllerUser : registerPage : vue = $vue");
        require($vue);
    }

    // --- Register
    public static function register()
    {
        include 'config.php';
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'] ?? 'user';

            $id = ModelUser::insert($username, $password, $email, $role);
            if ($id > 0) {
                $user = ModelUser::getById($id);
                $_SESSION['user'] = (array) $user;
                header('Location: router.php?action=wikiAccueil');
                exit;
            } else {
                $error = "Erreur lors de l'inscription.";
                require($root . '/app/view/viewRegister.php');
            }
        } else {
            self::registerPage();
        }
    }

    // TODO: ajouter d'autres méthodes pour la gestion des utilisateurs
}
?>
<!-- ----- fin ControllerUser -->