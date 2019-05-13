<div class="pull-right">
	<a href="<?php echo site_url('commentaire/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Commentaire</th>
		<th>Id Projet</th>
		<th>Id Createur</th>
		<th>Date Creation</th>
		<th>Description</th>
		<th>Actions</th>
    </tr>
	<?php foreach($commentaire as $c){ ?>
    <tr>
		<td><?php echo $c['id_commentaire']; ?></td>
		<td><?php echo $c['id_projet']; ?></td>
		<td><?php echo $c['id_createur']; ?></td>
		<td><?php echo $c['date_creation']; ?></td>
		<td><?php echo $c['description']; ?></td>
		<td>
            <a href="<?php echo site_url('commentaire/edit/'.$c['id_commentaire']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('commentaire/remove/'.$c['id_commentaire']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
