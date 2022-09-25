    
<script type="text/javascript" src="assets/redactor/fontsize.js"></script>
<script type="text/javascript" src="assets/redactor/fontfamily.js"></script>
<script type="text/javascript" src="assets/redactor/fullscreen.js"></script>
<script type="text/javascript" src="assets/redactor/fontcolor.js"></script>

<script type="text/javascript" src="assets/redactor/redactor.min.js"></script>
<link rel="stylesheet" href="assets/redactor/css/redactor.css" />
<script type="text/javascript">
	$(document).ready(
		function()
		{
			$('#redactor_content').redactor({
                                plugins: ['fontsize', 'fontfamily', 'fontcolor'],
                                imageUpload : '<?=site_url()?>fileupdown/image_upload'
			});
		}
	);
</script>


<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Settings
                </div>
            </div>
            <div class="portlet-body form">
                <?=form_open_multipart('news_letter/send', array('class' => 'form-horizontal'))?>
                    <div class="form-body">
                        
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Mail Body</label>
                                <div class="col-md-9">
                                    <textarea name="news_letter"  id="redactor_content" class="form-control"><?=$site->news_letter?></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="submit" value="send" class="btn blue">Send</button>
                                <button type="reset" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>