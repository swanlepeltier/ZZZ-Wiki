<!-- ----- début viewPage -->
<?php

require('fragment/fragmentWikiHeader.php');
?>

<body>
    <div class="container">
        <?php
        include 'fragment/fragmentWikiMenu.php';
        include 'fragment/fragmentWikiJumbotron.html';
        ?>

        <h2><?php echo htmlspecialchars($page->getTitle()); ?></h2>
        <p><em>Par <?php $author = ModelUser::getById($page->getAuthorId());
                    echo htmlspecialchars($author ? $author->getUsername() : 'Inconnu'); ?> le <?php echo $page->getCreatedAt(); ?></em></p>
        <div><?php echo nl2br(htmlspecialchars($page->getContent())); ?></div>
        <br>
        <a href="router.php?action=editPage&id=<?php echo $page->getId(); ?>" class="btn btn-secondary">Editer</a>
        <a href="router.php?action=listPages" class="btn btn-primary">Retour à la liste</a>
    </div>
    <?php include 'fragment/fragmentWikiFooter.html'; ?>

    <!-- ----- fin viewPage -->