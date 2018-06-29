<h4>Gérer les Utilisateurs</h4>
<hr>

<?php $session = Core\Session\Session::getInstance(); ?>
<?php if($session->hasFlashes()) : ?>
	<?php foreach($session->getFlashes() as $type => $message): ?>
		<div class="alert alert-<?= $type; ?>">
			<?= $message; ?>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<p>
	<a href="../admin/users/add/" class="btn btn-warning"> Ajouter un utilisateur</a>
</p>
<table class="table">
	<thead>
	<tr>
		<td>ID</td>
		<td>Pseudo</td>
		<td>Role</td>
		<td>Date d'inscription</td>
		<td>Actions</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach($users as $user): ?>
		<tr>
			<td><?= $user->id; ?></td>
			<td><?= $user->username; ?></td>
			<td><?= $user->role; ?></td>
			<td><?= $user->confirmed_at; ?></td>
			<td>
				<a href="../admin/users/edit/<?= $user->id; ?>" class="btn btn-primary">Editer</a>
				<form action="../admin/users/delete/<?= $user->id; ?>" method="post" onsubmit='return confirm("Vous confirmez la suppression ?")' style="display: inline;">
					<input type="hidden" name="id" value="<?= $user->id; ?>">
					<button type="submit" class="btn btn-danger" href="../admin/users/delete/<?= $user->id; ?>">Supprimer</button>
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>