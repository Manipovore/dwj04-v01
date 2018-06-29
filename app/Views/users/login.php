<h1>Se connecter</h1>
<hr>
<?php if($errors) : ?>
	<div class="alert alert-danger">
		<h4>Identifiants incorrects ou Recaptcha non coché !!</h4>
		<hr>
		<p><em>Dans le cas de votre première connexion pensez à confirmer votre compte via l'Email qui vous a été envoyé.</em></p>
		<hr>
		<em><a href="">J'ai oublié mon mot de passe</a></em>
	</div>
<?php endif; ?>
<form method="post">
	<?= $form->input('username', 'Pseudo'); ?>
	<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
	<div class="g-recaptcha" data-sitekey="6LeuuEUUAAAAAK1xLrSBTMz889czAzZg1EXKTD7N"></div>
	<hr>
	<?= $form->submit(); ?>
</form>