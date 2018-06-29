
<form method="post" class="jumbotron">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>