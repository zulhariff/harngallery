
<h4>Curator</h4>

<?php echo form_open('','class="form-horizontal well"'); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="curator_review">Review</label>
        <div class='controls'>
            <textarea class="textarea" id="curator_review" name="curator_review" style="width: 810px; height: 200px"><?=$curator?$curator->review:'';?></textarea>
        </div>           
    </div>
    <div class="control-group">
		<label class="control-label" style="vertical-align:top;padding:0">Image</label>
        <div class='controls'>
            <input type="hidden" name="curatorImage" id="curatorImage" value="<?=$curator?$curator->photo:'';?>">
            <input id="btnImageUpload1" class="btnImageUpload" type="file" name="files[]" <?=($curator && trim($curator->photo)!="")?'style="display:none"':'';?>>    
            <div id="files1" class="files">
                <?php if($curator && trim($curator->photo)!=""): ?>
                <img src="http://www.harngallery.com/uploads/curator/<?=$curator->photo;?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>
            </div>
        </div>           
    </div>
    <div class="control-group">
        <label class="control-label" style="vertical-align:top;padding:0">On/Off Flag</label>
        <div class='controls'>
            <input type="checkbox" name="on_flag" id="on_flag" value="1" <?=$curator?$curator->on_flag?'checked':'':'';?>
        </div>
    </div>
    <div class="form-actions">  
        <button name="save"  class="btn btn-inverse pull-left" type="submit">Save</button>
    </div>        
</fieldset>          
<?php echo form_close(); ?>          