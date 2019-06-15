<?php require 'includes/head.php'; ?>
<div class="wrapper">
    <div class="sidebar"data-color="<?php echo $color ;?>" data-image="assets/img/sidebar-5.jpg">

        <?php require 'includes/nav.php'; ?>

        <div class="content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="contact_data" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th data-column-id="nom">Nom</th>
                                <th data-column-id="email">Email</th>
                                <th data-column-id="message">Message</th>
                                <th data-column-id="action" data-formatter="action" data-sortable="false">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var contactTable = $('#contact_data').bootgrid({
            ajax:true,
            rowSelect: true,
            post:function()
            {
                return{
                    id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
                }
            },
            url:"<?php echo base_url(); ?>contact/fetch_data",
            formatters:{
                "action":function(column, row)
                {
                    return "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id+"' style='border:none;'><span class='glyphicon glyphicon-remove' style='color:#000'/></button>";
                }
            }
        });

        $(document).on("loaded.rs.jquery.bootgrid", function(){
            contactTable.find('.delete').on('click', function(event){
                if(confirm("Are you sure you want to delete this?"))
                {
                    var id = $(this).data('row-id');
                    $.ajax({
                        url:"<?php echo base_url(); ?>contact/delete_data",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            alert(data);
                            $('#contact_data').bootgrid('reload');
                        }
                    });
                }
                else
                {
                    return false;
                }
            });
        });
    });
</script>