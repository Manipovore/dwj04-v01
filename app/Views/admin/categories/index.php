<h4>Gérer les catégories</h4>
<hr>

<?php $session = Core\Session\Session::getInstance(); ?>
<?php if($session->hasFlashes()) : ?>
    <?php foreach($session->getFlashes() as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<p>
    <a href="../admin/categories/add" class="btn btn-warning"> Ajouter une catégorie</a>
</p>
<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($categories as $category): ?>
        <tr>
            <td><?= $category->id; ?></td>
            <td><?= $category->category_title; ?></td>
            <td>
                <a href="../admin/categories/edit/<?= $category->id; ?>" class="btn btn-primary">Editer</a>
                <form action="../admin/categories/delete/<?= $category->id; ?>" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $category->id; ?>">
                    <button type="submit" class="btn btn-danger" href="admin/categories/delete/<?= $category->id; ?>">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>