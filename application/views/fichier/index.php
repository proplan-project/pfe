<div class="pull-right">
	<a href="<?php echo site_url('fichier/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Fichier</th>
		<th>Id Projet</th>
		<th>Telecharge Par</th>
		<th>Nom</th>
		<th>Size</th>
		<th>Date Creation</th>
		<th>Description</th>
		<th>Actions</th>
    </tr>
	<?php foreach($fichier as $f){ ?>
    <tr>
		<td><?php echo $f['id_fichier']; ?></td>
		<td><?php echo $f['id_projet']; ?></td>
		<td><?php echo $f['telecharge_par']; ?></td>
		<td><?php echo $f['nom']; ?></td>
		<td><?php echo $f['size']; ?></td>
		<td><?php echo $f['date_creation']; ?></td>
		<td><?php echo $f['description']; ?></td>
		<td>
            <a href="<?php echo site_url('fichier/edit/'.$f['id_fichier']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('fichier/remove/'.$f['id_fichier']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
