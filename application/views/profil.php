<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>
        <div class="content">
            <div class="container-fluid" >
                <div class="row">
                    <div id="store_image" style="background-color: red;width: 100px"></div>
                    <div class="col-sm-4" ><!--left col-->
                        <input type="file" name="insert_image" id="insert_image" accept="image/*" style="display: none"/>
                        <br />
                        <div id="showdata"></div>
                        <div class="text-center">
                            <input type="file" name="insert_image" id="insert_image" accept="image/*" style="display: none"/>
                            <h3><?php echo $info['prenom']; ?>  <?php echo $info['nom']; ?></h3>
                        </div></hr><br><!--image with name of user or admin -->
                        <ul class="list-group">
                            <li class="list-group-item text-muted"><i class="fa fa-dashboard fa-1x"></i>Activité</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Taches</strong></span> 125</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Projets</strong></span> 13</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Equipe</strong></span> 37</li>
                            <?php
                                if ($this->session->userdata['info']['db'] =='chef_projet'){
                            ?>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong>Clients</strong></span> 37</li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong>Facture</strong></span> 37</li>
                            <?php
                                }
                            ?>
                        </ul><!--list of Activities of user or admin-->
                        <div id="alert-success">

                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">médias sociaux
                                <button type="button" id="btns" class="btn" style="border:none;color: #000;border-radius: 50%;float: right;margin-top: -8px">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="panel-body">
                                <ul class="ul" style="margin-left: 60px;list-style: none ;">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true" title="null"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true" title="null"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true" title="null"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true" title="null"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true" title="null"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github" aria-hidden="true" title="null"></i></a></li>
                                </ul>
                            </div>
                        </div><!--social media of user or admin-->
                    </div><!--/end of left col-->
                    <div class="col-sm-8">
                        <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '
                            <div class="alert alert-danger alert-dismissible">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                '.$this->session->flashdata("message").'
                            </div>
                           ';
                        }
                        ?>
                        <?php
                        if($this->session->flashdata('res'))
                        {
                            echo '
                            <div class="alert alert-success alert-dismissible">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                '.$this->session->flashdata("res").'
                            </div>
                           ';
                        }
                        ?>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Parametre</a></li>
                            <li><a data-toggle="tab" href="#messages">changer le mot de passe</a></li>
                        </ul>


                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <hr>
                                <form class="form" action="<?php echo base_url();?>profil/validation" method="post" id="registrationForm">
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>Prenom</h4></label>
                                            <input type="text" class="form-control" name="prenom" id="first_name" placeholder="Votre Prenom" value="<?php echo $info['prenom']; ?>">
                                            <span class="text-danger"><?php echo form_error('prenom'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="last_name"><h4>Nom</h4></label>
                                            <input type="text" class="form-control" name="nom" id="last_name" placeholder="Votre Nom" value="<?php echo $info['nom']; ?>" >
                                            <span class="text-danger"><?php echo form_error('nom'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="phone"><h4>Telephone</h4></label>
                                            <input type="text" class="form-control" name="tel" id="phone" placeholder="Votre Numero" value="<?php echo $info['tel']; ?>">
                                            <span class="text-danger"><?php echo form_error('tel'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile"><h4>Email</h4></label>
                                            <input type="text" class="form-control" name="email" id="mobile" placeholder="toi@email.com" value="<?php echo $info['email']; ?>">
                                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="email"><h4>Adresse</h4></label>
                                            <input type="text" class="form-control" name="adresse" id="email" placeholder="Votre Adresse" value=" <?php echo $info['adresse']; ?>">
                                            <span class="text-danger"><?php echo form_error('adresse'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="email"><h4>Genre</h4></label>
                                            <select class="form-control" name="genre">
                                                <option <?php if($info['genre']=='femme')echo "selected";?> >Femme</option>
                                                <option <?php if($info['genre']=='homme')echo "selected";?> >Homme</option>
                                            </select>
                                            <br><br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <form method="post" action="<?php echo base_url(); ?>/profil/edit" >
                                                <button type="submit" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000"/> Modifier
                                            </form>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                            </div><!--/tab-of settings-->
                            <div class="tab-pane" id="messages">
                                <form class="form" action="<?php echo base_url()?>profil/passwordupdate" method="post" id="registrationForm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password"><h4>Ancien Mot De Passe</h4></label>
                                            <input type="password" class="form-control" name="pass" id="password" placeholder="***" >
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="newpass"><h4>Nouveau Mot De Passe</h4></label>
                                            <input type="password" class="form-control" name="pass1" id="newpass" placeholder="***">
                                            <span toggle="#newpass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="newpassc"><h4>Confirmez Le Mot De Passe</h4></label>
                                            <input type="password" class="form-control" name="pass2" id="newpassc" placeholder="***" >
                                            <span toggle="#newpassc" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br><br><br>
                                                <form method="post" action="<?php echo base_url(); ?>export_csv/export" >
                                                    <button type="submit" name="export" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000"/> Modifier
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div><!--/tab-of edit password-->

                        </div><!--/tab-pane-->
                    </div><!--/end of right col-->
                </div><!--/col-9-->
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; 2019 <a href="http://www.proplan.com">ProPlan</a>, Développé par  EL ALAMI FATIMA ZAHRA & HALA EL YABOURI
                    </p>
                </div>
            </footer> <!--/end of footer-->
        </div>
    </div>
</div>
</body>


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
        width: 100%; /* Could be more or less, depending on screen size */
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
<div id="modalbtn" class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Liens Sociaux</h4>
            </div>
            <div class=" alert alert-success" style="display: none"></div>
            <div class="modal-body">
                <div class="row">
                    <form action="" id="myForm" method="post">
                        <div class="alert alert-warning" role="alert" style="opacity: .7">
                            <span class="close close-alert" >&times;</span>
                            <i class="pe-7s-attention"> </i>
                            Entrer les liens de vos compte sociaux :
                        </div>
                        <div class="col-md-12" style="margin-bottom: 15px">
                            <div class="col-md-6">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-user fa fa-facebook" ></i>
                                    <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $info['Facebook']; ?>"/>
                                    <div id="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-user fa fa-twitter" ></i>
                                    <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $info['Twitter']; ?>"/>
                                    <div id="error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 15px">
                            <div class="col-md-6">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-user fa fa-google-plus" ></i>
                                    <input type="text" class="form-control" name="google" id="google" value="<?php echo $info['Google']; ?>"/>
                                    <div id="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-user fa fa-linkedin" ></i>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php echo $info['LinkedIn']; ?>"/>
                                    <div id="error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 15px">
                            <div class="col-md-6">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-user fa fa-skype " ></i>
                                    <input type="text" class="form-control" name="skype" id="skype" value="<?php echo $info['Skype']; ?>"/>
                                    <div id="error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inner-addon left-addon">
                                    <i class="glyphicon glyphicon-user fa fa-github" ></i>
                                    <input type="text" class="form-control" name="github" id="github" value="<?php echo $info['github']; ?>" />
                                    <div id="error"></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #fff;border: 1px solid #888;color: #000">Fermer</button>
                <button type="button" id="btnSave" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">Enregister</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="insertimageModal" class="modal" role="dialog" >
    <div class="modal-dialog" style="width:670px ;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Couper et Insérer l'image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Couper et Insérer l'image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showhiddenimg(){

        // load image style
        $('#avatar').on( 'mouseover', function () {
            $('#imghide #boxson').show()

        } );


        $('#imghide #boxson').on( 'mouseout', function () {
            $('#imghide #boxson').hide()

        } )

        $('#imghide #boxson').bind("click" , function (event) {
            event.stopImmediatePropagation()
            $('#insert_image').click()
        })
    }
</script><!-- hide image user -->
<script>
    $(document).ready(function(){
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:200,
                height:200,
                type:'circle' //square
            },
            boundary:{
                width:300,
                height:300
            }
        });

        $('#insert_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){

                });
            }

            reader.readAsDataURL(this.files[0]);
            $('#insertimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url:'<?php echo base_url(); ?>insert',
                    type:'POST',
                    data:{"image":response},
                    success:function(data){
                        $('#insertimageModal').modal('hide');
                        load_images();
                        alert(data);
                    }
                })
            });
        });

        load_images();

        function load_images()
        {

            $.ajax({
                url:"<?php echo base_url() ?>Insert/fetch",
                /*  success:function(data)
                  {

                      console.log( data.substring(0, data.length -1 ) );
                      $('#showdata').html(data);
                  },
                  error: function(){
                      alert('Could not get Data from Database');
                  }*/
            }).done(function(data){
                data = data.substring(0, data.length -1 ) ;
                $('#showdata').html( data);
            });
        }


    });
</script><!-- load image and crop it -->
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script><!-- show and hide password -->
<script>
    $(".close-alert").click(function(e){
        $(this).parent().remove();
        e.preventDefault();
    });

</script><!-- close alert -->
<script>
    $(function(){;
        $('#btns').click(function(){
            $('#modalbtn').modal('show');
            $('#myForm').attr('action', '<?php echo base_url() ?>profil/validations');
        });


        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();

            if(true){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#myForm')[0].trigger('reset');
                            $('.alert-success').html('Tout les liens ont été mis à jour!').fadeIn().delay(4000).fadeOut('slow');
                                     }else{
                            alert('Un ou plusieurs champs sont invalident!');
                            console.log(json);
                        }
                    },
                    error: function(){
                        alert('Erreur lors de l\'insertion');
                    }
                });
            }
        });

    });
</script>
</html>