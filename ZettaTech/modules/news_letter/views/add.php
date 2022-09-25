
<div class="row">    
        <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        Add Subscriber
                                </div>
                        </div>
                        <div class="portlet-body form">
                                <?=form_open_multipart("news_letter/add", array('class' => 'form-horizontal'))?>
                                        <div class="form-body">
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">Email</label>
                                                        <div class="col-md-9">
                                                                <?php echo form_input($email);?>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">Status</label>
                                                        <div class="col-md-9">
                                                                <?=form_dropdown($status_name, $status_value, $status_selected, $dropdown_class)?>
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


