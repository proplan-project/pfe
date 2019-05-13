<?php echo form_open('utilisateur_a_equipe/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_utilisateur" class="col-md-4 control-label">Utilisateur</label>
		<div class="col-md-8">
			<select name="id_utilisateur" class="form-control">
				<option value="">select utilisateur</option>
				<?php 
				foreach($all_utilisateur as $utilisateur)
				{
					$selected = ($utilisateur['id_utilisateur'] == $this->input->post('id_utilisateur')) ? ' selected="selected"' : "";

					echo '<option value="'.$utilisateur['id_utilisateur'].'" '.$selected.'>'.$utilisateur['id_utilisateur'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="id_equipe" class="col-md-4 control-label">Equipe</label>
		<div class="col-md-8">
			<select name="id_equipe" class="form-control">
				<option value="">select equipe</option>
				<?php 
				foreach($all_equipe as $equipe)
				{
					$selected = ($equipe['id_equipe'] == $this->input->post('id_equipe')) ? ' selected="selected"' : "";

					echo '<option value="'.$equipe['id_equipe'].'" '.$selected.'>'.$equipe['id_equipe'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>