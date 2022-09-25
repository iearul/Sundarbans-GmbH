<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        All Subscribers
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_6">
                                    <thead>
                                        <tr>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($subscribers as $subscriber):?>
                                            <tr>
                                                <td><?=$subscriber->email?></td>
                                                <td><?php echo ($subscriber->status) ? anchor("news_letter/deactivate/".$subscriber->url, 'Active', array('onclick' => 'if(confirm(\'Are you sure to De-active this Journal.\'))return true; return false;')) : anchor("news_letter/activate/".$subscriber->url, 'De-activated');?></td>
                                                <td><?php echo anchor("news_letter/edit/".$subscriber->url, 'Edit') ;?></td>
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


