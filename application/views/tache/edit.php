<?php echo form_open('tache/edit/'.$tache['id_tache'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_projet" class="col-md-4 control-label">Projet</label>
		<div class="col-md-8">
			<select name="id_projet" class="form-control">
				<option value="">select projet</option>
				<?php 
				foreach($all_projet as $projet)
				{
					$selected = ($projet['id_projet'] == $tache['id_projet']) ? ' selected="selected"' : "";

					echo '<option value="'.$projet['id_projet'].'" '.$selected.'>'.$projet['id_projet'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="assigne_a" class="col-md-4 control-label">Utilisateur</label>
		<div class="col-md-8">
			<select name="assigne_a" class="form-control">
				<option value="">select utilisateur</option>
				<?php 
				foreach($all_utilisateur as $utilisateur)
				{
					$selected = ($utilisateur['id_utilisateur'] == $tache['assigne_a']) ? ' selected="selected"' : "";

					echo '<option value="'.$utilisateur['id_utilisateur'].'" '.$selected.'>'.$utilisateur['id_utilisateur'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="titre" class="col-md-4 control-label"><span class="text-danger">*</span>Titre</label>
		<div class="col-md-8">
			<input type="text" name="titre" value="<?php echo ($this->input->post('titre') ? $this->input->post('titre') : $tache['titre']); ?>" class="form-control" id="titre" />
			<span class="text-danger"><?php echo form_error('titre');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="date_debut" class="col-md-4 control-label"><span class="text-danger">*</span>Date Debut</label>
		<div class="col-md-8">
			<input type="text" name="date_debut" value="<?php echo ($this->input->post('date_debut') ? $this->input->post('date_debut') : $tache['date_debut']); ?>" class="form-control" id="date_debut" />
			<span class="text-danger"><?php echo form_error('date_debut');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="date_limite" class="col-md-4 control-label"><span class="text-danger">*</span>Date Limite</label>
		<div class="col-md-8">
			<input type="text" name="date_limite" value="<?php echo ($this->input->post('date_limite') ? $this->input->post('date_limite') : $tache['date_limite']); ?>" class="form-control" id="date_limite" />
			<span class="text-danger"><?php echo form_error('date_limite');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label"><span class="text-danger">*</span>Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $tache['status']); ?>" class="form-control" id="status" />
			<span class="text-danger"><?php echo form_error('status');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-4 control-label"><span class="text-danger">*</span>Description</label>
		<div class="col-md-8">
			<textarea name="description" class="form-control" id="description"><?php echo ($this->input->post('description') ? $this->input->post('description') : $tache['description']); ?></textarea>
			<span class="text-danger"><?php echo form_error('description');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>