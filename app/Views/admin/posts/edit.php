<?php
$chaine = '<p>chaine de caractère</p>';
$html_decode = html_entity_decode($chaine);
var_dump($html_decode);
var_dump(htmlentities($html_decode));
?>



<div class="row">
    <?= $html_decode;?>
    <div class="col-md-8">
        <form method="post">
            <?= $form->input('title', 'Titre de l\'article'); ?>
            <?= $form->select('category_id', 'Catégorie', $categories); ?>
            <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>
    <div class="col-md-4">
        <?= '<p>Posté le <time datetime="'.$post->date.'">'.$post->date.'</time></p>'; ?>
        <?= '<p> Par: '.$post->author.'</p>' ;?>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) ).catch( error => {console.error( error );} );
</script>
