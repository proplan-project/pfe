<html>
<head>
    <title>tache</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
</head>
<body>
<div class="container box">
    <h3 align="center">Gestion des taches</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Liste des taches</h3>
                </div>
                <div class="col-md-2" align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#tacheModal" class="btn btn-info btn-xs">Add</button>
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
</body>
</html>

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
                        <input type="date" name="date_limite" id="date_limitet" class="form-control" />
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
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_tache+"'>Edit</button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_tache+"'>Delete</button>";
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