<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" id="add_button" data-toggle="modal" data-target="#adminModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un admin
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="admin_data" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Tel</th>
                                    <th>Genre</th>
                                    <th>Date création</th>
                                    <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                                </tr>
                                </thead>
                                <?php foreach ($admin as $a){ ?>
                                    <tr>
                                        <th><?php echo$a['nom']; ?></th>
                                        <th><?php echo$a['prenom']; ?></th>
                                        <th><?php echo$a['email']; ?></th>
                                        <th><?php echo$a['tel']; ?></th>
                                        <th><?php echo$a['genre']; ?></th>
                                        <th><?php echo$a['date_creation']; ?></th>
                                        <th>
                                            <form action="<?php base_url() ?>administration/delete_data" method="post">
                                                <input type="hidden" name="id" id="id" value="<?php echo $a['id']; ?>" />
                                                <button type='submit' name="delete" class='btn btn-danger btn-xs delete' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>
                                            </form>
                                        </th>
                                    </tr>
                                <?php } ?>
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

<div id="adminModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="admin_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un projet</h4>
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
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Tel</label>
                        <input type="text" name="tel" id="tel" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" id="genre" class="form-control">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
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
        $('#add_button').click(function(){
            $('#admin_form')[0].reset();
            $('.modal-title').text("Add Admin");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#admin_form', function(event){
            event.preventDefault();
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var tel = $('#tel').val();
            var genre = $('#genre').val();
            var form_data = $(this).serialize();
            if(	nom != '' && prenom != '' && email != '' && password != '' && tel != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>administration/action",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#admin_form')[0].reset();
                        $('#adminModal').modal('hide');
                        //$('#admin_data').bootgrid('reload');
                        setTimeout(function(){
                            $( "#admin_data" ).load( "administration #admin_data" );
                        }, 20);
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });
});
</script>