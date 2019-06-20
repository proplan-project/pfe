<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>
        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" id="add_button" data-toggle="modal" data-target="#tacheModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Une tache
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
                                <th data-column-id="percent_complete" data-formatter="pourcentage">Pourcentage</th>
                                <th data-column-id="titre_projet" data-formatter="titre_projet">Projet</th>
                                <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<div id="tacheModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="tache_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter une tache</h4>
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
                        <label>Date Debut</label>
                        <input type="date" name="date_debut" id="date_debut" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Date Limite</label>
                        <input type="date" name="date_limite" id="date_limite" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="à faire">A faire</option>
                            <option value="en cours">En cours</option>
                            <option value="terminé">Terminé</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pourcentage</label>
                        <input type="range" minlength="0" maxlength="100" step="10" name="percent_complete" id="percent_complete" class="form-control"/>
                    </div>
                    <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                        <div class="form-group">
                            <label>Projet</label>
                            <select name="id_projet" id="id_projet" class="form-control">
                                <option value="">Selectionner un Projet</option>
                                <?php
                                foreach($all_projet as $projet)
                                {
                                    $selected = ($projet['id_projet'] == $this->input->post('id_projet')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$projet['id_projet'].'" '.$selected.'>'.$projet['titre_projet'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if($this->session->userdata['info']['db'] == 'utilisateur'){ ?>
                        <div class="form-group">
                            <label>Projet</label>
                            <select name="id_projet" id="id_projet" class="form-control">
                                <option value="">Selectionner un Projet</option>
                                <?php
                                foreach($utilisateur_projet as $up)
                                {
                                    $selected = ($up['id_projet'] == $this->input->post('id_projet')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$up['id_projet'].'" '.$selected.'>'.$up['titre_projet'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <?php } ?>

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

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        var tacheTable = $('#tache_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>tache/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_tache+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_tache+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                },
                "titre_projet":function(column, row)
                {
                    return "<a href=\"<?php echo base_url()?>projet/detail/" +row.id_projet+ "\">" + row.titre_projet + "</a>";
                },
                "pourcentage":function(column, row)
                {
                    return "<progress class=\"progress\" value='"+row.percent_complete+"' max=\"100\" data-row-id='"+row.id_tache+"'></progress>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#tache_form')[0].reset();
            $('.modal-title').text("Ajouter une tache");
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
            var percent_complete = $('#percent_complete').val();
            var id_projet = $('#id_projet').val();
            var form_data = $(this).serialize();

            if(	titre != '' && description != '' && date_debut != '' && date_limite != '' && status != ''  && id_projet != ''  )
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>tache/action",
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
                alert("Tout les champs sont requis!");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            tacheTable.find('.update').on('click', function(event){
                var id_tache = $(this).data('row-id');
                var form_data = $(this).serialize();
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
                        $('#percent_complete').val(data.percent_complete);
                        $('#id_projet').val(data.id_projet);
                        $('.modal-title').text("Modifier la tache");
                        $('#id_tache').val(id_tache);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                        $('#tache_data').bootgrid('reload');

                    }
                });
            });

            tacheTable.find('.delete').on('click', function(event){
                if(confirm("Voulez-vous supprimer ce projet ?"))
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
