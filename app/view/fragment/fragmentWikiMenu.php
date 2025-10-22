<!-- ----- début fragmentWikiMenu -->

<nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router.php?action=wikiAccueil">
            <?php
            if ($user) {
                echo htmlspecialchars($user['username']);
            } else {
                echo 'ZZZ Wiki';
            }
            ?>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="router.php?action=listPages">Pages</a>
                </li>
                <?php if ($user): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?action=editPage">Créer une page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?action=logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?action=loginPage">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?action=registerPage">Inscription</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- ----- fin fragmentWikiMenu -->