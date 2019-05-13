<div class="pull-right">
	<a href="<?php echo site_url('utilisateur_a_equipe/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Utilisateur</th>
		<th>Id Equipe</th>
		<th>Actions</th>
    </tr>
	<?php foreach($utilisateur_a_equipe as $u){ ?>
    <tr>
		<td><?php echo $u['id_utilisateur']; ?></td>
		<td><?php echo $u['id_equipe']; ?></td>
		<td>
            <a href="<?php echo site_url('utilisateur_a_equipe/edit/'.$u['']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('utilisateur_a_equipe/remove/'.$u['']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
