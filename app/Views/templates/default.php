
<?php require 'header.php' ?>

<div class="container">
    <div class="template">
        <?php $session = Core\Session\Session::getInstance(); ?>
        <?php if($session->hasFlashes()) : ?>
            <?php foreach($session->getFlashes() as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?= $content; ?>
    </div>
</div><!-- /.container -->

<?php require 'footer.php' ?>