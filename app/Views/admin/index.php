
<div class="row jumbotron" style="flex; flex-direction: column;">
    <div class="col-md-12">
        <div class="card-deck">
            <div class="card border-dark">
                <img class="card-img-top" src="<?= Core\HTTP\Url::getUrl() . '/public/images/backend/posts.png' ?>" alt="Card image cap">
                <div class="card-body ">
                    <h5 class="card-title">Articles</h5>
                    <p class="card-text">Les articles constituent les pages de votre livre numérique.</p>
                    <a href="<?= Core\HTTP\Url::getUrl() . '/admin/posts' ?>" class="btn btn-dark"> Gestion des articles</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Posts</small>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?= Core\HTTP\Url::getUrl() . '/public/images/backend/categories.png' ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Catégories</h5>
                    <p class="card-text">Les catégories représentent les chapitre de votre livre numérique.</p>
                    <a href="<?= Core\HTTP\Url::getUrl() . '/admin/categories' ?>" class="btn btn-dark"> Gestion des catégories</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Categories</small>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="<?= Core\HTTP\Url::getUrl() . '/public/images/backend/users.png' ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text">Ici vous pouvez gérer les utilisateurs du site. Ajouter un co-auteur ou supprimer un utilisateurs malveillant.</p>
                    <a href="<?= Core\HTTP\Url::getUrl() . '/admin/users' ?>" class="btn btn-dark">Utilisateurs</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Users</small>
                </div>
            </div>
        </div>

        <hr>

        <div class="card border-dark mb-3" style="max-width: 18rem; margin: auto;">
            <div class="card-header">Commentaires</div>
            <img class="card-img-top" src="<?= Core\HTTP\Url::getUrl() . '/public/images/backend/comments.jpg' ?>" alt="Card image cap">
            <div class="card-body text-primary">
                <h5 class="card-title">Commentaires</h5>
                <a href="<?= Core\HTTP\Url::getUrl() . '/admin/comments' ?>" class="btn btn-dark">Gestion des commentaires</a>
            </div>
        </div>
    </div>
</div>


