<!-- ----- début viewRegister -->

<?php include 'fragment/fragmentWikiHeader.php'; ?>

<body>
    <div class="container">
        <?php
        include 'fragment/fragmentWikiMenu.php';
        include 'fragment/fragmentWikiJumbotron.html';
        ?>

        <?php if (isset($error) && !empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form role="form" method='post' action='router.php?action=register'>
            <div class="form-group">
                <input type="hidden" name='action' value='register'>
                <label class='w-25' for="username">Nom d'utilisateur : </label><input type="text" name='username' size='75' required> <br />
                <label class='w-25' for="password">Mot de passe : </label><input type="password" name='password' size='75' required> <br />
                <label class='w-25' for="email">Email : </label><input type="email" name='email' size='75' required> <br />
                <label class='w-25' for="role">Rôle : </label>
                <select name='role'>
                    <option value='user'>Utilisateur</option>
                    <option value='admin'>Administrateur</option>
                </select> <br />
            </div>
            <p />
            <br />
            <button class="btn btn-primary" type="submit">S'inscrire</button>
        </form>
        <p />
    </div>
    <?php include 'fragment/fragmentWikiFooter.html'; ?>

    <!-- ----- fin viewRegister -->