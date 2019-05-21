<html>
<head>
    <title>How to Export Mysql Data to CSV File in Codeigniter</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container box">
    <form method="post" action="<?php echo base_url(); ?>export_csv/export">
        <div class="col-md-6" align="right">
            <input type="submit" name="export" class="btn btn-success btn-xs" value="Export to CSV" />
        </div>
    </form>
</div>
</body>
</html>
