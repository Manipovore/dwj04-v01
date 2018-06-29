<h1>S'inscrire</h1>
<hr>
<?php if($errors) : ?>
    <div class="alert alert-danger">
        <h4>L'Email ne peut être envoyé !</h4>
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('email', 'Email'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <?= $form->input('password_confirm', 'Confirmer le mot de passe', ['type' => 'password']); ?>
    <div class="g-recaptcha" data-sitekey="6LeuuEUUAAAAAK1xLrSBTMz889czAzZg1EXKTD7N"></div>
    <hr>
    <?= $form->submit(); ?>
</form>


