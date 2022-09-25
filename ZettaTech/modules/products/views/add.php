<script type="text/javascript">
    $(document).ready(function(){
        $("#add_attributes").click(function(){
            $( '<div class="form-group"><label class="col-md-offset-2 col-md-1 control-label">Title</label><div class="col-md-4"><input type="text" name="attributes_title[]" class="form-control"></div><label class="col-md-1 control-label">Value</label><div class="col-md-4"><input type="text" name="attributes_value[]" class="form-control"></div></div>' ).appendTo("#all_attributes");
        });
    });
        
</script>
<script type="text/javascript">
	$(document).ready(function(){
            $("#add_attached_file").click(function(){
                $('<div class="form-group"><div class="col-md-offset-3 col-md-5"><input type="file" name="attached[]"></div></div>').appendTo("#attached");
            });
        });
        
</script>

<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

    <div class="row">    
        <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        Add New Product
                                </div>
                        </div>
                        <div class="portlet-body form">
                                <?=form_open_multipart("products/add", array('class' => 'form-horizontal'))?>
                                        <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Title</label>
                                                    <div class="col-md-9">
                                                            <?php echo form_input($name);?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Sub Title</label>
                                                    <div class="col-md-9">
                                                            <?php echo form_input($subtitle);?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Category Type</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="category">
                                                            <?php foreach($categories as $category){ ?>
                                                            <option value="<?=$category->url?>"><?=$category->title?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">Featured</label>
                                                        <div class="col-md-9">
                                                                <?=form_dropdown($featured_name, $featured_value, $featured_selected, $dropdown_class)?>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">Status</label>
                                                        <div class="col-md-9">
                                                                <?=form_dropdown($status_name, $status_value, $status_selected, $dropdown_class)?>
                                                        </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">Add Product Image</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                                <img src="" alt=""/>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">

                                                            </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                <span class="fileinput-new">
                                                                Select image </span>
                                                                <span class="fileinput-exists">
                                                                Change </span>
                                                                <input type="file" name="product">
                                                                </span>
                                                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">
                                                                NOTE! 
                                                            </span>
                                                             &nbsp; Please Upload JPG or PNG files only. Maximum file size is 2MB or 2048KB.
                                                        </div>
                                                    </div>                            
                                                </div>
                                                <div id="attached"  class="attach cat">
                                                    <div class="form-group">
                                                            <label class="col-md-3 control-label">Add Extra Image</label>
                                                            <div class="col-md-9">
                                                                <button id="add_attached_file" type="button" class="btn green">Add New</button>
                                                            </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-offset-3 col-md-5">
                                                                            <input type="file" name="attached[]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">Attributes</label>
                                                </div>
                                                <div id="all_attributes">
                                                    <div class="form-group">
                                                        <label class="col-md-offset-2 col-md-1 control-label">Title</label>
                                                        <div class="col-md-4">
                                                            <input type="text" name="attributes_title[]" class="form-control">
                                                        </div>
                                                        <label class="col-md-1 control-label">Value</label>
                                                        <div class="col-md-4">
                                                            <input type="text" name="attributes_value[]" class="form-control">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-6">
                                                        <button id="add_attributes" type="button" class="btn btn-block green">Add Attributes</button>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-actions">
                                                <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <button type="reset" class="btn default">Reset</button>
                                                        </div>
                                                </div>
                                        </div>
                                <?php echo form_close();?>
                        </div>
                </div>
        </div>
</div>


