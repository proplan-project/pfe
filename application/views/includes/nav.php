<div class="sidebar-wrapper">
    <div class="logo">
        <img src="<?php echo base_url(); ?>assets/images/logo_proplan.png" alt="Proplan">
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
        <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
        <li>
            <a href="<?php echo base_url();?>facture">
                <i class="pe-7s-cash"></i>
                <p>Factures</p>
            </a>
        </li>
        <?php }?>
        <li>
            <a href="<?php echo base_url();?>note">
                <i class="pe-7s-note2"></i>
                <p>Notes</p>
            </a>
        </li>
        <?php if($this->session->userdata['info']['db'] == 'chef_projet'){ ?>
        <li>
            <a href="<?php echo base_url();?>utilisateur">
                <i class="pe-7s-chat"></i>
                <p>Utilisateurs</p>
            </a>
        </li>
        <?php }?>
        <li>
            <a href="<?php echo base_url();?>gantt">
                <i class="pe-7s-graph3"></i>
                <p>Rapports de temps</p>
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
    <nav class="navbar navbar-default navbar-fixed" style="padding: 2px">
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
                            <li><a href="#"><b><?php echo $nom['nom']." ".$nom['prenom'];?></b><i>&nbsp<?php if($this->session->userdata['info']['db'] == 'chef_projet'){echo "Chef de projet";}else {echo $nom['type'];} ?></b></i></a></li>
                            <li><a href="<?php echo base_url()?>profil">Voir le Profil</a></li>
                            <li><?php echo '<a href="'.base_url().'private_area/logout">Deconnecter</a>'; ?></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </nav>