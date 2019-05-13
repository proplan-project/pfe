<?php echo form_open('facture/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_projet" class="col-md-4 control-label">Projet</label>
		<div class="col-md-8">
			<select name="id_projet" class="form-control">
				<option value="">select projet</option>
				<?php 
				foreach($all_projet as $projet)
				{
					$selected = ($projet['id_projet'] == $this->input->post('id_projet')) ? ' selected="selected"' : "";

					echo '<option value="'.$projet['id_projet'].'" '.$selected.'>'.$projet['id_projet'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_projet');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="id_client" class="col-md-4 control-label">Client</label>
		<div class="col-md-8">
			<select name="id_client" class="form-control">
				<option value="">select client</option>
				<?php 
				foreach($all_client as $client)
				{
					$selected = ($client['id_client'] == $this->input->post('id_client')) ? ' selected="selected"' : "";

					echo '<option value="'.$client['id_client'].'" '.$selected.'>'.$client['id_client'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_client');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="date_facture" class="col-md-4 control-label"><span class="text-danger">*</span>Date Facture</label>
		<div class="col-md-8">
			<input type="text" name="date_facture" value="<?php echo $this->input->post('date_facture'); ?>" class="form-control" id="date_facture" />
			<span class="text-danger"><?php echo form_error('date_facture');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="date_echeance" class="col-md-4 control-label"><span class="text-danger">*</span>Date Echeance</label>
		<div class="col-md-8">
			<input type="text" name="date_echeance" value="<?php echo $this->input->post('date_echeance'); ?>" class="form-control" id="date_echeance" />
			<span class="text-danger"><?php echo form_error('date_echeance');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="montant" class="col-md-4 control-label"><span class="text-danger">*</span>Montant</label>
		<div class="col-md-8">
			<input type="text" name="montant" value="<?php echo $this->input->post('montant'); ?>" class="form-control" id="montant" />
			<span class="text-danger"><?php echo form_error('montant');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="paiement_recu" class="col-md-4 control-label"><span class="text-danger">*</span>Paiement Recu</label>
		<div class="col-md-8">
			<input type="text" name="paiement_recu" value="<?php echo $this->input->post('paiement_recu'); ?>" class="form-control" id="paiement_recu" />
			<span class="text-danger"><?php echo form_error('paiement_recu');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label"><span class="text-danger">*</span>Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
			<span class="text-danger"><?php echo form_error('status');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>