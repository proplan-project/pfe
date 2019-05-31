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
            background-image:url(<?php echo base_url();?>assest/images/illustrations/leaf-bg.png);
            padding: 50px;
        }

    </style>
</head>
<body>
       <form method="post" action="<?php  echo base_url(); ?>reset/resetpassword ">
           <div class="form-group">
               <input type="hidden" name="db" class="form-control" placeholder="votre email valid" value="<?php echo $db['db']; ?>"/>
           </div>
           <div class="form-group">
               <label style="font-size: 13px">Email :</label>
               <input type="text" name="user_email" class="form-control" placeholder="votre email valid"/>
               <span class="text-danger"><?php echo form_error('user_email'); ?></span>
           </div>
           <input type="submit" name="submit">
       </form>
</body>
</html>