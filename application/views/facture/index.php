<div class="pull-right">
	<a href="<?php echo site_url('facture/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Facture</th>
		<th>Id Projet</th>
		<th>Id Client</th>
		<th>Date Facture</th>
		<th>Date Echeance</th>
		<th>Montant</th>
		<th>Paiement Recu</th>
		<th>Status</th>
		<th>Actions</th>
    </tr>
	<?php foreach($facture as $f){ ?>
    <tr>
		<td><?php echo $f['id_facture']; ?></td>
		<td><?php echo $f['id_projet']; ?></td>
		<td><?php echo $f['id_client']; ?></td>
		<td><?php echo $f['date_facture']; ?></td>
		<td><?php echo $f['date_echeance']; ?></td>
		<td><?php echo $f['montant']; ?></td>
		<td><?php echo $f['paiement_recu']; ?></td>
		<td><?php echo $f['status']; ?></td>
		<td>
            <a href="<?php echo site_url('facture/edit/'.$f['id_facture']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('facture/remove/'.$f['id_facture']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
