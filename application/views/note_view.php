<html>
<head>
    <title>Note</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
</head>
<body>
<div class="container box">
    <h3 align="center">Gestion des notes</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Liste des notes</h3>
                </div>
                <div class="col-md-2" align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#noteModal" class="btn btn-info btn-xs">Add</button>
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
</body>
</html>

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

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var noteTable = $('#note_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>note/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_note+"'>Edit</button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_note+"'>Delete</button>";
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
            if(	description != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>note/action",
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

    });
</script>