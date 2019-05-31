<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-fileinput/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-fileinput/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/fr.js"></script>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"  rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/croppie.css"  rel="stylesheet"  />
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/img/favicon.ico" rel="icon" type="image/png" >
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="wrapper">
    <div class="sidebar"data-color="#777" data-image="<?php echo base_url(); ?>assets/img/sidebar-5.jpg"><!--side bar -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.proplan.com" class="simple-text">
                    ProPlan
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url()?>private_area">
                        <i class="pe-7s-graph"></i>
                        <p>Accueil</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>client">
                        <i class="pe-7s-note2"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Projets</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Taches</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-cash"></i>
                        <p>Factures</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-note2"></i>
                        <p>Notes</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-chat"></i>
                        <p>Message</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-graph3"></i>
                        <p>Rapports de temps</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-graph1"></i>
                        <p>Fuilles de temps</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-users"></i>
                        <p>membre de l'équipe</p>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- end of side baar -->

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" ><b>ProPlan</b> : Créer une harmonie de travail</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-user" style="font-size: 25px"></i>
                                <span style="opacity:0 ;">5</span>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><b>AlamiFati</b><i>&nbspadmin</i></a></li>
                                <li><a href="#">Voir le Profil</a></li>
                                <li><?php echo '<a href="'.base_url().'private_area/logout">Deconnecter</a>'; ?></li>
                            </ul>
                        </li>
                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-mail" style="font-size: 25px"></i>
                                <span class="notification">5</span>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Message De Hala</a></li>
                                <li><a href="#">Autre Message</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-global" style="font-size: 25px"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Françcais</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav><!--of nav bar-->


        <div class="content">
            <div class="container-fluid" >
                <div class="row">
                    <div class="panel panel-default" style="margin-bottom: 100px;">
                        <div class="panel-heading">Sélectionnez Fichier</div>
                        <div class="panel-body">
                            <div class="file-loading">
                                <input id="input-fr"  type="file"  name="excel" multiple >
                            </div>
                        </div>
                    </div>
                   <!-- <div class="col-sm-12" >
                        <div class="col-sm-9">
                            <label class="control-label">Sélectionnez Fichier</label>
                            <div class="file-loading">
                                <input id="input-fr"  type="file"  name="excel" >
                            </div>
                        </div>
                    </div>!-->
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; 2019 <a href="http://www.proplan.com">ProPlan</a>, made by EL ALAMI FATIMA ZAHRA & HALA EL YABOURI
                    </p>
                </div>
            </footer>

        </div>
    </div>



    <script>
    $("#input-fr").fileinput({
        language: "fr",
        uploadUrl: "../livre/implod.php",
        maxFileCount: 10,
        allowedFileExtensions: ["xls", "xlsx", "csv","pdf","ppt","docx","Psd","Ai","mp3","mp3"]
    });
</script>



</html>