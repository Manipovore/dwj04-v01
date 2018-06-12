<div class="row">
    <div class="col-sm-8">
        <div id="list_post">
            <h2><?= html_entity_decode($post->title); ?></h2>
            <p> <em><?= html_entity_decode($post->category_title); ?> / page: <?= html_entity_decode($post->page); ?></em> </p>
            <p> <?= html_entity_decode($post->content); ?></p>
        </div>
    </div>

    <div class="col-sm-4">
        <?php require("app/Views/templates/categories.php"); ?>
    </div>
</div>