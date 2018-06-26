<h4>Gérer les commentaires</h4>
<hr>

<?php $session = Core\Session\Session::getInstance(); ?>
<?php if($session->hasFlashes()) : ?>
    <?php foreach($session->getFlashes() as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<h6>Commentaires Signalés</h6>
<?php if($nbrCommentsReport != 0): ?>
    <table class="table jumbotron">
        <thead>
        <tr>
            <td>Page</td>
            <td>Titre de la page</td>
            <td>Auteur</td>
            <td>Contenu</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($comments as $comment): ?>
            <?php if(!empty($comment) && $comment->report == 1 ): ?>
                <tr>
                    <td><?= $comment->page; ?></td>
                    <td><?= $comment->title; ?></td>
                    <td><?= $comment->author; ?></td>
                    <td><em><?= substr($comment->content,0, 50); ?> [...]</em></td>
                    <td>
                        <a href="../admin/comments/<?= $comment->id; ?>/show/<?= $comment->post_id; ?>" class="btn btn-primary">Voir</a>
                        <a href="../admin/comments/<?= $comment->id; ?>/approved" class="btn btn-warning">Approuver</a>
                        <form action="../admin/comments/delete/<?= $comment->id; ?>" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $comment->id; ?>">
                            <button type="submit" class="btn btn-danger" href="../admin/comments/delete/<?= $comment->id; ?>">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p> <em>Aucun commentaire signalé</em> </p>
<?php endif; ?>
<hr>

<h6>Nouveau commentaires</h6>
<?php if($nbrCommentsNew != 0): ?>
    <table class="table jumbotron">
        <thead>
        <tr>
            <td>Page</td>
            <td>Titre de la page</td>
            <td>Auteur</td>
            <td>Contenu</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($comments as $comment): ?>
            <?php if($comment->approved == null ): ?>
                <tr>
                    <td><?= $comment->page; ?></td>
                    <td><?= $comment->title; ?></td>
                    <td><?= $comment->author; ?></td>
                    <td><em><?= substr($comment->content,0, 50); ?> [...]</em></td>
                    <td>
                        <a href="../admin/comments/<?= $comment->id; ?>/show/<?= $comment->post_id; ?>" class="btn btn-primary">Voir</a>
                        <a href="../admin/comments/<?= $comment->id; ?>/approved" class="btn btn-warning">Approuver</a>
                        <form action="../admin/comments/delete/<?= $comment->id; ?>" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $comment->id; ?>">
                            <button type="submit" class="btn btn-danger" href="../admin/comments/delete/<?= $comment->id; ?>">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p> <em>Aucun nouveau commentaire</em> </p>
<?php endif; ?>
<hr>
<h6>Tous les commentaires</h6>
<table class="table jumbotron">
    <thead>
    <tr>
        <td>Page</td>
        <td>Titre de la page</td>
        <td>Auteur</td>
        <td>Contenu</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($comments as $comment): ?>
        <tr>
            <td><?= $comment->page; ?></td>
            <td><?= $comment->title; ?></td>
            <td><?= $comment->author; ?></td>
            <td><em><?= substr($comment->content,0, 50); ?> [...]</em></td>
            <td id="btnAction">
                <a href="../admin/comments/<?= $comment->id; ?>/show/<?= $comment->post_id; ?>" class="btn btn-primary">Voir</a>
                <form action="../admin/comments/delete/<?= $comment->id; ?>" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $comment->id; ?>">
                    <button type="submit" class="btn btn-danger" href="../admin/comments/delete/<?= $comment->id; ?>">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>