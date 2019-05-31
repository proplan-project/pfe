<!doctype html>
<html lang="fr">
<head>
    <title>Profile</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assest/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assest/js/croppie.js"></script>
    <script src="<?php echo base_url(); ?>assest/js/light-bootstrap-dashboard.js"></script>
    <script src="<?php echo base_url(); ?>assest/js/demo.js"></script>

    <link href="<?php echo base_url(); ?>assest/css/bootstrap.min.css"  rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assest/css/croppie.css"  rel="stylesheet"  />
    <link href="<?php echo base_url(); ?>assest/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assest/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assest/css/demo.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assest/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assest/img/favicon.ico" rel="icon" type="image/png" >
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head><!-- head balise -->
<body>
<div class="wrapper">
    <div class="container">
        <br />
        <h3 align="center">Image Crop and Save into Database using PHP with Ajax</h3>
        <br />
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">Select Profile Image</div>
            <div class="panel-body" align="center">
                <input type="file" name="insert_image" id="insert_image" accept="image/*" />
                <br />
                <div id="showdata"></div>
            </div>
        </div>
    </div>
</body>

<div id="insertimageModal" class="modal" role="dialog" >
    <div class="modal-dialog" style="width:670px ;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crop & Insert Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop & Insert Image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){

        //Add New
        $('#modal-btn').click(function(){
            $('#my-modal').modal('show');
        });


        $('#btnsocial').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        $('#myModal').modal('hide');
                        $('#myForm')[0].reset();
                        $('.alert-success').html('Employee aded successfully').fadeIn().delay(4000).fadeOut('slow');
                    }else{
                        alert('Error');
                    }
                },
                error: function(){
                    alert('Could not add data');
                }
            });
        });

    });
</script>
<script>
    $(document).ready(function (){
        $("#imghide").hover(function()
            {
                $("#boxson").show();
            },
            function()
            {
                $("#boxson").hide();
            });

    })
</script><!-- hide image user -->
<script>
    $('.new_Btn').bind("click" , function () {
        $('#insert_image').click();
    });
</script><!-- load image style -->
<script>
    $(document).ready(function(){
        $('.new_Btn').bind("click" , function () {
            $('#insert_image').click();
        });

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
                    console.log('jQuery bind complete');
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
                success:function(data)
                {
                    $('#showdata').html(data);
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
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
<div id="modalbtn" class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">parametre</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="" id="myForm" method="post">
                        <div class="alert alert-warning" role="alert" style="opacity: .7">
                            <span class="close close-alert" >&times;</span>
                            <i class="pe-7s-attention"> </i>
                            entrer le lien de votre compte correct :
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
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #fff;border: 1px solid #888;color: #000">Close</button>
                <button type="button" id="btnSave" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(function(){

        $('#btn').click(function(){
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
                            $('#myForm')[0].reset();
                            $('.alert-success').html('kolxi mzyaan').fadeIn().delay(4000).fadeOut('slow');
                        }else{
                            alert('un champs field ou un lien non valid');
                            console.log(json);
                        }
                    },
                    error: function(){
                        alert('Could not add data');
                    }
                });
            }
        });

    });
</script>
</html>
