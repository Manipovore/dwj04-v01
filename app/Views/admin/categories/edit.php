
<form method="post">
    <?= $form->input('category_title', 'Titre de la catégorie'); ?>
    <?= $form->input('category_description', 'Description', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
