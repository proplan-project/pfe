<div class="pull-right">
	<a href="<?php echo site_url('tache/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Tache</th>
		<th>Id Projet</th>
		<th>Assigne A</th>
		<th>Titre</th>
		<th>Date Debut</th>
		<th>Date Limite</th>
		<th>Status</th>
		<th>Description</th>
		<th>Actions</th>
    </tr>
	<?php foreach($tache as $t){ ?>
    <tr>
		<td><?php echo $t['id_tache']; ?></td>
		<td><?php echo $t['id_projet']; ?></td>
		<td><?php echo $t['assigne_a']; ?></td>
		<td><?php echo $t['titre']; ?></td>
		<td><?php echo $t['date_debut']; ?></td>
		<td><?php echo $t['date_limite']; ?></td>
		<td><?php echo $t['status']; ?></td>
		<td><?php echo $t['description']; ?></td>
		<td>
            <a href="<?php echo site_url('tache/edit/'.$t['id_tache']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('tache/remove/'.$t['id_tache']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
