<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo_home.png">
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
        .card-counter{
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover{
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary{
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger{
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success{
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info{
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter i{
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers{
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
        }

        .card-counter .count-name{
            position: absolute;
            right: 35px;
            top: 65px;
            font-style: italic;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 18px;
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