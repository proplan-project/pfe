<div class="pull-right">
	<a href="<?php echo site_url('equipe_a_projet/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Projet</th>
		<th>Id Equipe</th>
		<th>Actions</th>
    </tr>
	<?php foreach($equipe_a_projet as $e){ ?>
    <tr>
		<td><?php echo $e['id_projet']; ?></td>
		<td><?php echo $e['id_equipe']; ?></td>
		<td>
            <a href="<?php echo site_url('equipe_a_projet/edit/'.$e['']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('equipe_a_projet/remove/'.$e['']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
