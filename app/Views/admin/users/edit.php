<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->select('role', 'Rôle utilisateur', ['admin' => 'Administrateur', 'author' => 'Auteur', 'user' => 'Utilisateur']); ?>
    <?= $form->input('email', 'Email', ['type' => 'email']); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>