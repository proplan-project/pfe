<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" id="add_button" data-toggle="modal" data-target="#projetModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Un Projet
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="projet_data" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th data-column-id="titre_projet" data-formatter="titre_projet">titre_projet</th>
                                    <th data-column-id="description">Description</th>
                                    <th data-column-id="date_debut">Date début</th>
                                    <th data-column-id="date_limite">Date limite</th>
                                    <th data-column-id="date_creation">Date creation</th>
                                    <th data-column-id="status">Status</th>
                                    <th data-column-id="prix">Prix</th>
                                    <th data-column-id="nom">Client</th>
                                    <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                <?php }?>
                <?php if($this->session->userdata['info']['db'] == 'utilisateur'){ ?>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Titre Projet</th>
                                    <th>Description</th>
                                    <th>Date Début</th>
                                    <th>Date Limite</th>
                                    <th>Date Création</th>
                                    <th>Status</th>
                                </tr>
                                <?php foreach ($utilisateur_projet as $up){ ?>
                                    <tr>
                                        <td><a href="<?php echo base_url()?>projet/detail/<?php echo $up['id_projet']; ?>"><?php echo $up['titre_projet']; ?></a></td>
                                        <td><?php echo $up['description']; ?></td>
                                        <td><?php echo $up['date_debut']; ?></td>
                                        <td><?php echo $up['date_limite']; ?></td>
                                        <td><?php echo $up['date_creation']; ?></td>
                                        <td><?php echo $up['status']; ?></td>
                                    </tr>
                                <?php } ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
</body>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<div id="projetModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="projet_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter Un Projet</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Titre Du Projet</label>
                        <input type="text" name="titre_projet" id="titre_projet" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date Debut</label>
                                <input type="date" name="date_debut" id="date_debut" class="form-control" />
                            </div>

                            <div class="col-md-6">
                                <label>Date Limite</label>
                                <input type="date" name="date_limite" id="date_limite" class="form-control" />
                            </div>
                        </div></div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="ouvert">Ouvert</option>
                            <option value="terminé">Terminé</option>
                            <option value="tenir">Tenir</option>
                            <option value="annulér">Annulé</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <input type="number" name="prix" id="prix" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Client</label>
                        <select class="form-control" id ="id_client" name="id_client">
                            <option value="">Sélectionner un client</option>
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
                    <input type="hidden" name="id_projet" id="id_projet" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Ajouter" />
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        var projetTable = $('#projet_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed",
                }
            },
            url:"<?php echo base_url(); ?>projet/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_projet+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/> </button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_projet+"'style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                },
                "titre_projet":function(column, row)
                {
                    return "<a href=\"<?php echo base_url()?>projet/detail/" +row.id_projet+ "\">" + row.titre_projet + "</a>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#projet_form')[0].reset();
            $('.modal-title').text("Ajouter Un Projet");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#projet_form', function(event){
            event.preventDefault();
            var titre_projet = $('#titre_projet').val();
            var description = $('#description').val();
            var date_debut = $('#date_debut').val();
            var date_limite = $('#date_limite').val();
            var status = $('#status').val();
            var prix = $('#prix').val();
            var id_client = $('#id_client').val();
            var form_data = $(this).serialize();

            if(	titre_projet != '' && description != '' && date_debut != '' && date_limite != '' && status != '' && id_client != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>projet/action",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#projet_form')[0].reset();
                        $('#projetModal').modal('hide');
                        $('#projet_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            projetTable.find('.update').on('click', function(event){
                var id_projet = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>projet/fetch_single_data",
                    method:"POST",
                    data:{id_projet:id_projet},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#projetModal').modal('show');
                        $('#titre_projet').val(data.titre_projet);
                        $('#description').val(data.description);
                        $('#date_debut').val(data.date_debut);
                        $('#date_limite').val(data.date_limite);
                        $('#status').val(data.status);
                        $('#prix').val(data.prix);
                        $('#id_client').val(data.id_client);
                        $('.modal-title').text("Modifier Info");
                        $('#id_projet').val(data.id_projet);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            projetTable.find('.delete').on('click', function(event){
                if(confirm("Voulez-vous supprimer ce projet ?"))
                {
                    var id_projet = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>projet/delete_data",
                        method:"POST",
                        data:{id_projet:id_projet},
                        success:function(data)
                        {
                            alert(data);
                            $('#projet_data').bootgrid('reload');
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