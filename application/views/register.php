<!DOCTYPE html>
<html>
<head>
    <title>Complete User Registration and Login System in Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
<div class="container">
    <br><br>
    <?php
      echo $this->session->flashdata('message');
    ?>
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Register</div>
        <div class="panel-body">
            <form method="post" action="<?php echo base_url(); ?>register/validation">
                <div class="form-group">
                    <label>Nom :</label>
                    <input type="text" name="user_name" class="form-control" placeholder="votre nom"/>
                    <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                </div>
                <div class="form-group">
                    <label>Prenom :</label>
                    <input type="text" name="user_prenom" class="form-control" placeholder="votre prenom"/>
                    <span class="text-danger"><?php echo form_error('user_prenom'); ?></span>
                </div>
                <div class="form-group">
                    <label>Adresse :</label>
                    <input type="text" name="adresse" class="form-control" placeholder="votre adresse actuelle"/>
                    <span class="text-danger"><?php echo form_error('adresse'); ?></span>
                </div>
                <div class="form-group">
                    <label>Tel :</label>
                    <input type="number" name="tel" class="form-control" placeholder="votre telephone"/>
                    <span class="text-danger"><?php echo form_error('tel'); ?></span>
                </div>
                <div class="form-group">
                    <label>Email :</label>
                    <input type="text" name="user_email" class="form-control" placeholder="votre email valid"/>
                    <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                </div>
                <div class="form-group">
                    <label>Pass :</label>
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
</div>
</body>
</html>
