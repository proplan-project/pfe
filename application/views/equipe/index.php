<div class="pull-right">
	<a href="<?php echo site_url('equipe/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Equipe</th>
		<th>Id Createur</th>
		<th>Nom</th>
		<th>Titre Emploi</th>
		<th>Actions</th>
    </tr>
	<?php foreach($equipe as $e){ ?>
    <tr>
		<td><?php echo $e['id_equipe']; ?></td>
		<td><?php echo $e['id_createur']; ?></td>
		<td><?php echo $e['nom']; ?></td>
		<td><?php echo $e['titre_emploi']; ?></td>
		<td>
            <a href="<?php echo site_url('equipe/edit/'.$e['id_equipe']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('equipe/remove/'.$e['id_equipe']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
