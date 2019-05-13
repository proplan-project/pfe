<div class="pull-right">
	<a href="<?php echo site_url('client/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Client</th>
		<th>Id Utilisateur</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Nom Entreprise</th>
		<th>Ville</th>
		<th>Code Postal</th>
		<th>Pays</th>
		<th>Telephone</th>
		<th>Site</th>
		<th>Adresse</th>
		<th>Actions</th>
    </tr>
	<?php foreach($client as $c){ ?>
    <tr>
		<td><?php echo $c['id_client']; ?></td>
		<td><?php echo $c['id_utilisateur']; ?></td>
		<td><?php echo $c['nom']; ?></td>
		<td><?php echo $c['prenom']; ?></td>
		<td><?php echo $c['nom_entreprise']; ?></td>
		<td><?php echo $c['ville']; ?></td>
		<td><?php echo $c['code_postal']; ?></td>
		<td><?php echo $c['pays']; ?></td>
		<td><?php echo $c['telephone']; ?></td>
		<td><?php echo $c['site']; ?></td>
		<td><?php echo $c['adresse']; ?></td>
		<td>
            <a href="<?php echo site_url('client/edit/'.$c['id_client']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('client/remove/'.$c['id_client']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
