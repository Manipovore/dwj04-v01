<h1><?= $categorie->category_title ?></h1>
<div class="row">
    <div class="col-sm-8">
        <div id="list_post" class="row">
            <?php foreach ($posts as $post) : ?>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?= $post->category_slug .'/'. $post->slug .'/'. $post->id ?>"><?= $post->title; ?></a></h5>
                            <p class="card-text"><?= substr($post->content,0 , 250); ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="list-group">
            <a href="<?= './categories' ?>" class="list-group-item list-group-item-action list-group-item-dark">Les Chapitres: </a>
            <a href="<?= './chapitre1' ?>" class="list-group-item list-group-item-action"> chapitre 1</a>
            <a href="<?= './chapitre2' ?>" class="list-group-item list-group-item-action"> chapitre 2</a>
            <a href="<?= './chapitre3' ?>" class="list-group-item list-group-item-action"> chapitre 3</a>
            <a href="<?= './chapitre4' ?>" class="list-group-item list-group-item-action"> chapitre 4</a>
        </div>
    </div>
</div>