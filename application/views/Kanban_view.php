<html>
<head>
    <title>Kanban</title>
    <style>
        #div1, #div2, #div3 {
            float: left;
            width: 100px;
            height: 300px;
            margin: 50px;
            padding: 10px;
            border: 1px solid black;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
</head>
<body>
<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
    <h3 align="center">à faire</h3>
    <?php
    foreach($taches_afaire->result() as $row) {
        ?>
        <div draggable="true" ondragstart="drag(event)" id="<?php echo $row->id_tache ?>" id="<?php echo $row->id_tache ?>" >
            <?php echo $row->titre; ?>
        </div>
        <?php
    }
    ?>
</div>

<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
    <h3 align="center">en cours</h3>
    <?php
    foreach($taches_encours->result() as $row) {
        ?>
        <div draggable="true" ondragstart="drag(event)" id="<?php echo $row->id_tache ?>">
            <?php echo $row->titre; ?>
        </div>
        <?php
    }
    ?>

</div>

<div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
    <h3 align="center">terminé</h3>
    <?php
    foreach($taches_termine->result() as $row) {
        ?>
        <div draggable="true" ondragstart="drag(event)" id="<?php echo $row->id_tache ?>">
            <?php echo $row->titre; ?>
        </div>
        <?php
    }
    ?>
</div>
<script>
    $(document).ready(function(){
        $("div2").drop(function(){

        });
    });
</script>
</body>
</html>