<!-- ----- debut de la page login -->
<?php include 'fragment/fragmentWikiHeader.php'; ?>

<body>
    <div class="container">
        <?php
        include 'fragment/fragmentWikiMenu.php';
        include 'fragment/fragmentWikiJumbotron.html';
        ?>
    </div>
    <div class="container">
        <h2>Connexion</h2>
        <p>Veuillez entrer vos identifiants pour vous connecter.</p>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="router.php?action=login">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
    <?php include 'fragment/fragmentWikiFooter.html'; ?>

</body>

</html>