<div class="pull-right">
	<a href="<?php echo site_url('note/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Note</th>
		<th>Id Projet</th>
		<th>Id Createur</th>
		<th>Titre</th>
		<th>Date Creation</th>
		<th>Description</th>
		<th>Actions</th>
    </tr>
	<?php foreach($note as $n){ ?>
    <tr>
		<td><?php echo $n['id_note']; ?></td>
		<td><?php echo $n['id_projet']; ?></td>
		<td><?php echo $n['id_createur']; ?></td>
		<td><?php echo $n['titre']; ?></td>
		<td><?php echo $n['date_creation']; ?></td>
		<td><?php echo $n['description']; ?></td>
		<td>
            <a href="<?php echo site_url('note/edit/'.$n['id_note']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('note/remove/'.$n['id_note']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
