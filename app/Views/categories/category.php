<h1><?= $categorie->category_title ?></h1>
<div class="row">
    <div class="col-sm-8">
        <div id="list_post" class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="card border-dark bg-dark">
                    <div class="card-body bg-dark">
                        <h5 class="card-header bg-dark border-white"><a class="text-warning" href="<?= html_entity_decode($post->category_slug .'/'. $post->slug .'/'. $post->id); ?>"><?= html_entity_decode($post->title); ?></a></h5>
                        <p class="card-text text-white"><?= html_entity_decode(substr($post->content,0 , 250)); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-sm-4">
        <?php require("app/Views/templates/categories.php"); ?>
    </div>
</div>