<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        All Products
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_6">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product):?>
                                            <tr>
                                                <td><?=$product->name?></td>
                                                <td><?=$categories[$product->category_url]->title?></td>
                                                <td><?php echo ($product->featured) ? anchor("products/un_featured/".$product->url, 'Featured', array('onclick' => 'if(confirm(\'Are you sure to Un-Featured this Product.\'))return true; return false;')) : anchor("products/featured/".$product->url, 'Un-Featured');?></td>
                                                <td><?php echo ($product->status) ? anchor("products/deactivate/".$product->url, 'Active', array('onclick' => 'if(confirm(\'Are you sure to De-active this Product.\'))return true; return false;')) : anchor("products/activate/".$product->url, 'De-activated');?></td>
                                                <td><?php echo anchor("products/details/".$product->url, 'Preview',array('target' => '_blank')) ;?> | <?php echo anchor("products/edit/".$product->url, 'Edit') ;?> | <?php echo anchor("products/delete/".$product->url, 'Delete') ;?></td>
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


