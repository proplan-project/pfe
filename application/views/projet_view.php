<html>
<head>
    <title>Projet</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
</head>
<body>
<div class="container box">
    <h3 align="center">Gestion des projets</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Liste des projets</h3>
                </div>
                <div class="col-md-2" align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#projetModal" class="btn btn-info btn-xs">Add</button>
                </div>
            </div>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="projet_data" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-column-id="titre">Titre</th>
                        <th data-column-id="description">Description</th>
                        <th data-column-id="date_debut">Date_debut</th>
                        <th data-column-id="date_limite">Date limite</th>
                        <th data-column-id="date_creation">Date creation</th>
                        <th data-column-id="status">Status</th>
                        <th data-column-id="prix">Prix</th>
                        <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<div id="projetModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="projet_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un projet</h4>
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
                        <input type="date" name="date_limite" id="date_limitet" class="form-control" />
                    </div>
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
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_projet" id="id_projet" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
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
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>projet/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_projet+"'>Edit</button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_projet+"'>Delete</button>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#projet_form')[0].reset();
            $('.modal-title').text("Add projet");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#projet_form', function(event){
            event.preventDefault();
            var titre = $('#titre').val();
            var description = $('#description').val();
            var date_debut = $('#date_debut').val();
            var date_limite = $('#date_limite').val();
            var status = $('#status').val();
            var prix = $('#prix').val();
            var form_data = $(this).serialize();
            if(	titre != '' && description != '' && date_debut != '' && date_limite != '' && status != '')
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
                        $('#titre').val(data.titre);
                        $('#description').val(data.description);
                        $('#date_debut').val(data.date_debut);
                        $('#date_limite').val(data.date_limite);
                        $('#status').val(data.status);
                        $('#prix').val(data.prix);
                        $('.modal-title').text("Edit projet Details");
                        $('#id_projet').val(id_projet);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            projetTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
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