<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="clearfix">
                                <?php foreach ($facture as $f){ ?>
                                <div class="pull-left">
                                    <h3 class="logo">PROPLAN</h3>
                                </div>
                                <div class="pull-right">
                                    <h5>Invoice <?php echo $f['Numero']; ?> <br>
                                        <small><?php echo $f['date_facture']; ?></small>
                                    </h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="pull-xs-left m-t-30">
                                        <address>
                                            <strong>
                                                <?php echo $f['nom_entreprise']; ?><br/>
                                                <?php echo $f['adresse']; ?>
                                            </strong><br>
                                            Tel: <?php echo $f['telephone']; ?>
                                        </address>
                                    </div>
                                    <div class="pull-xs-right m-t-30">
                                        <p><strong>Date: </strong> <?php echo $f['date_echeance']; ?></p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="m-h-50"></div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead class="bg-faded">
                                            <tr>
                                                <th>Projet</th>
                                                <th>Description</th>
                                                <th>Prix</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $f['titre_projet']; ?></td>
                                                <td><?php echo $f['description']; ?></td>
                                                <td><?php echo $f['montant']; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="clearfix m-t-30">
                                        <h5 class="small text-inverse font-600"><b>CONDITIONS ET POLITIQUES DE PAIEMENT</b></h5>

                                        <small>
                                            Tous les comptes doivent être réglés dans les 7 jours suivant la réception de la facture.
                                            Pour être payé par chèque ou carte de crédit ou paiement direct en ligne.
                                            Si le compte n’est pas réglé dans les 7 jours, le montant indiqué ci-dessus sera facturé
                                            aux détails des crédits fournis à titre de confirmation des travaux.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-3">
                                    <p class="text-xs-right"><b>total:</b> <td><?php echo $f['montant']; ?></td></p>
                                    <p class="text-xs-right">TVA: 20%</p>
                                    <hr>
                                    <h3 class="text-xs-right"><?php echo $f['montant']-(($f['montant']*20)/100); ?> DH</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-xs-right">
                                    <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i
                                            class="fa fa-print"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</body>