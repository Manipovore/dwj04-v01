<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div id="nav-second" class="container">
        <h1 id="site-title"><a class="navbar-brand" href="<?= App\app::getUrl(); ?>/home">Billet simple pour l'Alaska</a></h1>
        <?php if( isset($_SESSION['auth']) ) :?>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php if( $_SESSION['auth']->role === "admin" || $_SESSION['auth']->role === "author" ) :?>
                <li class="nav-item">
                    <a class="navbar-brand" href="<?= App\app::getUrl(); ?>/admin"> <i class="fas fa-cog fa-spin"></i> Administration</a>
                </li>
            <?php else :?>
                <li class="nav-item">
                    <a class="navbar-brand" href="<?= App\app::getUrl(); ?>/account"> <i class="fas fa-user-circle"></i> Compte</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="navbar-brand" href="<?= App\app::getUrl(); ?>/logout"> <i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
            </li>
        </ul>
    <?php else :?>
        <ul id="nav-connect" class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="navbar-brand" href="<?= App\app::getUrl(); ?>/register"> <i class="fas fa-user-plus"></i> S'inscrire</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="<?= App\app::getUrl(); ?>/login"> <i class="fas fa-sign-in-alt"></i> Se connecter</a>
            </li>
        </ul>
    <?php endif; ?>
    </div>
</nav>
<nav id="nav-primary" class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= App\app::getUrl(); ?>/home"><i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= App\app::getUrl(); ?>/categories"><i class="fas fa-th-large"></i> Tous les chapitres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= App\app::getUrl(); ?>/posts"><i class="fas fa-file-alt"></i> Tous les articles</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher ..." aria-label="Search">
                <button class="btn btn-outline-dark my-2 my-sm-0 bg-dark" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>