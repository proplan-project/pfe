<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>ProPlan </title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assest/plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="assest/plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="assest/plugins/themify-icons/themify-icons.css">

    <!-- Main Stylesheet -->
    <link href="assest/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="assest/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assest/images/favicon.ico" type="image/x-icon">

</head>

<body>


<header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand font-tertiary h3" href="index.html"><img src="assest/images/logo.png" alt="Myself"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>login">S'identifier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>register">S'inscrire</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- hero area -->
<section class="hero-area bg-primary" id="parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 mx-auto">
                <h1 class="text-white font-tertiary">Créer <br> une harmonie <br> de travail</h1>
            </div>
        </div>
    </div>
    <div class="layer-bg w-100">
        <img class="img-fluid w-100" src="assest/images/illustrations/leaf-bg.png" alt="bg-shape">
    </div>
    <div class="layer" id="l2">
        <img src="assest/images/illustrations/dots-cyan.png" alt="bg-shape">
    </div>
    <div class="layer" id="l3">
        <img src="assest/images/illustrations/leaf-orange.png" alt="bg-shape">
    </div>
    <div class="layer" id="l4">
        <img src="assest/images/illustrations/dots-orange.png" alt="bg-shape">
    </div>
    <div class="layer" id="l5">
        <img src="assest/images/illustrations/leaf-yellow.png" alt="bg-shape">
    </div>
    <div class="layer" id="l6">
        <img src="assest/images/illustrations/leaf-cyan.png" alt="bg-shape">
    </div>
    <div class="layer" id="l7">
        <img src="assest/images/illustrations/dots-group-orange.png" alt="bg-shape">
    </div>
    <div class="layer" id="l8">
        <img src="assest/images/illustrations/leaf-pink-round.png" alt="bg-shape">
    </div>
    <div class="layer" id="l9">
        <img src="assest/images/illustrations/leaf-cyan-2.png" alt="bg-shape">
    </div>
    <!-- social icon -->
    <ul class="list-unstyled ml-5 mt-3 position-relative zindex-1">
        <li class="mb-3"><a class="text-white" href="#"><i class="ti-facebook"></i></a></li>
        <li class="mb-3"><a class="text-white" href="#"><i class="ti-instagram"></i></a></li>
        <li class="mb-3"><a class="text-white" href="#"><i class="ti-dribbble"></i></a></li>
        <li class="mb-3"><a class="text-white" href="#"><i class="ti-twitter"></i></a></li>
    </ul>
    <!-- /social icon -->
</section>
<!-- /hero area -->

<!-- about -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <p class="font-secondary paragraph-lg text-dark">ProPlan aide votre équipe à mieux travailler en mettant tout le monde sur la même page.
                    Planification, ordonnancement, gestion des tâches et suivi du temps intégrés de manière transparente.</p>
                <a href="login.html" class="btn btn-transparent">Commence avec nous</a>
            </div>
        </div>
    </div>
</section>
<!-- /about -->

<!-- skills -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Générer de meilleurs plans</h2>
            </div>
            <div class="col-lg-10 mx-auto text-center">
                <p class="font-secondary paragraph-lg text-dark">Utilisez des outils avancés de gestion des tâches,
                    des diagrammes de Gantt ou des tableaux Kanban pour créer des plans et des calendriers précis,
                    afin que chaque membre de votre équipe sache exactement quoi faire et quand.</p>
            </div>
            <div class="col-lg-12 text-center">
                <div class="card shadow text-center">
                    <div class="card-footer bg-white">
                        <img src="assest/images/02.png" alt="bg-shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /skills -->

<!-- experience -->
<section class="section">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Qualités</h2>
            </div>
            <div class="col-lg-3 col-md-4 text-center">
                <img src="assest/images/experience/icon-1.png" alt="icon">
                <h4>Améliorer la communication</h4>
                <p class="mb-0">les commentaires sur les tâches permettent à votre équipe de communiquer.</p>
            </div>
            <div class="col-lg-3 col-md-4 text-center">
                <img src="assest/images/experience/icon-2.png" alt="icon">
                <h4>Fin du jeu <br> de la faute</h4>
                <p class="mb-0">Chaque membre de l'équipe a suivi avec précision leur travail et l'avancement des tâches.</p>
            </div>
            <div class="col-lg-3 col-md-4 text-center">
                <img src="assest/images/experience/icon-3.png" alt="icon">
                <h4>Tenir la direction informée</h4>
                <p class="mb-0">En vous donnant la possibilité de générer des rapports de temps et de travail personnalisables.</p>
            </div>
        </div>
    </div>
</section>
<!-- ./experience -->

<!-- education -->
<section class="section position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Gérer les projets du début à la fin</h2>
            </div>
            <div class="col-lg-6 col-md-6 mb-80">
                <div>
                    <img src="assest/images/01.png" alt="bg-shape">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-80">
                <div class="d-flex">
                    <p class="font-secondary paragraph-lg text-dark">ProPlan offre les outils nécessaires à un chef de projet pour effectuer son travail
                        dans les délais impartis et dans les limites du budget, sans avoir à utiliser et à payer plusieurs applications.</p>
                </div>
                <div class="d-flex">
                    <p class="font-secondary paragraph-lg text-dark">ProPlan permet la création des factures basées sur un plan de projet et partagez-les avec le client pour approbation.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-80">
            </div>
        </div>
    </div>
    <!-- bg image -->
    <img class="img-fluid edu-bg-image w-100" src="assest/images/backgrounds/education-bg.png" alt="bg-image">
