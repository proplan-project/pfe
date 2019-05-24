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
$color = "#777";
if (isset($_POST['green']))
    $color = "green";
if (isset($_POST['red']))
    $color = "red";
if (isset($_POST['blue']))
    $color = "blue";
if (isset($_POST['orange']))
    $color = "orange";
if (isset($_POST['grey']))
    $color = "#777";
if (isset($_POST['purple']))
    $color = "purple";
if (isset($_POST['azure']))
    $color = "azure";
?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assest/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.proplan.com" class="simple-text">
                    ProPlan
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="#">
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
    </div>

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
                                <li><a href="<?php echo base_url()?>/profil">Voir le Profil</a></li>
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
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="col-sm-12"  >
                    <div class="row">
                        <div class="col-md-8" style="margin-bottom: 20px;">
                            <div class="col-md-2"><img src="assest/img/tim_80x80.png" style="border-radius: 50%; "></div>
                            <div class="col-md-6" style="margin-top: 10px;">
                                <b>Salut bon retour! FatiAlami</b><br>
                                <i>Admin</i><br>
                                dernière connexion il y a 23 heures vieu details
                            </div>
                        </div>
                        <div class="col-md-4" style=" padding:30px">
                            <form class="#" method="post">
                                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
                                <button type="submit" name="azure" style="background-color: #007fff ;border-radius: 50%;border:none;color: #007fff ;height:16px;">.</button>
                                <button type="submit" name="green" style="background-color: green ;border-radius: 50%;border:none;color: green ;height:16px;">.</button>
                                <button type="submit" name="orange" style="background-color: orange ;border-radius: 50%;border:none;color: orange ;height:16px;">.</button>
                                <button type="submit" name="blue" style="background-color: blue ;border-radius: 50%;border:none;color: blue ;height:16px;">.</button>
                                <button type="submit" name="red" style="background-color: red ;border-radius: 50%;border:none;color: red ;height:16px;">.</button>
                                <button type="submit" name="purple" style="background-color: #800080 ;border-radius: 50%;border:none;color: #800080 ;height:16px;">.</button>
                                <button type="submit" name="grey" style="background-color: #777 ;border-radius: 50%;border:none;color: #777 ;height:16px;">.</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12" style="margin-bottom:20px;" >
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card-counter primary">
                                    <i class="fa fa-money "></i>
                                    <span class="count-numbers">1600 $</span>
                                    <span class="count-name">facture</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card-counter danger">
                                    <i class="fa fa-tasks"></i>
                                    <span class="count-numbers">140</span>
                                    <span class="count-name">Taches</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card-counter" style="background-color: #f7973f ;color: #fff ">                               <i class="fa fa-cubes"></i>
                                    <span class="count-numbers">20</span>
                                    <span class="count-name">Projets</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card-counter info">
                                    <i class="fa fa-users"></i>
                                    <span class="count-numbers">35</span>
                                    <span class="count-name">Clients</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Email Statistics</h4>
                                    <p class="category">Last Campaign Performance</p>
                                </div>
                                <div class="content">
                                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Open
                                            <i class="fa fa-circle text-danger"></i> Bounce
                                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                                        </div>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Users Behavior</h4>
                                    <p class="category">24 Hours performance</p>
                                </div>
                                <div class="content">
                                    <div id="chartHours" class="ct-chart"></div>
                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Open
                                            <i class="fa fa-circle text-danger"></i> Click
                                            <i class="fa fa-circle text-warning"></i> Click Second Time
                                        </div>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-history"></i> Updated 3 minutes ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title">2014 Sales</h4>
                                    <p class="category">All products including Taxes</p>
                                </div>
                                <div class="content">
                                    <div id="chartActivity" class="ct-chart"></div>

                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Tesla Model S
                                            <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                        </div>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-check"></i> Data information certified
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title">Tasks</h4>
                                    <p class="category">Backend development</p>
                                </div>
                                <div class="content">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Read "Following makes Medium better"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Unfollow 5 enemies from twitter</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-history"></i> Updated 3 minutes ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; 2019 <a href="http://www.proplan.com">ProPlan</a>, made by EL ALAMI FATIMA ZAHRA & HALA EL YABOURI 2019
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

<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "bienvenue à <b>proplan</b> - c'est le moment de travailler."

        },{
            type: 'info',
            timer: 2000
        });

    });
</script>

</html>
