<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.ico">
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


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['gantt']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Task ID');
            data.addColumn('string', 'Task Name');
            data.addColumn('string', 'Resource');
            data.addColumn('date', 'Start Date');
            data.addColumn('date', 'End Date');
            data.addColumn('number', 'Duration');
            data.addColumn('number', 'Percent Complete');
            data.addColumn('string', 'Dependencies');

            data.addRows([
                <?php
                if($fetch_data->num_rows() > 0)
                {
                foreach($fetch_data->result() as $row)
                {

                $org1 = $row->date_debut;
                $org2 = $row->date_limite;
                $date1 = str_replace('-', ',', $org1);
                $date2 = str_replace('-', ',', $org2);
                $newDate1 = date("Y-m-d", strtotime($date1));
                $newDate2 = date("Y-m-d", strtotime($date2));

                ?>
                ['<?php echo $row->id_tache; ?>', '<?php echo $row->titre; ?>', '<?php echo $row->titre_projet; ?>',
                    new Date(<?php echo $date1; ?>), new Date(<?php echo $date2; ?>), null, <?php echo $row->percent_complete; ?>, null],
                <?php
                }
                }
                ?>
            ]);

            var options = {
                height: 400,
                gantt: {
                    trackHeight: 30,
                    criticalPathEnabled: false, // Critical path arrows will be the same as other arrows.
                    arrow: {
                        angle: 100,
                        width: 5,
                        color: 'green',
                        radius: 0
                    }
                }
            };

            var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>

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
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" id="add_button" data-toggle="modal" data-target="#tacheModal" class="btn" style="background-color: #fff;border: 1px solid #888;color: #000">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter Un tache
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<div id="tacheModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="tache_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un tache</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="titre" id="titre" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date_debut</label>
                        <input type="date" name="date_debut" id="date_debut" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Date limite</label>
                        <input type="date" name="date_limite" id="date_limite" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="à faire">à faire</option>
                            <option value="en cours">en cours</option>
                            <option value="terminé">terminé</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pourcentage</label>
                        <input type="range" minlength="0" maxlength="100" step="10" name="percent_complete" id="percent_complete" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Projet</label>
                        <select name="id_projet">
                            <option value="">selectionner un projet</option>
                            <?php
                            foreach($all_projet as $projet)
                            {
                                $selected = ($projet['id_projet'] == $this->input->post('id_projet')) ? ' selected="selected"' : "";

                                echo '<option value="'.$projet['id_projet'].'" '.$selected.'>'.$projet['titre_projet'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_tache" id="id_tache" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        var tacheTable = $('#tache_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>tache/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id_tache+"' style='border:none;'><span class='glyphicon glyphicon-pencil' style='color: #000000'/></button>" + "&nbsp;" +
                        "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id_tache+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                },
                "titre_projet":function(column, row)
                {
                    return "<a href=\"<?php echo base_url()?>projet/detail/" +row.id_projet+ "\">" + row.titre_projet + "</a>";
                },
                "pourcentage":function(column, row)
                {
                    return "<progress class=\"progress\" value='"+row.percent_complete+"' max=\"100\" data-row-id='"+row.id_tache+"'></progress>";
                }
            }
        });

        $('#add_button').click(function(){
            $('#tache_form')[0].reset();
            $('.modal-title').text("Add tache");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        $(document).on('submit', '#tache_form', function(event){
            event.preventDefault();
            var titre = $('#titre').val();
            var description = $('#description').val();
            var date_debut = $('#date_debut').val();
            var date_limite = $('#date_limite').val();
            var status = $('#status').val();
            var percent_complete = $('#percent_complete').val();
            var id_projet = $('#id_projet').val();
            var form_data = $(this).serialize();
            if(	titre != '' && description != '' && date_debut != '' && date_limite != '' && status != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>tache/action",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        alert(data);
                        $('#tache_form')[0].reset();
                        $('#tacheModal').modal('hide');
                        $('#tache_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                alert("Field is Required");
            }
        });
    });
</script>

