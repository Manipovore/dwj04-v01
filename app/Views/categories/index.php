<div class="row">
    <div class="col-md-8">
        <h2>Toutes les Chapitres</h2>
        <div class="card-desk">
            <?php foreach ($categories as $category) : ?>
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title"><a class="text-info"href="<?= html_entity_decode($category->category_slug); ?>"><?= html_entity_decode($category->category_title); ?></a></h5>
                        <p class="card-text text-white"><?= html_entity_decode($category->category_description); ?></p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
