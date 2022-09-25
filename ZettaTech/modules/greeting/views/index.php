
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Greeting
                </div>
            </div>
            <div class="portlet-body form">
                <?=form_open_multipart('greeting', array('class' => 'form-horizontal'))?>
                    <div class="form-body">
                        
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Greeting</label>
                                <div class="col-md-5">
                                    <textarea name="greeting"class="form-control"><?=$site->greeting?></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                <button type="reset" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>