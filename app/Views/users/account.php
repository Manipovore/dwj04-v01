<h2>Bienvenue <?= $user->username; ?></h2>
<hr>
<div class="row">
    <div class="col-sm-8">
        <h4>Rôle: <?= html_entity_decode($user->role); ?></h4>
        <p>Nom: <?= html_entity_decode($user->username); ?></p>
        <p>Email: <?= html_entity_decode($user->email); ?></p>
    </div>
</div>