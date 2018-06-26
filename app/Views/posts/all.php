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
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="<?= Core\HTTP\Url::getUrl() . '/posts/' . $prev; ?>">Précédent</a></li>
                <?php for( $i = 1 ; $i < $pagination + 1; $i++) : ?>
                    <?php if($currentNav == $i) : ?>
                        <li class="page-item active"><a class="page-link" href="<?= Core\HTTP\Url::getUrl() . '/posts/' . $i; ?>"><?= $i; ?><span class="sr-only">(current)</span></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="<?= Core\HTTP\Url::getUrl() . '/posts/' . $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php
                    if($next > $pagination){
                        $next -= 1;
                    }
                ?>
                <li class="page-item"><a class="page-link" href="<?= Core\HTTP\Url::getUrl() . '/posts/' . ($next); ?>">Suivant</a></li>
            </ul>
        </nav>
    </div>

    <div class="col-sm-4">
        <?php require("app/Views/templates/categories.php"); ?>
    </div>
</div>