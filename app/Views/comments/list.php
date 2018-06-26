

<div class="row">
    <div class="col-sm-8">
        <hr>
        <div class="title_comment">
            <h4>Commentaires</h4>
            <div class="fa-3x">
				<span class="fa-layers fa-fw">
					<i class="fas fa-envelope"></i>
					<span class="fa-layers-counter" style="background:#343a40"><?= $nbrComments; ?></span>
				</span>
            </div>
        </div>
        <hr>
        <div class="jumbotron">
            <?php if($session->read('auth')):?>
                <h5>Laisser votre commentaire</h5>
                <form method="post">
                    <?= $form->input('content', '', ['type' => 'textarea']); ?>
                    <button class="btn btn-primary">Sauvegarder</button>
                </form>
            <?php else: ?>
                <div style="text-align: center;">
                    <h5>Connectez-vous pour laisser un commentaire</h5>
                    <p><a href="../../login"><button  class="btn btn-primary">Se connecter</button></a></p>
                </div>
            <?php endif; ?>
        </div>
        <div id="list_comments">
            <?php if($session->read('flash')):?>
            <?php foreach ($session->getFlashes() as $type => $message) : ?>
            <div class="alert alert-<?= $type; ?> role="alert"">
            <p style="text-align: center; margin: 15px;"><b><?= $message; ?></b></p>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php foreach ($comments as $comment) : ?>
            <div class="comment jumbotron">
                <div class="comment_info">
                    <span class="comment_author"> Par <b><?= $comment->username; ?></b> </span>
                    <span class="comment_date"> Le <em><?=date("d-m-Y", strtotime($comment->date) ); ?></em> à <em><?=date("H:i", strtotime($comment->date) ); ?></em></span>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <img src="../../public/images/none.png" class="img-thumbnail" alt="Responsive image"/>
                    </div>
                    <div class="col-md-10">
                        <?= html_entity_decode($comment->content); ?>
                    </div>
                </div>
                <hr>
                <em><a href="../../report/<?= $comment->id; ?>/<?= $slugCategory . '/' . $slug . '/' . $id ?>">Signaler ce commentaire</a></em>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
</div>
</div>