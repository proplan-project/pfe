<html>
<head>
    <title>jQuery Bootgrid - Server Side Processing in Codeigniter</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
</head>
<body>
<div class="container box">
    <h3 align="center">Gestion des clients</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Liste des Client</h3>
                </div>
                <div class="col-md-2" align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#clientModal" class="btn btn-info btn-xs">Add</button>
                </div>
            </div>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="client_data" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-column-id="nom">Nom</th>
                        <th data-column-id="prenom">Prénom</th>
                        <th data-column-id="nom_entreprise">Nom Entreprise</th>
                        <th data-column-id="adresse">Adresse</th>
                        <th data-column-id="ville">Ville</th>
                        <th data-column-id="code_postal">Code Postal</th>
                        <th data-column-id="pays">Pays</th>
                        <th data-column-id="Telephone">Telephone</th>
                        <th data-column-id="Site">Site</th>
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

<div id="clientModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="client_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un Client</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nom Entreprise</label>
                        <input type="text" name="nom_entreprise" id="nom_entreprise" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <textarea type="text" name="adresse" id="adresse" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ville</label>
                        <input type="text" name="ville" id="ville" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Code Postal</label>
                        <input type="number" name="code_postal" id="code_postal" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Pays</label>
                        <input type="text" name="pays" id="pays" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="tel" name="telephone" id="telephone" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Site</label>
                        <input type="text" name="site" id="site" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_client" id="id_client" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var clientTable = $('#client_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>client/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_client+"'>Edit</button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_client+"'>Delete</button>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#client_form')[0].reset();
            $('.modal-title').text("Add Client");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#client_form', function(event){
            event.preventDefault();
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var nom_entreprise = $('#nom_entreprise').val();
            var adresse = $('#adresse').val();
            var ville = $('#ville').val();
            var code_postal = $('#code_postal').val();
            var pays = $('#pays').val();
            var telephone = $('#telephone').val();
            var site = $('#site').val();
            var form_data = $(this).serialize();
            if(nom != '' && prenom != '' && telephone != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>client/action",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#client_form')[0].reset();
                        $('#clientModal').modal('hide');
                        $('#client_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("All Fields are Required");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            clientTable.find('.update').on('click', function(event){
                var id_client = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>client/fetch_single_data",
                    method:"POST",
                    data:{id_client:id_client},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#clientModal').modal('show');
                        $('#nom').val(data.nom);
                        $('#prenom').val(data.prenom);
                        $('#nom_entreprise').val(data.nom_entreprise);
                        $('#adresse').val(data.adresse);
                        $('#ville').val(data.ville);
                        $('#code_postal').val(data.code_postal);
                        $('#pays').val(data.pays);
                        $('#telephone').val(data.telephone);
                        $('#site').val(data.site);
                        $('.modal-title').text("Edit Client Details");
                        $('#id_client').val(id_client);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            clientTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
                {
                    var id_client = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>client/delete_data",
                        method:"POST",
                        data:{id_client:id_client},
                        success:function(data)
                        {
                            alert(data);
                            $('#client_data').bootgrid('reload');
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