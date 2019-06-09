<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
			<?php
			if($this->session->flashdata('message'))
			{
				echo '
                            <div class="alert alert-success alert-dismissible">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                '.$this->session->flashdata("message").'
                            </div>
                           ';
			}
			?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <?php foreach ($equipe as $e){ ?>
                                <div class="col-xs-12"><h6>Equipe: <?php echo $e['nom']; ?></h6></div>
                            <?php } ?>
                        </div>
                        <div class="col-md-4" align="right">
							<button type="button" id="add_button" data-toggle="modal" data-target="#utilisateurModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inviter un utilisateur
							</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <div class="table-responsive">
                            <table id="nom_projet" class="table table-striped table-bordered">
                                <tr>
                                    <th>Les projets</th>
                                </tr>
                                <?php
                                foreach($projet as $p)
                                {
                                    echo '<tr><td>'.$p['titre_projet'].' </td></tr>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table id="nom_utilisateur" class="table table-striped table-bordered">
                            <tr>
                                <th>Les membres d'équipe</th>
                            </tr>
                            <?php
                            foreach($utilisateur as $u)
                            {
                                echo '<tr><td>'.$u['nom'].' '.$u['prenom'].' </td></tr>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<div id="utilisateurModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="utilisateur_form" action="<?php echo base_url()?>equipe/add_utilisateur">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Ajouter un utilisateur</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Utilisateur</label>
						<select name="id">
							<option value="">selectionner un équipe</option>
							<?php
							foreach($all_utilisateur as $u)
							{
								$selected = ($u['id'] == $this->input->post('id')) ? ' selected="selected"' : "";

								echo '<option value="'.$u['id'].'" '.$selected.'>'.$u['nom'].' '.$u['prenom'].'</option>';
							}
							?>
						</select>
						<input type="hidden" name="id_equipe" id="id_equipe" value="<?php echo $id_equipe; ?>" />
					</div>
				<div class="modal-footer">
					<input type="hidden" name="operation" id="operation" value="Add" />
					<input type="submit" class="btn btn-success" value="Add" />
				</div>
			</div>
		</form>
	</div>
</div>
