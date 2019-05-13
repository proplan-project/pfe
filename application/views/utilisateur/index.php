<div class="pull-right">
	<a href="<?php echo site_url('utilisateur/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Utilisateur</th>
		<th>Is Admin</th>
		<th>Id Createur</th>
		<th>Password</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Type</th>
		<th>Email</th>
		<th>Tel</th>
		<th>Genre</th>
		<th>Date Creation</th>
		<th>Image</th>
		<th>Adresse</th>
		<th>Actions</th>
    </tr>
	<?php foreach($utilisateur as $u){ ?>
    <tr>
		<td><?php echo $u['id_utilisateur']; ?></td>
		<td><?php echo $u['is_admin']; ?></td>
		<td><?php echo $u['id_createur']; ?></td>
		<td><?php echo $u['password']; ?></td>
		<td><?php echo $u['nom']; ?></td>
		<td><?php echo $u['prenom']; ?></td>
		<td><?php echo $u['type']; ?></td>
		<td><?php echo $u['email']; ?></td>
		<td><?php echo $u['tel']; ?></td>
		<td><?php echo $u['genre']; ?></td>
		<td><?php echo $u['date_creation']; ?></td>
		<td><?php echo $u['image']; ?></td>
		<td><?php echo $u['adresse']; ?></td>
		<td>
            <a href="<?php echo site_url('utilisateur/edit/'.$u['id_utilisateur']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('utilisateur/remove/'.$u['id_utilisateur']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
