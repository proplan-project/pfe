<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>
        <style>
            .ul {
                display: flex ;
                position: absolute;
                left: 40px;
                transform: translate(-50%,-50%);
            }
            .ul li a{
                width: 30px;                                /* ??? ????????? */
                height: 30px;                                /* ??? ????????? */
                background-color: #f7f7f8;                  /* ??? ???????  */
                text-align: center;
                font-size: 15px;                            /* ??????? ?? ?????? ??????? */
                display: block;
                border-radius: 50%;                      /* ??? ???????? ???? ????? */
                position: relative;
                overflow: hidden;
                border: solid 3px #ffffff;
                z-index: 2;
            }
            .ul li a .fa {
                position: relative;
                color: #262626;                 /*  ??? ???????? ??????? */
                transition: .5s;
                z-index: 3;
            }
            .ul li a:hover .fa {
                color: #FFFFFF;                 /* ??? ???????? ??? ?????? */
                transform: rotateY(360deg);
            }
            .ul li a:before {
                content: '';
                position: absolute;
                top: 100% ;
                left: 0% ;
                width: 100%;
                height: 100%;
                background-color: #FF0000;
                transition: .5s;
                z-index:1 ;
            }
            .ul li a:hover:before {
                top: 0 ;
            }
            .ul li:nth-child(1) a:before {
                background-color:#3b5999 ; /* ????? ???*/
            }
            .ul li:nth-child(2) a:before {
                background-color:#55acee ;
            }
            .ul li:nth-child(3) a:before {
                background-color:#cd201f ; /* ???????? */
            }
            .ul li:nth-child(4) a:before {
                background-color:#dd4b39 ; /* ???? ??? */
            }
            .ul li:nth-child(5) a:before {
                background-color:#0077B5 ; /* ????? ?? */
            }
            .ul li:nth-child(6) a:before {
                background-color:#e4405f ; /* ???????? */
            }
            .ul li:nth-child(7) a:before {
                background-color:#25D366 ; /* ???????? */
            }
            .ul li:nth-child(8) a:before {
                background-color:#00AFF0 ; /* ????? */
            }
            .ul li:nth-child(9) a:before {
                background-color:#34465d ; /* ???????? */
            }
            .ul li:nth-child(10) a:before {
                background-color:#FFFC00 ; /* ???? ??? */
            }
            .field-icon {
                float: right;
                margin-left: -22px;
                margin-top: -25px;
                position: relative;
                z-index: 2;
            }
            :root {
                --modal-duration: 1s;
                --modal-color: #FFFFFF;
            }

            .modal-content {
                background-color: #fefefe;
                margin: 10% auto; /* 15% from the top and centered */
                padding: 20px;
                border: 1px solid #888;
                width: 40%; /* Could be more or less, depending on screen size */
            }


            .close {
                color: #ccc;
                float: right;
                font-size: 30px;
                color: #000;
            }
            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }
            @keyframes modalopen {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            .inner-addon {
                position: relative;
            }
            /* style icon */
            .inner-addon .glyphicon {
                position: absolute;
                padding: 10px;
                pointer-events: none;
            }
            /* align icon */
            .left-addon .glyphicon  { left:  0px;}
            .right-addon .glyphicon { right: 0px;}

            /* add padding  */
            .left-addon input  { padding-left:  30px; }
            .right-addon input { padding-right: 30px; }

            .alert {
                min-width: 150px;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid transparent;
                border-radius: 3px;
            p{
                padding: 0;
                margin: 0;
            }
            i{
                padding-right: 5px;
                vertical-align: middle;
                font-size: 24px;
            }
            .close-alert{
                -webkit-appearance: none;
                position: relative;
                float: right;
                padding: 0;
                border: 0;
                cursor: pointer;
                color: inherit;
                background: 0 0;
                font-size: 21px;
                line-height: 1;
                font-weight: bold;
                text-shadow: 0 1px 0 rgba(255,255,255,.7);
                filter: alpha(opacity=40);
                opacity: .4;
            }
            }

        </style>
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
                    <li><a data-toggle="tab" href="#notes">Notes</a></li>
                    <li><a data-toggle="tab" href="#fichiers">Fichiers</a></li>
                </ul>
            </div>


            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="informations">
                        <div class="row">
                            <div class="col-md-10">
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
                                    <table id="fichier_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Size</th>
                                            <th>Date_creation</th>
                                            <th>type</th>
                                        </tr>
                                        <?php foreach ($all_fichier as $f) {?>
                                            <tr>
                                                <td><a href="<?php echo base_url()?>uploads/<?php echo $f['nom'];?>" download><?php echo $f['nom'];?></a></td>
                                                <td><?php echo $f['size'];?></td>
                                                <td><?php echo $f['date_creation'];?></td>
                                                <td><?php echo $f['type'];?></td>
                                            </tr>
                                        <?php }?>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="commentaires">
                        <div class="col-xs-6">commentaires</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js"></script>
<!-- EQUIPE MODEL ----------------------------------------------------------------------------------------------------->

<div id="equipeModal" class="modal fade" style="z-index:5000">
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