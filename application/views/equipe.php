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
                                <button type="button" id="add_button" data-toggle="modal" data-target="#equipeModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un Equipe
                                </button>
                            </div>
                        </div>
                    </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="equipe_data" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th data-column-id="nom" data-formatter="nom">Nom d'équpe</th>
                                <th data-column-id="titre_emploi">Titre d'emploi</th>
                                <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                                    <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                                <?php }?>
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
                                    <th>Nom d'équpe</th>
                                    <th>Titre d'emploi</th>
                                </tr>
                                </thead>

                                <?php foreach ($utilisateur_equipe as $up){ ?>
                                <tr>
                                    <td><?php echo $up['nom']; ?></td>
                                    <td><?php echo $up['titre_emploi']; ?></td>
                                </tr>
                                <?php } ?>
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

<div id="equipeModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="equipe_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un Equipe</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Titre d'emploi</label>
                        <input type="text" name="titre_emploi" id="titre_emploi" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_equipe" id="id_equipe" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var equipeTable = $('#equipe_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>equipe/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_equipe+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_equipe+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                },
                "nom":function(column, row)
                {
                    return "<a href=\"<?php echo base_url()?>equipe/detail/" +row.id_equipe+ "\">" + row.nom + "</a>";

                }
            }
        });

        $('#add_button').click(function(){
            $('#equipe_form')[0].reset();
            $('.modal-title').text("Add Equipe");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#equipe_form', function(event){
            event.preventDefault();
            var nom = $('#nom').val();
            var titre_emploi = $('#titre_emploi').val();
            var form_data = $(this).serialize();
            if(	nom != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>equipe/action",
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

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            equipeTable.find('.update').on('click', function(event){
                var id_equipe = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>equipe/fetch_single_data",
                    method:"POST",
                    data:{id_equipe:id_equipe},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#equipeModal').modal('show');
                        $('#nom').val(data.nom);
                        $('#titre_emploi').val(data.titre_emploi);
                        $('.modal-title').text("Edit Equipe Details");
                        $('#id_equipe').val(id_equipe);
                        $('#action').val('Edit');
                        $('#operation').val('Edit');
                    }
                });
            });

            equipeTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
                {
                    var id_equipe = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>equipe/delete_data",
                        method:"POST",
                        data:{id_equipe:id_equipe},
                        success:function(data)
                        {
                            alert(data);
                            $('#equipe_data').bootgrid('reload');
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