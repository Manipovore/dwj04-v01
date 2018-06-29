<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="public/images/favicon.ico">
    <title>Administration</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Core\HTTP\Url::getUrl(); ?>/public/css/adminStyle.css" rel="stylesheet">
    <!-- editeur adm -->
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div id="nav-second" class="container">
        <h1 id="site-title" style="color: white; width: 50%;">Billet simple pour l'Alaska</h1>
        <?php if( isset($_SESSION['auth']) ) :?>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="width:50%; display: flex; justify-content: flex-end;">
                <li class="nav-item">
                    <a class="navbar-brand" href="<?= Core\HTTP\Url::getUrl() ?>/logout"> <i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>
<nav id="nav-primary" class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?= Core\HTTP\Url::getUrl() ?>/home"> Vers le site Utilisateur -><span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top: 20px; padding: 10px;">

    <h2>Administration</h2>
    <hr>
    <div class="row starter-template" style="margin-top: 20px; padding: 10px;">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="<?= Core\HTTP\Url::getUrl() . '/admin';?>" role="tab" aria-controls="v-pills-home" aria-selected="true">Tableau de bord</a>
                <a class="nav-link" id="v-pills-post-tab" data-toggle="pill" href="<?= Core\HTTP\Url::getUrl() . '/admin/posts';?>" role="tab" aria-controls="v-pills-post" aria-selected="true">Articles</a>
                <a class="nav-link" id="v-pills-category-tab" data-toggle="pill" href="<?= Core\HTTP\Url::getUrl() . '/admin/categories';?>" role="tab" aria-controls="v-pills-category" aria-selected="false">Catégories</a>
                <a class="nav-link" id="v-pills-user-tab" data-toggle="pill" href="<?= Core\HTTP\Url::getUrl() . '/admin/users';?>" role="tab" aria-controls="v-pills-user" aria-selected="false">Utilisateurs</a>
                <a class="nav-link" id="v-pills-com-tab" data-toggle="pill" href="<?= Core\HTTP\Url::getUrl() . '/admin/comments';?>" role="tab" aria-controls="v-pills-com" aria-selected="false">Commentaires</a>
            </div>
        </div>
        <div class="col-md-9">
            <?= $content; ?>
        </div>
    </div>
</div><!-- /.container -->

<footer class="footer bg-dark" style="height:100px;">
    <div class="container">
        <hr>
        <p style="text-align: center; color: cadetblue;">Copyright <?= date("Y");?> - Jean Forteroche - Développé par WEBAGENCY</p>
    </div>
</footer>

</body>
</html>
