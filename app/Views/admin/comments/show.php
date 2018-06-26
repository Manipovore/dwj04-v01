<div>
    <h2><?= html_entity_decode($post->title); ?></h2>
    <p> <em> Page: <?= html_entity_decode($post->page); ?></em> </p>
    <hr>
    <h3>Commentaire:</h3>
    <p> <em> De: <?= html_entity_decode($comment->username); ?></em> <em> le <?= html_entity_decode($comment->date); ?></em> </p>
    <p> <?= html_entity_decode($comment->content); ?> </p>
    <form action="../admin/posts/delete/<?= $comment->id; ?>" method="post" style="display: inline;">
        <input type="hidden" name="id" value="<?= $comment->id; ?>">
        <button type="submit" class="btn btn-danger" href="../admin/posts/delete/<?= $comment->id; ?>">Supprimer</button>
    </form>
</div>
