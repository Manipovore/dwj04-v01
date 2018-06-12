<h4>Gérer les articles</h4>
<hr>
<p>
    <a href="../admin/posts/add/" class="btn btn-warning"> Ajouter un article </a>
</p>
<table class="table">
    <thead>
    <tr>
        <td>Page</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post->page; ?></td>
            <td><?= $post->title; ?></td>
            <td>
                <a href="../admin/posts/edit/<?= $post->id; ?>" class="btn btn-primary">Editer</a>
                <form action="../admin/posts/delete/<?= $post->id; ?>" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $post->id; ?>">
                    <button type="submit" class="btn btn-danger" href="../admin/posts/delete/<?= $post->id; ?>">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>