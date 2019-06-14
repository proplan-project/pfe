<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" id="add_button" data-toggle="modal" data-target="#noteModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un Note
                                </button>
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
                                <th data-column-id="titre_projet">Projet</th>
                                <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
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
                <div class="modal-body">
                    <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                        <div class="form-group">
                            <label>Projet</label>
                            <select name="id_projet">
                                <option value="">selectionner un projet</option>
                                <?php
                                foreach($all_projet as $projet)
                                {
                                    $selected = ($projet['id_projet'] == $this->input->post('id_projet')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$projet['id_projet'].'" '.$selected.'>'.$projet['titre_projet'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if($this->session->userdata['info']['db'] == 'utilisateur'){ ?>
                        <div class="form-group">
                            <label>Projet</label>
                            <select name="id_projet">
                                <option value="">selectionner un projet</option>
                                <?php
                                foreach($utilisateur_projet as $up)
                                {
                                    $selected = ($up['id_projet'] == $this->input->post('id_projet')) ? ' selected="selected"' : "";

                                    echo '<option value="'.$up['id_projet'].'" '.$selected.'>'.$up['titre_projet'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <?php } ?>
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
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_note+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_note+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
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
            var id_projet = $('#id_projet').val();
            var form_data = $(this).serialize();
            if(	titre != '' && description != '' && id_projet != '')
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
                        $('#id_projet').val(data.description);
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