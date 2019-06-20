<div class="sidebar-wrapper">
    <div class="logo">
        <img src="<?php echo base_url(); ?>assets/images/logo_proplan.png" alt="Myself">
        </a>
    </div>


    <ul class="nav">

        <li class="active">
            <a href="<?php echo base_url();?>private_area_admin">
                <i class="pe-7s-graph"></i>
                <p>Accueil</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>chef_projet">
                <i class="pe-7s-note2"></i>
                <p>Les Chefs des projets</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>contact">
                <i class="pe-7s-news-paper"></i>
                <p>Contact</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>administration">
                <i class="pe-7s-users"></i>
                <p>L'administration</p>
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
                <div>
                    <img src="<?php echo base_url(); ?>assets/images/logo_home.png" alt="Myself" style="margin-top: 8px"><h3 style="margin-left: 70px ;margin-top: -43px">Créer une harmonie de travail</h3>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="pe-7s-user" style="font-size: 25px"></i>
                            <span style="opacity:0 ;">5</span>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><b><?php echo $nom['nom']." ".$nom['prenom'];?></b><i>&nbspadmin</i></a></li>
                            <li><a href="<?php echo base_url()?>/profil">Voir le Profil</a></li>
                            <li><?php echo '<a href="'.base_url().'private_area_admin/logout">Deconnecter</a>'; ?></li>
                        </ul>
                    </li>
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="pe-7s-mail" style="font-size: 25px"></i>
                            <span class="notification">5</span>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Message De
                                <?php echo $nom['nom']." ".$nom['prenom'];?>
                                </a></li>
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