<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" id="add_button" data-toggle="modal" data-target="#utilisateurModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un utilisateur
                            </button>

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="utilisateur_data" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th data-column-id="nom">Nom</th>
                                <th data-column-id="prenom">Prenom</th>
                                <th data-column-id="type">Type</th>
                                <th data-column-id="email">Email</th>
                                <th data-column-id="password">Mot De Passe</th>
                                <th data-column-id="genre">Genre</th>
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

<div id="utilisateurModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="utilisateur_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un utilisateur</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" id="type" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="emailt" name="email" id="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Mot De Passe</label>
                        <input type="password" name="password" id="password" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" id="genre" class="form-control">
                            <option value="homme">M</option>
                            <option value="femme">F</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Ajouter" />
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var utilisateurTable = $('#utilisateur_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>utilisateur/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#utilisateur_form')[0].reset();
            $('.modal-title').text("Ajouter Un Utilisateur");
            $('#action').val("Ajouter");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#utilisateur_form', function(event){
            event.preventDefault();
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var type = $('#type').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var genre = $('#genre').val();
            var id = $('#id').val();
            var form_data = $(this).serialize();
            if(	nom != '' && prenom != '' && type != '' && email != '' && password != '' && genre != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>utilisateur/action",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#utilisateur_form')[0].reset();
                        $('#utilisateurModal').modal('hide');
                        $('#utilisateur_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            utilisateurTable.find('.update').on('click', function(event){
                var id = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>utilisateur/fetch_single_data",
                    method:"POST",
                    data:{id:id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#utilisateurModal').modal('show');
                        $('#nom').val(data.nom);
                        $('#prenom').val(data.prenom);
                        $('#type').val(data.type);
                        $('#email').val(data.email);
                        $('#password').val(data.password);
                        $('#genre').val(data.genre);
                        $('.modal-title').text("Modifier Les Info D'utilisateur");
                        $('#id').val(id);
                        $('#action').val('Modifier');
                        $('#operation').val('Edit');
                    }
                });
            });

            utilisateurTable.find('.delete').on('click', function(event){
                if(confirm("Voulez vous supprimer cet utilisateur ?"))
                {
                    var id = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>utilisateur/delete_data",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            alert(data);
                            $('#utilisateur_data').bootgrid('reload');
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