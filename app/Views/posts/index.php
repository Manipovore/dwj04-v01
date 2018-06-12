<div class="row">
    <div class="col-sm-8">
        <p>Les articles: </p>
        <hr>
        <div class="card-column">
            <?php foreach ($posts as $post) : ?>
                <div class="card border-dark bg-dark">
                    <div class="card-body bg-dark">
                        <h5 class="card-header bg-dark border-white"><a class="text-warning" href="<?= html_entity_decode($post->category_slug .'/'. $post->slug .'/'. $post->id); ?>"><?= html_entity_decode($post->title); ?></a></h5>
                        <p class="card-text text-white"><?= html_entity_decode(substr($post->content,0 , 250)); ?> ...</p>
                        <div class="card-footer bg-dark border-white"><small class="text-muted"><?= html_entity_decode($post->category_title); ?> / page: <?= html_entity_decode($post->page); ?></small></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-sm-4">
        <?php require("app/Views/templates/categories.php"); ?>
    </div>
</div>