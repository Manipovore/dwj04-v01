<div class="row">
    <div class="col-sm-8">
        <div id="list_post" class="row">
            <h2><?= $post->title; ?></h2>
            <p> <em><?= $post->category_title; ?> / page: <?= $post->page; ?></em> </p>
            <p> <?= $post->content; ?></p>
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