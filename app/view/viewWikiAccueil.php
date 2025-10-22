<!-- ----- debut de la page wiki_accueil -->
<?php include 'fragment/fragmentWikiHeader.php'; ?>

<body>
    <div class="container">
        <?php
        include 'fragment/fragmentWikiMenu.php';
        include 'fragment/fragmentWikiJumbotron.html';
        ?>
    </div>
    <div class="container">
        <h2>Bienvenue sur le Wiki ZZZ</h2>
        <p>Ce wiki contient toutes les informations sur le jeu Zenless Zone Zero.</p>
        <p>Vous pouvez consulter les pages existantes ou en créer de nouvelles si vous êtes connecté.</p>
        <a href="router.php?action=listPages" class="btn btn-primary">Voir les pages</a>
        <?php
        include 'fragment/fragmentWikiFooter.html';
        ?>

        <!-- ----- fin de la page wiki_accueil -->

</body>

</html>