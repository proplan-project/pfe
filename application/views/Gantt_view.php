<html>
<head>
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
                ['<?php echo $row->id_tache; ?>', '<?php echo $row->titre; ?>', null,
                    new Date(<?php echo $date1; ?>), new Date(<?php echo $date2; ?>), null, null, null],
           <?php
            }
            }
            ?>
            ]);

            var options = {
                height: 400,
                gantt: {
                    trackHeight: 30
                }
            };

            var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="chart_div"></div>
</body>
</html>