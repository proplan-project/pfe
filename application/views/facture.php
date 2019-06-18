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
                                <button type="button" id="add_button" data-toggle="modal" data-target="#factureModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une Facture
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
                                <th data-column-id="titre_projet">Projet</th>
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
</body>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<div id="factureModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="facture_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter une Facture</h4>
                </div>
                <div class="modal-body">
                    <div  id ="id_facture" class="form-group">
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
                        <select name="id_client" class="form-control">
                            <option value="">Selectionner Un Client</option>
                            <?php
                            foreach($all_client as $client)
                            {
                                $selected = ($client['id_client'] == $this->input->post('id_client')) ? ' selected="selected"' : "";

                                echo '<option value="'.$client['id_client'].'" '.$selected.'>'.$client['nom'].' '.$client['prenom'].' </option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Projet</label>
                        <select name="id_projet" class="form-control">
                            <option value="">Selectionner Un Projet</option>
                            <?php
                            foreach($all_projet as $projet)
                            {
                                $selected = ($projet['id_projet'] == $this->input->post('id_projet')) ? ' selected="selected"' : "";

                                echo '<option value="'.$projet['id_projet'].'" '.$selected.'>'.$projet['titre_projet'].'</option>';
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

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        var id_facture = $(this).data('row-id');
        var factureTable = $('#facture_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:id_facture
                }
            },
            url:"<?php echo base_url(); ?>facture/fetch_data",
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
            $('#id_facture input').attr('disabled',false);
            $('#id_facture').show();
        });


        $(document).on('submit', '#facture_form', function(event){
            event.preventDefault();
            var Numero = $('#Numero').val();
            var date_echeance = $('#date_echeance').val();
            var montant = $('#montant').val();
            var paiement_recu = $('#paiement_recu').val();
            var status = $('#status').val();
            var id_client = $('#id_client').val();
            var id_projet = $('#id_projet').val();
            var form_data = $(this).serialize();
            if(	Numero != '' && montant != '' && paiement_recu != '' && status != '' && id_client != '' && id_projet != '')
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
                        $('#id_facture').show();
                        $('#id_facture input').attr('disabled',true);
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