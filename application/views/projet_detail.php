<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo $titre; ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
$color = get_cookie('color');;
if (isset($_POST['green'])){
    $color = "green";
    set_cookie('color','green','3600');
}
if (isset($_POST['red'])){
    $color = "red";
    set_cookie('color','red','3600');
}
if (isset($_POST['blue'])){
    $color = "blue";
    set_cookie('color','blue','3600');
}
if (isset($_POST['orange'])){
    $color = "orange";
    set_cookie('color','orange','3600');
}
if (isset($_POST['grey'])){
    $color = "#777";
    set_cookie('color','#777','3600');
}
if (isset($_POST['purple'])){
    $color = "purple";
    set_cookie('color','purple','3600');
}
if (isset($_POST['azure'])){
    $color = "azure";
    set_cookie('color','azure','3600');
}
?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <?php foreach ($projet as $p){ ?>
                                <div class="col-xs-12"><h6>Projet: <?php echo $p['titre_projet']; ?></h6></div>
                            <?php } ?>
                        </div>
                        <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                        <div class="col-md-2" align="right">
                            <button type="button" id="add_equipe_button" data-toggle="modal" data-target="#equipeModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inviter un équipe
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#informations">Informations</a></li>
                    <li><a data-toggle="tab" href="#taches">Liste des taches</a></li>
                    <li><a data-toggle="tab" href="#kanban">Kanban</a></li>
                    <li><a data-toggle="tab" href="#notes">Notes</a></li>
                    <li><a data-toggle="tab" href="#fichiers">Fichiers</a></li>
                    <li><a data-toggle="tab" href="#commentaires">Commentaires</a></li>
                    <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                    <li><a data-toggle="tab" href="#facture">Facture</a></li>
                    <?php } ?>
                </ul>
            </div>


            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="informations">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="content">
                                        <div class="header">
                                            <h4 class="title">Email Statistics</h4>
                                            <p class="category">Last Campaign Performance</p>
                                        </div>
                                        <div class="content">
                                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                            <div class="footer">
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> Open
                                                    <i class="fa fa-circle text-danger"></i> Bounce
                                                    <i class="fa fa-circle text-warning"></i> Unsubscribe
                                                </div>
                                                <hr>
                                                <div class="stats">
                                                    <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Description</h4>
                                    </div>
                                    <div class="content">
                                        <?php foreach ($projet as $p){ ?>
                                            <p class="text-justify"><?php echo $p['description']; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="taches">
                        <!-- TACHES -------------------------------------------------------------------------------->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="tache_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th data-column-id="titre">Titre</th>
                                            <th data-column-id="description">Description</th>
                                            <th data-column-id="date_debut">Date_debut</th>
                                            <th data-column-id="date_limite">Date limite</th>
                                            <th data-column-id="status">Status</th>
                                            <th data-column-id="percent_complete" data-formatter="pourcentage">Pourcentage</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kanban">
                        <div class="col-xs-6">kanban</div>
                    </div>
                    <div class="tab-pane" id="notes">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="note_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th data-column-id="titre">Titre</th>
                                            <th data-column-id="description">Description</th>
                                            <th data-column-id="date_creation">Date de création</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fichiers">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <button id="myBtn" class="btn btn-primary">Ajouter un fichier</button>
                                <div id="myModal" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <input type="hidden" name="projet" value="<?php echo $id_projet; ?>" />
                                            </div>
                                           <div class="form-group row">
                                               <input type="file" name="image_file" id="image_file" />
                                           </div>
                                            <div class="form-group row">
                                                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" style="float: right"/>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="admin_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Size</th>
                                            <th>Date_creation</th>
                                            <th>Createur</th>
                                            <th>type</th>
                                            <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="commentaires">
                        <div class="col-xs-6">commentaires</div>
                    </div>
                    <div class="tab-pane" id="facture">
                        <div class="panel panel-default">
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
                                            <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
                                            <th data-column-id="nom">Client</th>
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
        </div>
    </div>
</div>
</body>

<!-- EQUIPE MODEL ----------------------------------------------------------------------------------------------------->

<div id="equipeModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="equipe_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inviter un équipe</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Equipe</label>
                        <select name="id_equipe">
                            <option value="">selectionner un équipe</option>
                            <?php
                            foreach($all_equipe as $equipe)
                            {
                                $selected = ($equipe['id_equipe'] == $this->input->post('id_equipe')) ? ' selected="selected"' : "";

                                echo '<option value="'.$equipe['id_equipe'].'" '.$selected.'>'.$equipe['nom'].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id_projet" id="id_projet" value="<?php echo $id_projet; ?>" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="add_equipe" id="add_equipe" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        $('#add_equipe_button').click(function(){
            $('#equipe_form')[0].reset();
            $('.modal-title').text("Inviter un équipe");
            $('#add_equipe').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#equipe_form', function(event){
            event.preventDefault();
            var id_projet = $('#id_projet').val();
            var id_equipe = $('#id_equipe').val();
            var form_data = $(this).serialize();
            if(	id_equipe != '' && id_projet != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>projet/add_equipe",
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

        <!-- TACHE SCRIPT ----------------------------------------------------------------------------------------------------->

        var tacheTable = $('#tache_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>tache/tache_projet/<?php echo $id_projet; ?>",
            formatters:{
                "pourcentage":function(column, row)
                {
                    return "<progress class=\"progress\" value='"+row.percent_complete+"' max=\"100\" data-row-id='"+row.id_tache+"'></progress>";
                }
            }
        });

        <!-- NOTE SCRIPT ----------------------------------------------------------------------------------------------------->
        var noteTable = $('#note_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>note/note_projet/<?php echo $id_projet; ?>",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_note+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_note+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                }
            }
        });

        <!-- Facture SCRIPT ----------------------------------------------------------------------------------------------------->
        var factureTable = $('#facture_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>facture/facture_projet/<?php echo $id_projet; ?>",
            formatters:{
                "num":function(column, row)
                {
                    return "<a href=\"<?php echo base_url()?>facture/detail/" +row.id_facture+ "\" target=\"_blank\">" + row.Numero + "</a>";
                }
            }
        });

    });
</script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script>
    $(document).ready(function(){
        $('#upload_form').on('submit', function(e){
            e.preventDefault();
            if($('#image_file').val() == '')
            {
                alert("Please Select the File");
            }
            else
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>upload/ajax_upload",
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function(data)
                    {
                        $('#uploaded_image').html(data);
                        alert("yes");
                    }
                });
            }
        });
    });
</script>