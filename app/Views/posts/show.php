<div class="row">
    <div class="col-sm-8">
        <div id="list_post">
            <h2><?= html_entity_decode($post->title); ?></h2>
            <p> <em><?= html_entity_decode($post->category_title); ?> / page: <?= html_entity_decode($post->page); ?></em> </p>
            <p> <?= html_entity_decode($post->content); ?></p>
        </div>
        <nav aria-label="Pagination">
            <ul class="pagination justify-content-center">
                <li id="paginationPrev" class="page-item"><a class="page-link" href="#" onclick="left();">Précédent</a></li>
                <?php
                foreach($pagination as $k => $v){
                    echo $v;
                }
                ?>
                <li id="paginationNext" class="page-item"><a class="page-link" href="#" onclick="right();">Suivant</a></li>
            </ul>
        </nav>
    </div>

    <div class="col-sm-4">
        <?php require("app/Views/templates/categories.php"); ?>
    </div>
</div>

<?php
//liste des commentaires
require ROOT . 'app/Views/comments/list.php';
?>