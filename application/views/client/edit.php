<?php echo form_open('client/edit/'.$client['id_client'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_utilisateur" class="col-md-4 control-label">Utilisateur</label>
		<div class="col-md-8">
			<select name="id_utilisateur" class="form-control">
				<option value="">select utilisateur</option>
				<?php 
				foreach($all_utilisateur as $utilisateur)
				{
					$selected = ($utilisateur['id_utilisateur'] == $client['id_utilisateur']) ? ' selected="selected"' : "";

					echo '<option value="'.$utilisateur['id_utilisateur'].'" '.$selected.'>'.$utilisateur['id_utilisateur'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_utilisateur');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nom" class="col-md-4 control-label"><span class="text-danger">*</span>Nom</label>
		<div class="col-md-8">
			<input type="text" name="nom" value="<?php echo ($this->input->post('nom') ? $this->input->post('nom') : $client['nom']); ?>" class="form-control" id="nom" />
			<span class="text-danger"><?php echo form_error('nom');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="prenom" class="col-md-4 control-label"><span class="text-danger">*</span>Prenom</label>
		<div class="col-md-8">
			<input type="text" name="prenom" value="<?php echo ($this->input->post('prenom') ? $this->input->post('prenom') : $client['prenom']); ?>" class="form-control" id="prenom" />
			<span class="text-danger"><?php echo form_error('prenom');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nom_entreprise" class="col-md-4 control-label">Nom Entreprise</label>
		<div class="col-md-8">
			<input type="text" name="nom_entreprise" value="<?php echo ($this->input->post('nom_entreprise') ? $this->input->post('nom_entreprise') : $client['nom_entreprise']); ?>" class="form-control" id="nom_entreprise" />
			<span class="text-danger"><?php echo form_error('nom_entreprise');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="ville" class="col-md-4 control-label">Ville</label>
		<div class="col-md-8">
			<input type="text" name="ville" value="<?php echo ($this->input->post('ville') ? $this->input->post('ville') : $client['ville']); ?>" class="form-control" id="ville" />
			<span class="text-danger"><?php echo form_error('ville');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="code_postal" class="col-md-4 control-label">Code Postal</label>
		<div class="col-md-8">
			<input type="text" name="code_postal" value="<?php echo ($this->input->post('code_postal') ? $this->input->post('code_postal') : $client['code_postal']); ?>" class="form-control" id="code_postal" />
			<span class="text-danger"><?php echo form_error('code_postal');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="pays" class="col-md-4 control-label">Pays</label>
		<div class="col-md-8">
			<input type="text" name="pays" value="<?php echo ($this->input->post('pays') ? $this->input->post('pays') : $client['pays']); ?>" class="form-control" id="pays" />
			<span class="text-danger"><?php echo form_error('pays');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="telephone" class="col-md-4 control-label"><span class="text-danger">*</span>Telephone</label>
		<div class="col-md-8">
			<input type="text" name="telephone" value="<?php echo ($this->input->post('telephone') ? $this->input->post('telephone') : $client['telephone']); ?>" class="form-control" id="telephone" />
			<span class="text-danger"><?php echo form_error('telephone');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="site" class="col-md-4 control-label">Site</label>
		<div class="col-md-8">
			<input type="text" name="site" value="<?php echo ($this->input->post('site') ? $this->input->post('site') : $client['site']); ?>" class="form-control" id="site" />
			<span class="text-danger"><?php echo form_error('site');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="adresse" class="col-md-4 control-label">Adresse</label>
		<div class="col-md-8">
			<textarea name="adresse" class="form-control" id="adresse"><?php echo ($this->input->post('adresse') ? $this->input->post('adresse') : $client['adresse']); ?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>