</section>
<!-- /education -->

<!-- Equipe -->
<section class="section bg-cover" data-background="assest/images/backgrounds/team-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">L'équipe</h2>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 mb-md-0" style="margin-left:120px;">
                <div class="card text-center">
                    <img src="assest/images/team/member-1.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Hala El Yabouri</h4>
                        <p class="text-light font-secondary">Project Manager</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 mb-md-0" style="margin-left: 120px">
                <div class="card text-center">
                    <img src="assest/images/team/member-2.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Fatima Zahra El Alami</h4>
                        <p class="text-light font-secondary">Project Manager</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- /Equipe -->

<!-- testimonial -->
<section class="section bg-primary position-relative testimonial-bg-shapes">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-white mb-5">Témoignage</h2>
            </div>
            <div class="col-lg-10 mx-auto testimonial-slider">
                <!-- slider-item -->
                <div class="text-center testimonial-content">
                    <i class="ti-quote-right text-white icon mb-4 d-inline-block"></i>
                    <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <strong>quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat.</strong> Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <img class="img-fluid rounded-circle mb-4 d-inline-block" src="assest/images/testimonial/client-1.png"
                         alt="client-image">
                    <h4 class="text-white">Omar Mbirek</h4>
                    <h6 class="text-light mb-4">DESIGNER & PROGRAMMER</h6>
                </div>
                <!-- slider-item -->
                <div class="text-center testimonial-content">
                    <i class="ti-quote-right text-white icon mb-4 d-inline-block"></i>
                    <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <strong>quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</strong> Duis aute irure dolor in reprehenderit in
                        voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur.</p>
                    <img class="img-fluid rounded-circle mb-4 d-inline-block" src="assest/images/testimonial/client-1.png"
                         alt="client-image">
                    <h4 class="text-white">Jesica Gomez</h4>
                    <h6 class="text-light mb-4">CEO, Funder</h6>
                </div>
                <!-- slider-item -->
                <div class="text-center testimonial-content">
                    <i class="ti-quote-right text-white icon mb-4 d-inline-block"></i>
                    <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <strong>quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</strong> Duis aute irure dolor in reprehenderit in
                        voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur.</p>
                    <img class="img-fluid rounded-circle mb-4 d-inline-block" src="assest/images/testimonial/client-1.png"
                         alt="client-image">
                    <h4 class="text-white">Jesica Gomez</h4>
                    <h6 class="text-light mb-4">CEO, Funder</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- bg shapes -->
    <img src="assest/images/backgrounds/map.png" alt="map" class="img-fluid bg-map">
    <img src="assest/images/illustrations/dots-group-v.png" alt="bg-shape" class="img-fluid bg-shape-1">
    <img src="assest/images/illustrations/leaf-orange.png" alt="bg-shape" class="img-fluid bg-shape-2">
    <img src="assest/images/illustrations/dots-group-sm.png" alt="bg-shape" class="img-fluid bg-shape-3">
    <img src="assest/images/illustrations/leaf-pink-round.png" alt="bg-shape" class="img-fluid bg-shape-4">
    <img src="assest/images/illustrations/leaf-cyan.png" alt="bg-shape" class="img-fluid bg-shape-5">
</section>
<!-- /testimonial -->

<!-- contact -->
<section class="section section-on-footer" data-background="images/backgrounds/bg-dots.png">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Informations de contact</h2>
            </div>
            <div class="col-lg-8 mx-auto">
                <div class="bg-white rounded text-center p-5 shadow-down">
                    <h4 class="mb-80">Formulaire de contact</h4>
                    <form action="#" class="row">
                        <div class="col-md-6">
                            <input type="text" id="name" name="Nom" placeholder="Nom" class="form-control px-0 mb-4">
                        </div>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control px-0 mb-4">
                        </div>
                        <div class="col-12">
              <textarea name="message" id="message" class="form-control px-0 mb-4"
                        placeholder="Tapez le message ici"></textarea>
                        </div>
                        <div class="col-lg-6 col-10 mx-auto">
                            <button class="btn btn-primary w-100">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /contact -->

<!-- footer -->
<footer class="bg-dark footer-section">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-light">Email</h5>
                    <p class="text-white paragraph-lg font-secondary">contact@proplan.com</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-light">Tel</h5>
                    <p class="text-white paragraph-lg font-secondary">+212 2544 658 256</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-light">Addresse</h5>
                    <p class="text-white paragraph-lg font-secondary">Tétouan, Maroc</p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top text-center border-dark py-5">
        <p class="mb-0 text-light">Copyright ©<script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
            </script> Développer par Fatima Zahra El Alami & Hala El Yabouri</p>
    </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="assest/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="assest/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="assest/plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="assest/plugins/shuffle/shuffle.min.js"></script>

<!-- Main Script -->
<script src="assest/js/script.js"></script>

</body>
</html>