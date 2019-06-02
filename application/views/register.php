
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>s'inscrire maintenant</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"  rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/slick/slick.css">7
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/themify-icons/themify-icons.css">
    <style>
        body{
            background-color:#41228e;
            background-image:url(<?php echo base_url();?>assets/images/illustrations/leaf-bg.png);
        }

    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" >
            <div class="panel panel-default" style="background-color:#FFFFFF ;height:auto;margin-top: 100px;border-radius: 3%;box-shadow: -8px 9px 11px -5px rgba(0,0,0,0.75);">
                <div class="panel-body">
                    <h2><center> S'inscrire Maintenant</center></h2>
                    <form method="post" action="<?php echo base_url(); ?>register/validation">
                        <div class="form-group">
                            <label style="font-size: 13px">Nom :</label>
                            <input type="text" name="user_name" class="form-control" placeholder="votre nom"/>
                            <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-size: 13px">Prenom :</label>
                            <input type="text" name="user_prenom" class="form-control" placeholder="votre prenom"/>
                            <span class="text-danger"><?php echo form_error('user_prenom'); ?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-size: 13px">Adresse :</label>
                            <input type="text" name="adresse" class="form-control" placeholder="votre adresse actuelle"/>
                            <span class="text-danger"><?php echo form_error('adresse'); ?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-size: 13px">Tel :</label>
                            <input type="number" name="tel" class="form-control" placeholder="votre telephone"/>
                            <span class="text-danger"><?php echo form_error('tel'); ?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-size: 13px">Email :</label>
                            <input type="text" name="user_email" class="form-control" placeholder="votre email valid"/>
                            <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-size: 13px">Pass :</label>
                            <input type="password" name="user_password" class="form-control"  />
                            <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" value="Register" class="btn btn-info" />&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>login">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="position: fixed;margin-left: 650px;margin-top: 110px">
            <img src="<?php echo base_url();?>assets/images/illustrations/dots-cyan.png" alt="bg-shape">
        </div>
        <div style="z-index: -222;position: fixed">
            <img src="<?php echo base_url();?>assets/images/illustrations/leaf-yellow.png" alt="bg-shape">
        </div>
        <div style="z-index: -222;position: fixed;margin-top: 560px;margin-left: 200px">
            <img src="<?php echo base_url();?>assets/images/illustrations/leaf-cyan.png" alt="bg-shape">
        </div>
        <div style="position: fixed;margin-top:490px;">
            <img src="<?php echo base_url();?>assets/images/illustrations/dots-group-orange.png" alt="bg-shape">
        </div>
        <div style="position: fixed;margin-left: 900px;margin-top: 500px;">
            <img src="<?php echo base_url();?>assets/images/illustrations/leaf-cyan-2.png" alt="bg-shape">
        </div>
    </div>
</div>

</body>
</html>
