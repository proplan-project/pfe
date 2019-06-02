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
                                            <th data-column-id="percent_complete" data-formatter="pourcentage">Pourcentage</th>
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
                    <div class="tab-pane" id="notes">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" id="add_button" data-toggle="modal" data-target="#noteModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un Note
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="note_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th data-column-id="titre">Titre</th>
                                            <th data-column-id="description">Description</th>
                                            <th data-column-id="date_creation">Date de création</th>
                                            <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fichiers">
                        <div class="col-xs-6">fichiers</div>
                    </div>
                    <div class="tab-pane" id="commentaires">
                        <div class="col-xs-6">commentaires</div>
                    </div>
                    <div class="tab-pane" id="facture">
                        <div class="panel panel-default">
                            <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="button" id="add_button" data-toggle="modal" data-target="#factureModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un Facture
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="facture_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th data-column-id="Numero" data-formatter="num">Numero</th>
                                            <th data-column-id="date_facture">Date facture</th>
                                            <th data-column-id="date_echeance">Date échéance</th>
                                            <th data-column-id="montant">Montant</th>
                                            <th data-column-id="paiement_recu">Paiement reçu</th>
                                            <th data-column-id="status">Status</th>
                                            <th data-column-id="nom">Client</th>
                                            <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                                                <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                                            <?php }?>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Facture MODEL ----------------------------------------------------------------------------------------------------->
<div id="factureModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="facture_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un facture</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Numero Facture</label>
                        <input type="number" name="Numero" id="Numero" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Date échéance</label>
                        <input type="date" name="date_echeance" id="date_echeance" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Montant</label>
                        <input type="number" name="montant" id="montant" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Paiement reçu</label>
                        <input type="number" name="paiement_recu" id="paiement_recu" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="brouillon">Brouillon</option>
                            <option value="impayé">Impayé</option>
                            <option value="payé">Payé</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Client</label>
                        <select name="id_client">
                            <option value="">selectionner un client</option>
                            <?php
                            foreach($all_client as $client)
                            {
                                $selected = ($client['id_client'] == $this->input->post('id_client')) ? ' selected="selected"' : "";

                                echo '<option value="'.$client['id_client'].'" '.$selected.'>'.$client['nom'].' '.$client['prenom'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_facture" id="id_facture" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Note MODEL ----------------------------------------------------------------------------------------------------->
<div id="noteModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="note_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un note</h4>
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
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_note" id="id_note" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

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
                    <div class="form-group">
                        <label>Pourcentage</label>
                        <input type="range" minlength="0" maxlength="100" step="10" name="percent_complete" id="percent_complete" class="form-control"/>
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
                "pourcentage":function(column, row)
                {
                    return "<progress class=\"progress\" value='"+row.percent_complete+"' max=\"100\" data-row-id='"+row.id_tache+"'></progress>";
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

        <!-- NOTE SCRIPT ----------------------------------------------------------------------------------------------------->
        var noteTable = $('#note_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>note/note_projet/<?php echo $id_projet; ?>",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_note+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_note+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#note_form')[0].reset();
            $('.modal-title').text("Add note");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#note_form', function(event){
            event.preventDefault();
            var titre = $('#titre').val();
            var description = $('#description').val();
            var form_data = $(this).serialize();
            if(	titre != '' && description != '' && id_projet != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>note/action_note/<?php echo $id_projet; ?>",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#note_form')[0].reset();
                        $('#noteModal').modal('hide');
                        $('#note_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            noteTable.find('.update').on('click', function(event){
                var id_note = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>note/fetch_single_data",
                    method:"POST",
                    data:{id_note:id_note},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#noteModal').modal('show');
                        $('#titre').val(data.titre);
                        $('#description').val(data.description);
                        $('#id_projet').val(data.description);
                        $('.modal-title').text("Edit note Details");
                        $('#id_note').val(id_note);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            noteTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
                {
                    var id_note = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>note/delete_data",
                        method:"POST",
                        data:{id_note:id_note},
                        success:function(data)
                        {
                            alert(data);
                            $('#note_data').bootgrid('reload');
                        }
                    });
                }
                else
                {
                    return false;
                }
            });
        });
        <!-- Facture SCRIPT ----------------------------------------------------------------------------------------------------->
        var factureTable = $('#facture_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>facture/facture_projet/<?php echo $id_projet; ?>",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_facture+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_facture+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                },
                "num":function(column, row)
                {
                    return "<a href=\"<?php echo base_url()?>facture/detail/" +row.id_facture+ "\" target=\"_blank\">" + row.Numero + "</a>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#facture_form')[0].reset();
            $('.modal-title').text("Add facture");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#facture_form', function(event){
            event.preventDefault();
            var Numero = $('#Numero').val();
            var date_echeance = $('#date_echeance').val();
            var montant = $('#montant').val();
            var paiement_recu = $('#paiement_recu').val();
            var status = $('#status').val();
            var id_client = $('#id_client').val();
            var form_data = $(this).serialize();
            if(	Numero != '' && montant != '' && paiement_recu != '' && status != '' && id_client != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>facture/action_facture/<?php echo $id_projet; ?>",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#facture_form')[0].reset();
                        $('#factureModal').modal('hide');
                        $('#facture_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            factureTable.find('.update').on('click', function(event){
                var id_facture = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>facture/fetch_single_data",
                    method:"POST",
                    data:{id_facture:id_facture},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#factureModal').modal('show');
                        $('#Numero').val(data.Numero);
                        $('#date_echeance').val(data.date_echeance);
                        $('#montant').val(data.montant);
                        $('#paiement_recu').val(data.paiement_recu);
                        $('#status').val(data.status);
                        $('#id_projet').val(data.id_projet);
                        $('.modal-title').text("Edit facture Details");
                        $('#id_facture').val(id_facture);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            factureTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
                {
                    var id_facture = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>facture/delete_data",
                        method:"POST",
                        data:{id_facture:id_facture},
                        success:function(data)
                        {
                            alert(data);
                            $('#facture_data').bootgrid('reload');
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