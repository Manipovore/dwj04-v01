<div class="row">
    <div class="col-md-8">
        <a href="<?= Core\HTTP\Url::getUrl() . '/preambule'; ?>">Commencer au commencement ... Préambule -></a>
        <hr>
        <p>Les 10 derniers posts: </p>
        <hr>
        <div class="card-column">
            <?php for($i = 0; $i < 10 ;$i++ ) : ?>
                <div class="card border-dark bg-dark">
                    <div class="card-body bg-dark">
                        <h5 class="card-header bg-dark border-white"><a class="text-warning" href="<?= html_entity_decode($posts[$i]->category_slug .'/'. $posts[$i]->slug .'/'. $posts[$i]->page); ?>"><?= html_entity_decode($posts[$i]->title); ?></a></h5>
                        <p class="card-text text-white"><?= html_entity_decode(substr($posts[$i]->content,0 , 250)); ?> ...</p>
                        <div class="card-footer bg-dark border-white"><small class="text-muted"><?= html_entity_decode($posts[$i]->category_title); ?> / page: <?= html_entity_decode($posts[$i]->page); ?></small></div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="col-md-4">
        <?php require("app/Views/templates/categories.php"); ?>
    </div>
</div>