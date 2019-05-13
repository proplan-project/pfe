<?php echo form_open('utilisateur/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="is_admin" class="col-md-4 control-label"><span class="text-danger">*</span>Is Admin</label>
		<div class="col-md-8">
			<input type="checkbox" name="is_admin" value="1" id="is_admin" />
			<span class="text-danger"><?php echo form_error('is_admin');?></span>
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
		<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
		<div class="col-md-8">
			<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
			<span class="text-danger"><?php echo form_error('password');?></span>
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
		<label for="prenom" class="col-md-4 control-label"><span class="text-danger">*</span>Prenom</label>
		<div class="col-md-8">
			<input type="text" name="prenom" value="<?php echo $this->input->post('prenom'); ?>" class="form-control" id="prenom" />
			<span class="text-danger"><?php echo form_error('prenom');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="type" class="col-md-4 control-label"><span class="text-danger">*</span>Type</label>
		<div class="col-md-8">
			<input type="text" name="type" value="<?php echo $this->input->post('type'); ?>" class="form-control" id="type" />
			<span class="text-danger"><?php echo form_error('type');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="tel" class="col-md-4 control-label"><span class="text-danger">*</span>Tel</label>
		<div class="col-md-8">
			<input type="text" name="tel" value="<?php echo $this->input->post('tel'); ?>" class="form-control" id="tel" />
			<span class="text-danger"><?php echo form_error('tel');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="genre" class="col-md-4 control-label"><span class="text-danger">*</span>Genre</label>
		<div class="col-md-8">
			<input type="text" name="genre" value="<?php echo $this->input->post('genre'); ?>" class="form-control" id="genre" />
			<span class="text-danger"><?php echo form_error('genre');?></span>
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
		<label for="image" class="col-md-4 control-label"><span class="text-danger">*</span>Image</label>
		<div class="col-md-8">
			<textarea name="image" class="form-control" id="image"><?php echo $this->input->post('image'); ?></textarea>
			<span class="text-danger"><?php echo form_error('image');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="adresse" class="col-md-4 control-label"><span class="text-danger">*</span>Adresse</label>
		<div class="col-md-8">
			<textarea name="adresse" class="form-control" id="adresse"><?php echo $this->input->post('adresse'); ?></textarea>
			<span class="text-danger"><?php echo form_error('adresse');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>