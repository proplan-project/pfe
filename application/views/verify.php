<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>valider votre compte </title>
    <link href="<?php echo base_url(); ?>assest/css/bootstrap.min.css"  rel="stylesheet"/>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assest/plugins/themify-icons/themify-icons.css">

    <!-- Main Stylesheet -->
    <link href="<?php echo base_url(); ?>assest/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assest/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assest/images/favicon.ico" type="image/x-icon">
    <style>
        body{
            background-color:#41228e;
            background-image:url(<?php echo base_url();?>assest/images/illustrations/leaf-bg.png);
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" >
            <div class="panel panel-default" style="background-color:#FFFFFF ;height: 400px;margin-top: 100px;border-radius: 3%;box-shadow: -8px 9px 11px -5px rgba(0,0,0,0.75);">
                <div class="panel-body">
                    <center>
                        <img src="<?php echo base_url(); ?>assest/img/error.png" style="width: 90px ; height: auto ; margin-top: 20px;">
                        <h1 style="text-align: center ; color: red">UH OH!</h1>
                        <p style="text-align: center ;font-size: 16px;margin-top: 15px">Veuillez vérifier votre email pour vérifier votre compte.</p>
                        <button class="btn-danger"style="padding: 9px 12px;
                                        padding-top: 7px;
                                        font-size: 14px;
                                        line-height: 20px;
                                        color: #FFFFFF;
                                        text-align: center;
                                        vertical-align: middle;
                                        cursor: pointer;
                                        background-color: red;
                                        -webkit-border-radius: 3px;
                                        -webkit-border-radius: 3px;
                                        -webkit-border-radius: 3px;
                                        background-image: none !important;
                                        border: none;
                                        text-shadow: none;
                                        box-shadow: none;
                                        margin-top: 50px;
                                        transition: all 0.12s linear 0s !important;">
                            <a href="https://www.google.com" style="text-decoration: none;color: #FFFFFF">Vérifier</a></button>
                    </center>
                </div>
            </div>
        </div>
        <div class="layer" id="l2">
            <img src="<?php echo base_url();?>assest/images/illustrations/dots-cyan.png" alt="bg-shape">
        </div>
        <div style="z-index: -222;position: fixed">
            <img src="<?php echo base_url();?>assest/images/illustrations/leaf-yellow.png" alt="bg-shape">
        </div>
        <div class="layer" id="l6">
            <img src="<?php echo base_url();?>assest/images/illustrations/leaf-cyan.png" alt="bg-shape">
        </div>
        <div class="layer" id="l7">
            <img src="<?php echo base_url();?>assest/images/illustrations/dots-group-orange.png" alt="bg-shape">
        </div>
        <div class="layer" id="l9">
            <img src="<?php echo base_url();?>assest/images/illustrations/leaf-cyan-2.png" alt="bg-shape">
        </div>
        <!-- <div class="col-md-offset-4 col-md-4" style="background-color:#FFFFFF ;height: 400px;margin-top: 100px;border-radius: 3%;box-shadow: -8px 9px 11px -5px rgba(0,0,0,0.75);">
                   <div class="col-md-offset-4 col-md-4" >
                       <img src="<?php echo base_url(); ?>assest/img/error.png" style="width: 90px ; height: auto ; margin-top: 20px;">
                   </div>
                   <div class="col-md-offset-3 col-md-6" >
                       <h1 style="text-align: center ; color: red">UH OH!</h1>
                   </div>
                   <div class="col-md-offset-2 col-md-9" >
                       <p style="text-align: center ;font-size: 16px;margin-top: 15px">Veuillez vérifier votre email pour vérifier votre compte.</p>
                   </div>
                   <div class="col-md-offset-4 col-md-4" >
                       <button class="btn-danger"style="padding: 9px 12px;
                                        padding-top: 7px;
                                        font-size: 14px;
                                        line-height: 20px;
                                        color: #FFFFFF;
                                        text-align: center;
                                        vertical-align: middle;
                                        cursor: pointer;
                                        background-color: red;
                                        -webkit-border-radius: 3px;
                                        -webkit-border-radius: 3px;
                                        -webkit-border-radius: 3px;
                                        background-image: none !important;
                                        border: none;
                                        text-shadow: none;
                                        box-shadow: none;
                                        margin-top: 50px;
                                        transition: all 0.12s linear 0s !important;">
                           <a href="https://www.google.com" style="text-decoration: none;color: #FFFFFF">Vérifier</a></button>
                   </div>
               </div>-->
    </div>
</div>
    <script src="<?php echo base_url(); ?>assest/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->

    <!-- Main Script -->
    <script src="<?php echo base_url(); ?>assest/js/script.js"></script>
</body>
</html>