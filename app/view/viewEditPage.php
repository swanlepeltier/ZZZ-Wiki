<!-- ----- début viewEditPage -->

<?php
require('fragment/fragmentWikiHeader.php');
?>

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

        <form role="form" method='post' action='router.php?action=savePage'>
            <div class="form-group">
                <input type="hidden" name='action' value='savePage'>
                <?php if ($page): ?>
                    <input type="hidden" name='id' value='<?php echo $page->getId(); ?>'>
                <?php endif; ?>
                <label class='w-25' for="title">Titre : </label><input type="text" name='title' size='75' value='<?php echo $page ? htmlspecialchars($page->getTitle()) : ''; ?>' required> <br />
                <label class='w-25' for="content">Contenu : </label><br /><textarea name='content' rows='20' cols='80' required><?php echo $page ? htmlspecialchars($page->getContent()) : ''; ?></textarea> <br />
            </div>
            <p />
            <br />
            <button class="btn btn-primary" type="submit">Sauvegarder</button>
        </form>
        <p />
    </div>
    <?php include 'fragment/fragmentWikiFooter.html'; ?>

    <!-- ----- fin viewEditPage -->