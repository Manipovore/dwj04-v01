<div class="row">
    <div class="col-sm-8">
        <h2>Toutes les Chapitres</h2>
        <div id="list_post" class="row">
            <?php foreach ($categories as $category) : ?>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?= $category->category_slug ?>"><?= $category->category_title; ?></a></h5>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
