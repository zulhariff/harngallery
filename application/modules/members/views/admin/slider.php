<h4>Slider</h4>
<?php echo form_open('','class="form-horizontal" id="artistUploadForm"'); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="image1">Image 1</label>
        <div class='controls'>
            <input type="hidden" name="image1" id="image1" value="<?=$messages['image1'];?>">
            <input id="btnImageUpload1" class="btnImageUpload" type="file" name="files[]" <?=$messages['image1']!=""?'style="display:none"':'';?>>    
            <div id="files" class="files">
                <?php if($messages['image1']!=""): ?>
                <img src="http://www.harngallery.com/uploads/slider/<?=$messages['image1'];?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>     
            </div>
        </div>           
    </div>  
    <div class="control-group">
		<label class="control-label" for="txtText1">Text 1</label>
        <div class='controls'>            
            <input id='txtText1' type='text' name='txtText1' value="<?=$messages['desc1'];?>"  style="width:300px" />
        </div>           
    </div>   
    <div class="control-group">
		<label class="control-label" for="txtLink1">Link 1</label>
        <div class='controls'>            
            <input id='txtLink1' type='text' name='txtLink1' value="<?=$messages['link1'];?>"   style="width:300px"  />
        </div>           
    </div>   
	<div class="control-group">
		<label class="control-label" for="image2">Image 2</label>
        <div class='controls'>
            <input type="hidden" name="image2" id="image2" value="<?=$messages['image2'];?>">
            <input id="btnImageUpload2" class="btnImageUpload"  type="file" name="files[]" <?=$messages['image2']!=""?'style="display:none"':'';?>>    
            <div id="files" class="files">
                <?php if($messages['image2']!=""): ?>
                <img src="http://www.harngallery.com/uploads/slider/<?=$messages['image2'];?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>                
            </div>
        </div>           
    </div>  
    <div class="control-group">
		<label class="control-label" for="txtText2">Text 2</label>
        <div class='controls'>            
            <input id='txtText2' type='text' name='txtText2' value="<?=$messages['desc2'];?>"   style="width:300px"  />
        </div>           
    </div>   
    <div class="control-group">
		<label class="control-label" for="txtLink2">Link 2</label>
        <div class='controls'>            
            <input id='txtLink2' type='text' name='txtLink2'  value="<?=$messages['link2'];?>"   style="width:300px" />
        </div>           
    </div>   
	<div class="control-group">
		<label class="control-label" for="image3">Image 3</label>
        <div class='controls'>
            <input type="hidden" name="image3" id="image3" value="<?=$messages['image3'];?>">
            <input id="btnImageUpload3" class="btnImageUpload"  type="file" name="files[]" <?=$messages['image3']!=""?'style="display:none"':'';?>>    
            <div id="files" class="files">
                <?php if($messages['image3']!=""): ?>
                <img src="http://www.harngallery.com/uploads/slider/<?=$messages['image3'];?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>     
            </div>
        </div>           
    </div>  
    <div class="control-group">
		<label class="control-label" for="txtText3">Text 3</label>
        <div class='controls'>            
            <input id='txtText3' type='text' name='txtText3'  value="<?=$messages['desc3'];?>"   style="width:300px" />
        </div>           
    </div>   
    <div class="control-group">
		<label class="control-label" for="txtLink3">Link 3</label>
        <div class='controls'>            
            <input id='txtLink3' type='text' name='txtLink3' value="<?=$messages['link3'];?>"   style="width:300px"  />
        </div>           
    </div>                   
    <div class="control-group"> 
        <div class='controls'>  
        <button name="save"  class="btnHarn" type="submit">Save</button>
        </div>
    </div>        
</fieldset>          
<?php echo form_close(); ?>    
