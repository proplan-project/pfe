<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assest/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Acceuil</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assest/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assest/css/animate.min.css" rel="stylesheet"/>
    <link href="assest/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assest/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assest/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
        .ul {
            display: flex ;
            position: absolute;
            left: 40px;
            transform: translate(-50%,-50%);
        }
         .ul li a{
             width: 30px; 								/* عرض الايقونات */
             height: 30px;								 /* طول الايقونات */
             background-color: #f7f7f8; 					/* لون الخلفية  */
             text-align: center;
             font-size: 15px;							/* التباعد من اليمين والشمال */
             display: block;
             border-radius: 50%;						 /* حجم الالتفاف لصنع دائرة */
             position: relative;
             overflow: hidden;
             border: solid 3px #ffffff;
             z-index: 2;
         }
         .ul li a .fa {
             position: relative;
             color: #262626; 				/*  لون الايقونة الاساسى */
             transition: .5s;
             z-index: 3;
         }

         .ul li a:hover .fa {
             color: #FFFFFF; 				/* لون الايقونة بعد الهوفر */
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
             background-color:#3b5999 ; /* الفيس بوك*/
         }

         .ul li:nth-child(2) a:before {
             background-color:#55acee ; /* تويتر */
         }

         .ul li:nth-child(3) a:before {
             background-color:#cd201f ; /* اليوتيوب */
         }

         .ul li:nth-child(4) a:before {
             background-color:#dd4b39 ; /* جوجل بلس */
         }

         .ul li:nth-child(5) a:before {
             background-color:#0077B5 ; /* لينكد ان */
         }

         .ul li:nth-child(6) a:before {
             background-color:#e4405f ; /* إنستجرام */
         }

         .ul li:nth-child(7) a:before {
             background-color:#25D366 ; /* الواتساب */
         }

         .ul li:nth-child(8) a:before {
             background-color:#00AFF0 ; /* سكايب */
         }

         .ul li:nth-child(9) a:before {
             background-color:#34465d ; /* التليفون */
         }

         .ul li:nth-child(10) a:before {
             background-color:#FFFC00 ; /* سناب شات */
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


        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            margin: 10% auto;
            width: 60%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
            animation-name: modalopen;
            animation-duration: var(--modal-duration);
        }


        .modal-header {
            background: #FFFFFF;
            height: 50px;
        }

        .modal-body {
            padding: 10px 20px;
            background: #fff;
        }

        .modal-footer {
            background: var(--modal-color);
            padding: 10px;
            text-align: center;
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
</head>
<body>
<div class="wrapper">
    <div class="sidebar"data-color="#777" data-image="assest/img/sidebar-5.jpg"><!--side bar -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.proplan.com" class="simple-text">
                    ProPlan
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url()?>/private_area">
                        <i class="pe-7s-graph"></i>
                        <p>Accueil</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>/client">
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
                        <div class="col-sm-4"><!--left col-->


                            <div class="text-center">
                                <?php
                                    if ($info['image']==null){
                                        echo "<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='avatar img-circle img-thumbnail' alt='avatar'>";
                                    }else{
                                        echo "<img src='".base_url()."/assest/img/faces/face-1.jpg' class='avatar img-circle img-thumbnail' alt='avatar' style='width:200px;'> ";
                                    }
                                ?>
                                <h3><?php echo $info['prenom']; ?>  <?php echo $info['nom']; ?></h3>
                            </div></hr><br><!--image with name of user or admin -->


                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-link fa-1x"></i>Role</div>
                                <div class="panel-body"><?php echo $info['type']; ?></div>
                            </div><!--panel of role of user or admin-->


                            <ul class="list-group">
                                <li class="list-group-item text-muted"><i class="fa fa-dashboard fa-1x"></i>Activité</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Taches</strong></span> 125</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Projets</strong></span> 13</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Equipe</strong></span> 37</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Clients</strong></span> 37</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Facture</strong></span> 37</li>
                            </ul><!--list of Activities of user or admin-->

                            <div class="panel panel-default">
                                <div class="panel-heading">médias sociaux
                                    <button type="button" id="modal-btn" class="btn" style="border:none;color: #000;border-radius: 50%;float: right;margin-top: -8px">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                    <div id="my-modal" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <span class="close" >&times;</span>
                                                <p>Parametre :</p>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="<?php echo base_url();?>/profil/edit" method="post">
                                                        <div class="alert alert-warning" role="alert" style="opacity: .7">
                                                            <span class="close close-alert" >&times;</span>
                                                            <i class="pe-7s-attention"> </i>
                                                            entrer le lien de votre compte correct :
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom: 15px">
                                                            <div class="col-md-6">
                                                                <div class="inner-addon left-addon">
                                                                    <i class="glyphicon glyphicon-user fa fa-facebook" ></i>
                                                                    <input type="text" class="form-control" name="facebook" value="<?php echo $info['Facebook']; ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="inner-addon left-addon">
                                                                    <i class="glyphicon glyphicon-user fa fa-twitter" ></i>
                                                                    <input type="text" class="form-control" name="twitter" value="<?php echo $info['Twitter']; ?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom: 15px">
                                                            <div class="col-md-6">
                                                                <div class="inner-addon left-addon">
                                                                    <i class="glyphicon glyphicon-user fa fa-google-plus" ></i>
                                                                    <input type="text" class="form-control" name="google" value="<?php echo $info['Google']; ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="inner-addon left-addon">
                                                                    <i class="glyphicon glyphicon-user fa fa-linkedin" ></i>
                                                                    <input type="text" class="form-control" name="linkedin" value="<?php echo $info['LinkedIn']; ?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="margin-bottom: 15px">
                                                            <div class="col-md-6">
                                                                <div class="inner-addon left-addon">
                                                                    <i class="glyphicon glyphicon-user fa fa-skype " ></i>
                                                                    <input type="text" class="form-control" value="<?php echo $info['Skype']; ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="inner-addon left-addon">
                                                                    <i class="glyphicon glyphicon-user fa fa-github" ></i>
                                                                    <input type="text" class="form-control" name="github" value="<?php echo $info['github']; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000"/> Modifier
                                            </div>
                                            </form>
                                        </div>
                                    </div>
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
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Parametre</a></li>
                                <li><a data-toggle="tab" href="#messages">changer le mot de passe</a></li>
                            </ul>


                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <hr>
                                    <form class="form" action="<?php echo base_url();?>/profil/editinfo" method="post" id="registrationForm">
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="first_name"><h4>Prenom</h4></label>
                                                <input type="text" class="form-control" name="prenom" id="first_name" placeholder="Votre Prenom" value="<?php echo $info['prenom']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="last_name"><h4>Nom</h4></label>
                                                <input type="text" class="form-control" name="nom" id="last_name" placeholder="Votre Nom" value="<?php echo $info['nom']; ?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="phone"><h4>Telephone</h4></label>
                                                <input type="text" class="form-control" name="tel" id="phone" placeholder="Votre Numero" value="<?php echo $info['tel']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mobile"><h4>Email</h4></label>
                                                <input type="text" class="form-control" name="email" id="mobile" placeholder="toi@email.com" value="<?php echo $info['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="email"><h4>Adresse</h4></label>
                                                <input type="text" class="form-control" name="adresse" id="email" placeholder="Votre Adresse" value="<?php echo $info['adresse']; ?>">
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
                                    <form class="form" action="##" method="post" id="registrationForm">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"><h4>mot de passe actuel</h4></label>
                                                <input type="password" class="form-control" name="first_name" id="password" placeholder="*******" >
                                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="newpass"><h4>nouveau mot de passe</h4></label>
                                                <input type="password" class="form-control" name="last_name" id="newpass" placeholder="*******">
                                                <span toggle="#newpass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="newpassc"><h4>Confirmez le mot de passe</h4></label>
                                                <input type="password" class="form-control" name="last_name" id="newpassc" placeholder="*******" >
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
                        &copy; 2019 <a href="http://www.proplan.com">ProPlan</a>, made by EL ALAMI FATIMA ZAHRA & HALA EL YABOURI
                    </p>
                </div>
            </footer>

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="assest/js/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assest/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assest/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assest/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assest/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assest/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assest/js/demo.js"></script>

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
</script>

<script>
    // Get DOM Elements
    const modal = document.querySelector('#my-modal');
    const modalBtn = document.querySelector('#modal-btn');
    const closeBtn = document.querySelector('.close');

    // Events
    modalBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', outsideClick);

    // Open
    function openModal() {
        modal.style.display = 'block';
    }

    // Close
    function closeModal() {
        modal.style.display = 'none';
    }

    // Close If Outside Click
    function outsideClick(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    }

</script>
<script>
    $(".close-alert").click(function(e){
        $(this).parent().remove();
        e.preventDefault();
    });

</script>
</html>
