<!doctype html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        body{
            background-color:#41228e;
            background-image:url(<?php echo base_url();?>assets/images/illustrations/leaf-bg.png);
            padding: 50px;
        }

    </style>
</head>
<body>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-center" >
        </div>
        <div class="col-md-5 register-center" style="background-color: #ffffff;height:auto;margin-top: 50px;border-radius: 3%;box-shadow: -8px 9px 11px -5px rgba(0,0,0,0.75);">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h4 class="register-heading" style="text-align: center;padding-top: 15px">Espace d'administration</h4>
                    <div class="row register-form">
                        <div class="col-md-12">
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
                            <form method="post" action="<?php echo base_url(); ?>admin/validation">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="email"/>
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Mot de Pass :</label>
                                    <input id="pass" type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" placeholder="********"/>
                                    <span toggle="#pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="hidden" value="admin"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" value="Login" class="btn btn-info" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="position: fixed;margin-left: 650px;margin-top: 135px">
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