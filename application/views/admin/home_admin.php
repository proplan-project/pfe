<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="col-sm-12"  >
                    <div class="row">
                        <div class="col-md-8" style="margin-bottom: 20px;">
                            <div class="col-md-2"><img src="assets/img/tim_80x80.png" style="border-radius: 50%; "></div>
                            <div class="col-md-6" style="margin-top: 10px;">
                                <b>Salut bon retour! <?php echo $nom['nom']." ".$nom['prenom'];?></b><br>
                                Bonne chance dans votre travail.
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








        </div>
    </div>
</div>
</body>

<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/js/jquery-1.10.2.js" type="text/javascript"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "bienvenue à <b>proplan</b> - c'est le moment de travailler."

        },{
            type: 'info',
            timer: 4000
        });

    });
</script>
</html>
