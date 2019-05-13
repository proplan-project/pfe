<html>
<head>
    <title>Facture</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
</head>
<body>
<div class="container box">
    <h3 align="center">Gestion des factures</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Liste des factures</h3>
                </div>
                <div class="col-md-2" align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#factureModal" class="btn btn-info btn-xs">Add</button>
                </div>
            </div>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="facture_data" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-column-id="date_facture">Date facture</th>
                        <th data-column-id="date_echeance">Date échéance</th>
                        <th data-column-id="montant">Montant</th>
                        <th data-column-id="paiement_recu">Paiement reçu</th>
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

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var factureTable = $('#facture_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>facture/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_facture+"'>Edit</button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_facture+"'>Delete</button>";
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
            var date_echeance = $('#date_echeance').val();
            var montant = $('#montant').val();
            var paiement_recu = $('#paiement_recu').val();
            var status = $('#status').val();
            var form_data = $(this).serialize();
            if(	date_echeance != '' && montant != '' && paiement_recu != '' && status != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>facture/action",
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
                        $('#date_echeance').val(data.date_echeance);
                        $('#montant').val(data.montant);
                        $('#paiement_recu').val(data.paiement_recu);
                        $('#status').val(data.status);
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