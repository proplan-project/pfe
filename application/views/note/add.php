<?php echo form_open('note/add',array("class"=>"form-horizontal")); ?>

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
		<label for="id_createur" class="col-md-4 control-label">Utilisateur</label>
		<div class="col-md-8">
			<select name="id_createur" class="form-control">
				<option value="">select utilisateur</option>
				<?php 
				foreach($all_utilisateur as $utilisateur)
				{
					$selected = ($utilisateur['id_utilisateur'] == $this->input->post('id_createur')) ? ' selected="selected"' : "";

					echo '<option value="'.$utilisateur['id_utilisateur'].'" '.$selected.'>'.$utilisateur['id_utilisateur'].'</option>';
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
		<label for="date_creation" class="col-md-4 control-label"><span class="text-danger">*</span>Date Creation</label>
		<div class="col-md-8">
			<input type="text" name="date_creation" value="<?php echo $this->input->post('date_creation'); ?>" class="form-control" id="date_creation" />
			<span class="text-danger"><?php echo form_error('date_creation');?></span>
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