<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <?php foreach ($projet as $p){ ?>
                                <div class="col-xs-12"><h6>Projet: <?php echo $p['titre_projet']; ?></h6></div>
                            <?php } ?>
                        </div>
                        <div class="col-md-2" align="right">
                            <button type="button" id="add_equipe_button" data-toggle="modal" data-target="#equipeModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inviter un équipe
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#informations">Informations</a></li>
                    <li><a data-toggle="tab" href="#taches">Liste des taches</a></li>
                    <li><a data-toggle="tab" href="#kanban">Kanban</a></li>
                    <li><a data-toggle="tab" href="#gantt">Gantt</a></li>
                    <li><a data-toggle="tab" href="#notes">Notes</a></li>
                    <li><a data-toggle="tab" href="#fichiers">Fichiers</a></li>
                    <li><a data-toggle="tab" href="#commentaires">Commentaires</a></li>
                    <li><a data-toggle="tab" href="#facture">Facture</a></li>
                </ul>
            </div>
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="informations">
                        <div class="col-xs-12">
                            <?php foreach ($projet as $p){ ?>
                                <p><?php echo $p['description']; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="taches">
                        <!-- TACHES -------------------------------------------------------------------------------->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" id="add_button" data-toggle="modal" data-target="#tacheModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Un tache
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="tache_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th data-column-id="titre">Titre</th>
                                            <th data-column-id="description">Description</th>
                                            <th data-column-id="date_debut">Date_debut</th>
                                            <th data-column-id="date_limite">Date limite</th>
                                            <th data-column-id="status">Status</th>
                                            <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kanban">
                        <div class="col-xs-6">kanban</div>
                    </div>
                    <div class="tab-pane" id="gantt">
                        <div class="col-xs-6">gantt</div>
                    </div>
                    <div class="tab-pane" id="notes">
                        <div class="col-xs-6">notes</div>
                    </div>
                    <div class="tab-pane" id="fichiers">
                        <div class="col-xs-6">fichiers</div>
                    </div>
                    <div class="tab-pane" id="commentaires">
                        <div class="col-xs-6">commentaires</div>
                    </div>
                    <div class="tab-pane" id="facture">
                        <div class="col-xs-6">informations</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- TACHE MODEL ----------------------------------------------------------------------------------------------------->
<div id="tacheModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="tache_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un tache</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="titre" id="titre" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date_debut</label>
                        <input type="date" name="date_debut" id="date_debut" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Date limite</label>
                        <input type="date" name="date_limite" id="date_limite" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="à faire">à faire</option>
                            <option value="en cours">en cours</option>
                            <option value="terminé">terminé</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_tache" id="id_tache" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<!-- EQUIPE MODEL ----------------------------------------------------------------------------------------------------->

<div id="equipeModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="equipe_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inviter un équipe</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Equipe</label>
                        <select name="id_equipe">
                            <option value="">selectionner un équipe</option>
                            <?php
                            foreach($all_equipe as $equipe)
                            {
                                $selected = ($equipe['id_equipe'] == $this->input->post('id_equipe')) ? ' selected="selected"' : "";

                                echo '<option value="'.$equipe['id_equipe'].'" '.$selected.'>'.$equipe['nom'].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id_projet" id="id_projet" value="<?php echo $id_projet; ?>" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="add_equipe" id="add_equipe" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        $('#add_equipe_button').click(function(){
            $('#equipe_form')[0].reset();
            $('.modal-title').text("Inviter un équipe");
            $('#add_equipe').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#equipe_form', function(event){
            event.preventDefault();
            var id_projet = $('#id_projet').val();
            var id_equipe = $('#id_equipe').val();
            var form_data = $(this).serialize();
            if(	id_equipe != '' && id_projet != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>projet/add_equipe",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#equipe_form')[0].reset();
                        $('#equipeModal').modal('hide');
                        $('#equipe_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });

        <!-- TACHE SCRIPT ----------------------------------------------------------------------------------------------------->

        var tacheTable = $('#tache_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>tache/tache_projet/<?php echo $id_projet; ?>",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_tache+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_tache+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                },
                "titre_projet":function(column, row)
                {
                    return "<a href=\"<?php echo base_url()?>projet/detail/" +row.id_projet+ "\">" + row.titre_projet + "</a>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#tache_form')[0].reset();
            $('.modal-title').text("Add tache");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#tache_form', function(event){
            event.preventDefault();
            var titre = $('#titre').val();
            var description = $('#description').val();
            var date_debut = $('#date_debut').val();
            var date_limite = $('#date_limite').val();
            var status = $('#status').val();
            var form_data = $(this).serialize();
            if(	titre != '' && description != '' && date_debut != '' && date_limite != '' && status != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>tache/action_tache/<?php echo $id_projet; ?>",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#tache_form')[0].reset();
                        $('#tacheModal').modal('hide');
                        $('#tache_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            tacheTable.find('.update').on('click', function(event){
                var id_tache = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>tache/fetch_single_data",
                    method:"POST",
                    data:{id_tache:id_tache},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#tacheModal').modal('show');
                        $('#titre').val(data.titre);
                        $('#description').val(data.description);
                        $('#date_debut').val(data.date_debut);
                        $('#date_limite').val(data.date_limite);
                        $('#status').val(data.status);
                        $('#id_projet').val(data.id_projet);
                        $('.modal-title').text("Edit tache Details");
                        $('#id_tache').val(id_tache);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            tacheTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
                {
                    var id_tache = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>tache/delete_data",
                        method:"POST",
                        data:{id_tache:id_tache},
                        success:function(data)
                        {
                            alert(data);
                            $('#tache_data').bootgrid('reload');
                        }
                    });
                }
                else
                {
                    return false;
                }
            });
        });
    });
</script>