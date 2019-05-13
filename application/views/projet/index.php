<div class="pull-right">
	<a href="<?php echo site_url('projet/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Projet</th>
		<th>Id Client</th>
		<th>Titre</th>
		<th>Date Debut</th>
		<th>Date Limite</th>
		<th>Date Creation</th>
		<th>Status</th>
		<th>Prix</th>
		<th>Description</th>
		<th>Actions</th>
    </tr>
	<?php foreach($projet as $p){ ?>
    <tr>
		<td><?php echo $p['id_projet']; ?></td>
		<td><?php echo $p['id_client']; ?></td>
		<td><?php echo $p['titre']; ?></td>
		<td><?php echo $p['date_debut']; ?></td>
		<td><?php echo $p['date_limite']; ?></td>
		<td><?php echo $p['date_creation']; ?></td>
		<td><?php echo $p['status']; ?></td>
		<td><?php echo $p['prix']; ?></td>
		<td><?php echo $p['description']; ?></td>
		<td>
            <a href="<?php echo site_url('projet/edit/'.$p['id_projet']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('projet/remove/'.$p['id_projet']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
