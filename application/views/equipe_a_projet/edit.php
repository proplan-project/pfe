<?php echo form_open('equipe_a_projet/edit/'.$equipe_a_projet[''],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_projet" class="col-md-4 control-label">Projet</label>
		<div class="col-md-8">
			<select name="id_projet" class="form-control">
				<option value="">select projet</option>
				<?php 
				foreach($all_projet as $projet)
				{
					$selected = ($projet['id_projet'] == $equipe_a_projet['id_projet']) ? ' selected="selected"' : "";

					echo '<option value="'.$projet['id_projet'].'" '.$selected.'>'.$projet['id_projet'].'</option>';
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
					$selected = ($equipe['id_equipe'] == $equipe_a_projet['id_equipe']) ? ' selected="selected"' : "";

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