<h4>Invest In Art</h4>

<?php echo form_open('','class="form-horizontal well"'); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="invest_intro">Introduction</label>
        <div class='controls'>
            <textarea class="textarea" id="invest_intro" name="invest_intro" style="width: 810px; height: 200px"><?=$messages['invest_intro'];?></textarea>
        </div>           
    </div>
    <div class="control-group">
		<label class="control-label" for="artistimage1">Artist Image 1</label>
        <div class='controls'>
            <input type="hidden" name="artistimage1" id="artistimage1" value="<?=$messages['invest_artist1'];?>">
            <input id="btnImageUpload1" class="btnImageUpload" type="file" name="files[]" <?=$messages['invest_artist1']!=""?'style="display:none"':'';?> >    
            <div id="files1" class="files">
                <?php if($messages['invest_artist1']!=""): ?>
                <img src="http://www.harngallery.com/uploads/invest_in_art/<?=$messages['invest_artist1'];?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>
            </div>
        </div>           
    </div>
	<div class="control-group">
		<label class="control-label" for="invest_desc1">Description</label>
        <div class='controls'>
            <textarea class="textarea" id="invest_desc1" name="invest_desc1" style="width: 810px; height: 200px"><?=$messages['invest_desc1'];?></textarea>
        </div>           
    </div>    
    <div class="control-group">
		<label class="control-label" for="artistimage1">Artist Image 2</label>
        <div class='controls'>
            <input type="hidden" name="artistimage2" id="artistimage2" value="<?=$messages['invest_artist2'];?>">
            <input id="btnImageUpload2" class="btnImageUpload" type="file" name="files[]" <?=$messages['invest_artist2']!=""?'style="display:none"':'';?> >   
            <div id="files1" class="files">
                <?php if($messages['invest_artist2']!=""): ?>
                <img src="http://www.harngallery.com/uploads/invest_in_art/<?=$messages['invest_artist2'];?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>                
            </div>
        </div>           
    </div>
	<div class="control-group">
		<label class="control-label" for="invest_desc2">Description</label>
        <div class='controls'>
            <textarea class="textarea" id="invest_desc2" name="invest_desc2" style="width: 810px; height: 200px"><?=$messages['invest_desc2'];?></textarea>
        </div>           
    </div>   
    <div class="form-actions">  
        <button name="save"  class="btnHarn" type="submit">Save</button>
    </div>        
</fieldset>          
<?php echo form_close(); ?>          