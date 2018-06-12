
<div class="list-group">
    <a href="<?= './categories' ?>" class="list-group-item list-group-item-action list-group-item-info">Les Chapitres: </a>
    <?php foreach ($categories as $category) : ?>
        <a href=" <?= Core\HTTP\Url::getUrl() . '/' . $category->category_slug ?>" class="list-group-item list-group-item-action"> <?= $category->category_title; ?></a>
    <?php endforeach; ?>
</div>