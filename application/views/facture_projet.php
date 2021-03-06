


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
                        <table id="id_projet" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th data-column-id="Numero" data-formatter="num">N° Facture</th>
                                <th data-column-id="date_facture">Date facture</th>
                             <!--   <th data-column-id="date_echeance">Date échéance</th> -->
                                <th data-column-id="montant">Montant</th>
                                <th data-column-id="paiement_recu">Paiement reçu</th>
                                <th data-column-id="status">Status</th>
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
<script src="../assets/js/light-bootstrap-dashboard.js"></script>
 
<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        var id_projet =window.location.pathname.split("/")[4];
        var factureTable = $('#id_projet').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:id_projet
                }
            },
            url:"<?php echo base_url(); ?>facture/facture_projet" 
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
            if(	  montant != '' && paiement_recu != '' && status != '' && id_client != '' && id_projet != '')
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