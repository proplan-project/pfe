<div class="sidebar-wrapper">
    <div class="logo">
        <a href="http://www.proplan.com" class="simple-text">
            ProPlan
        </a>
    </div>

    <ul class="nav">

        <li class="active">
            <a href="<?php echo base_url();?>Private_area">
                <i class="pe-7s-graph"></i>
                <p>Accueil</p>
            </a>
        </li>
        <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
        <li>
            <a href="<?php echo base_url();?>client">
                <i class="pe-7s-note2"></i>
                <p>Clients</p>
            </a>
        </li>
        <?php }?>
        <li>
            <a href="<?php echo base_url();?>projet">
                <i class="pe-7s-news-paper"></i>
                <p>Projets</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>tache">
                <i class="pe-7s-science"></i>
                <p>Taches</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>facture">
                <i class="pe-7s-cash"></i>
                <p>Factures</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>note">
                <i class="pe-7s-note2"></i>
                <p>Notes</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>utilisateur">
                <i class="pe-7s-chat"></i>
                <p>Utilisateurs</p>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>gantt">
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
            <a href="<?php echo base_url();?>equipe">
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
                            <li><a href="#"><b><?php echo $nom['nom']." ".$nom['prenom'];?></b><i>&nbspadmin</i></a></li>
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