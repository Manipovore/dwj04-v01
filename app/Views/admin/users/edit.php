<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->select('role', 'Rôle utilisateur', ['admin' => 'Administrateur', 'author' => 'Auteur', 'user' => 'Utilisateur']); ?>
    <?= $form->input('email', 'Email', ['type' => 'email']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>