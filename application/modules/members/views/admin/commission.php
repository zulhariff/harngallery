<h4>Commission</h4>

<?php echo form_open('','class="form-horizontal" id="artistUploadForm"'); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="commission_intro">Intro</label>
        <div class='controls'>
            <textarea class="textarea" id="commission_intro" name="commission_intro" style="width: 810px; height: 200px"><?=$messages['commission_intro'];?></textarea>
        </div>           
    </div>

	<div class="control-group">
		<label class="control-label" for="commission_desc">Description</label>
        <div class='controls'>
            <textarea class="textarea" id="commission_desc" name="commission_desc" style="width: 810px; height: 200px"><?=$messages['commission_desc'];?></textarea>
        </div>           
    </div>    
    <div class="control-group">
        <div class='controls'>
            <button name="save"  class="btnHarn" type="submit">Save</button>
        </div>
    </div>        
</fieldset>          
<?php echo form_close(); ?>          