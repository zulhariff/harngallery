<h4>Banner</h4>

<?php echo form_open('','class="form-horizontal" id="artistUploadForm"'); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="banner1">Banner 1</label>
        <div class='controls'>
            <input type="hidden" name="banner1" id="banner1" value="<?=$messages['image1'];?>">
            <input id="btnImageUpload1" class="btnImageUpload"  type="file" name="files[]" <?=$messages['image1']!=""?'style="display:none"':'';?> >    
            <div id="files" class="files">
                <?php if($messages['image1']!=""): ?>
                <img src="http://www.harngallery.com/uploads/banner/<?=$messages['image1'];?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>                   
            </div>
        </div>           
    </div>  
    <div class="control-group">
		<label class="control-label" for="txtLink1">Link 1</label>
        <div class='controls'>            
            <input id='txtLink1' type='text' name='txtLink1' value="<?=$messages['link1'];?>" style="width:300px" />
        </div>           
    </div>   
	<div class="control-group">
		<label class="control-label" for="banner2">Banner 2</label>
        <div class='controls'>
            <input type="hidden" name="banner2" id="banner2" value="<?=$messages['image2'];?>">
            <input id="btnImageUpload1" class="btnImageUpload" type="file" name="files[]" <?=$messages['image2']!=""?'style="display:none"':'';?>>    
            <div id="files" class="files">
                <?php if($messages['image2']!=""): ?>
                <img src="http://www.harngallery.com/uploads/banner/<?=$messages['image2'];?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>                    
            </div>
        </div>           
    </div>  
    <div class="control-group">
		<label class="control-label" for="txtLink2">Link 1</label>
        <div class='controls'>            
            <input id='txtLink12' type='text' name='txtLink2' value="<?=$messages['link2'];?>" style="width:300px" />
        </div>           
    </div>   
    <div class="control-group"> 
        <div class='controls'> 
            <button name="save"  class="btnHarn" type="submit">Save</button>
        </div>
    </div>        
</fieldset>          
<?php echo form_close(); ?>  