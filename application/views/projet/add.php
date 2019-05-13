<?php echo form_open('projet/add',array("class"=>"form-horizontal")); ?>

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
		</div>
	</div>
	<div class="form-group">
		<label for="titre" class="col-md-4 control-label"><span class="text-danger">*</span>Titre</label>
		<div class="col-md-8">
			<input type="text" name="titre" value="<?php echo $this->input->post('titre'); ?>" class="form-control" id="titre" />
			<span class="text-danger"><?php echo form_error('titre');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="date_debut" class="col-md-4 control-label"><span class="text-danger">*</span>Date Debut</label>
		<div class="col-md-8">
			<input type="text" name="date_debut" value="<?php echo $this->input->post('date_debut'); ?>" class="form-control" id="date_debut" />
			<span class="text-danger"><?php echo form_error('date_debut');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="date_limite" class="col-md-4 control-label"><span class="text-danger">*</span>Date Limite</label>
		<div class="col-md-8">
			<input type="text" name="date_limite" value="<?php echo $this->input->post('date_limite'); ?>" class="form-control" id="date_limite" />
			<span class="text-danger"><?php echo form_error('date_limite');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="date_creation" class="col-md-4 control-label"><span class="text-danger">*</span>Date Creation</label>
		<div class="col-md-8">
			<input type="text" name="date_creation" value="<?php echo $this->input->post('date_creation'); ?>" class="form-control" id="date_creation" />
			<span class="text-danger"><?php echo form_error('date_creation');?></span>
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
		<label for="prix" class="col-md-4 control-label">Prix</label>
		<div class="col-md-8">
			<input type="text" name="prix" value="<?php echo $this->input->post('prix'); ?>" class="form-control" id="prix" />
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-4 control-label"><span class="text-danger">*</span>Description</label>
		<div class="col-md-8">
			<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
			<span class="text-danger"><?php echo form_error('description');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>