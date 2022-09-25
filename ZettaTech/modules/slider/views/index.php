<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        All Sliders
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_6">
                                    <thead>
                                        <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sliders as $slider):?>
                                            <tr>
                                                <td><img src="uploads/sliders/<?=$slider->name?>" style="max-height: 200px;max-width: 800px;"></td>
                                                <td><?=$slider->title1?></td>
                                                <td><?php echo anchor("slider/edit/".$slider->id, 'Edit') ;?> <?php echo anchor("slider/delete/".$slider->id, 'Delete') ;?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>



















<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {       
   TableAdvanced.init();
});
</script>


