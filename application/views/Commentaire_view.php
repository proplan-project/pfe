<html>
<head>
    <title>Commenteire</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
</head>
<body>
<div class="container box">
    <h3 align="center">Gestion des comeenteires</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Liste des comentaires</h3>
                </div>
                <div class="col-md-2" align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#commentaireModal" class="btn btn-info btn-xs">Add</button>
                </div>
            </div>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="commentaire_data" class="table table-striped table-bordered">
                    <thead>
                    <tr>
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
</body>
</html>

<div id="commentaireModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="commentaire_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un Commentaire</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_commentaire" id="id_commentaire" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var commentaireTable = $('#commentaire_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>commentaire/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_commentaire+"'>Edit</button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_commentaire+"'>Delete</button>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#commentaire_form')[0].reset();
            $('.modal-title').text("Add Commentaire");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#commentaire_form', function(event){
            event.preventDefault();
            var description = $('#description').val();
            var form_data = $(this).serialize();
            if(	description != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>commentaire/action",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#commentaire_form')[0].reset();
                        $('#commentaireModal').modal('hide');
                        $('#commentaire_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            commentaireTable.find('.update').on('click', function(event){
                var id_commentaire = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>commentaire/fetch_single_data",
                    method:"POST",
                    data:{id_commentaire:id_commentaire},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#commentaireModal').modal('show');
                        $('#description').val(data.description);
                        $('.modal-title').text("Edit Commentaire Details");
                        $('#id_commentaire').val(id_commentaire);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            commentaireTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
                {
                    var id_commentaire = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>commentaire/delete_data",
                        method:"POST",
                        data:{id_commentaire:id_commentaire},
                        success:function(data)
                        {
                            alert(data);
                            $('#commentaire_data').bootgrid('reload');
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