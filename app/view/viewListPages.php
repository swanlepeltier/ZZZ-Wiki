<!-- ----- début viewListPages -->
<?php

require('fragment/fragmentWikiHeader.php');
?>

<body>
    <div class="container">
        <?php
        include 'fragment/fragmentWikiMenu.php';
        include 'fragment/fragmentWikiJumbotron.html';
        ?>

        <h2>Liste des Pages</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pages as $page) {
                    $author = ModelUser::getById($page->getAuthorId());
                    printf(
                        "<tr><td><a href='router.php?action=viewPage&id=%d'>%s</a></td><td>%s</td><td><a href='router.php?action=editPage&id=%d'>Editer</a></td></tr>",
                        $page->getId(),
                        htmlspecialchars($page->getTitle()),
                        htmlspecialchars($author ? $author->getUsername() : 'Inconnu'),
                        $page->getId()
                    );
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'fragment/fragmentWikiFooter.html'; ?>

    <!-- ----- fin viewListPages -->