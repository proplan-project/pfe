<?php echo form_open('equipe/edit/'.$equipe['id_equipe'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_createur" class="col-md-4 control-label">Utilisateur</label>
		<div class="col-md-8">
			<select name="id_createur" class="form-control">
				<option value="">select utilisateur</option>
				<?php 
				foreach($all_utilisateur as $utilisateur)
				{
					$selected = ($utilisateur['id_utilisateur'] == $equipe['id_createur']) ? ' selected="selected"' : "";

					echo '<option value="'.$utilisateur['id_utilisateur'].'" '.$selected.'>'.$utilisateur['id_utilisateur'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_createur');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nom" class="col-md-4 control-label"><span class="text-danger">*</span>Nom</label>
		<div class="col-md-8">
			<input type="text" name="nom" value="<?php echo ($this->input->post('nom') ? $this->input->post('nom') : $equipe['nom']); ?>" class="form-control" id="nom" />
			<span class="text-danger"><?php echo form_error('nom');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="titre_emploi" class="col-md-4 control-label"><span class="text-danger">*</span>Titre Emploi</label>
		<div class="col-md-8">
			<input type="text" name="titre_emploi" value="<?php echo ($this->input->post('titre_emploi') ? $this->input->post('titre_emploi') : $equipe['titre_emploi']); ?>" class="form-control" id="titre_emploi" />
			<span class="text-danger"><?php echo form_error('titre_emploi');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>