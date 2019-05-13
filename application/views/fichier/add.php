<?php echo form_open('fichier/add',array("class"=>"form-horizontal")); ?>

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
		</div>
	</div>
	<div class="form-group">
		<label for="telecharge_par" class="col-md-4 control-label">Utilisateur</label>
		<div class="col-md-8">
			<select name="telecharge_par" class="form-control">
				<option value="">select utilisateur</option>
				<?php 
				foreach($all_utilisateur as $utilisateur)
				{
					$selected = ($utilisateur['id_utilisateur'] == $this->input->post('telecharge_par')) ? ' selected="selected"' : "";

					echo '<option value="'.$utilisateur['id_utilisateur'].'" '.$selected.'>'.$utilisateur['id_utilisateur'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="nom" class="col-md-4 control-label"><span class="text-danger">*</span>Nom</label>
		<div class="col-md-8">
			<input type="text" name="nom" value="<?php echo $this->input->post('nom'); ?>" class="form-control" id="nom" />
			<span class="text-danger"><?php echo form_error('nom');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="size" class="col-md-4 control-label"><span class="text-danger">*</span>Size</label>
		<div class="col-md-8">
			<input type="text" name="size" value="<?php echo $this->input->post('size'); ?>" class="form-control" id="size" />
			<span class="text-danger"><?php echo form_error('size');?></span>
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
		<label for="description" class="col-md-4 control-label">Description</label>
		<div class="col-md-8">
			<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>