<h1>Se connecter</h1>
<hr>
<?php if($errors) : ?>
	<div class="alert alert-danger">
		<h4>Identifiants incorrects</h4>
		<hr>
		<p><a href="">J'ai oublié mon Mot de passe</a></p>
		<p><em>Dans le cas de votre première connexion veillez à confirmer votre compte via l'Email qui vous a été envoyé.</em></p>
	</div>
<?php endif; ?>
<form method="post">
	<?= $form->input('username', 'Pseudo'); ?>
	<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
	<?= $form->submit(); ?>
</form>