
<h4>Invest In Art</h4>

<?php echo form_open('','class="form-horizontal well"'); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="invest_intro">Introduction</label>
        <div class='controls'>
            <textarea class="textarea" id="invest_intro" name="invest_intro" style="width: 810px; height: 200px"><?=$intro;?></textarea>
        </div>           
    </div>
    <?php if($list) { ?>
    <?php foreach($list as $l){ 
        $iia_members_ids[]=$l->id;
        ?>
    <div class="control-group">
        <label class="control-label" style="vertical-align:top;padding:0">Artist's Details</label>
        <div class='controls'>
            Name : <?=$l->firstname." ".$l->lastname;?><BR />
            Email : <a href="/members/profile/portfolio/<?=$l->id;?>"><?=$l->email;?></a>
        </div>
    </div>
    <div class="control-group">
		<label class="control-label" style="vertical-align:top;padding:0" for="artistimage<?=$l->id;?>">Image</label>
        <div class='controls'>
            <input type="hidden" name="artistimage<?=$l->id;?>" id="artistimage1" value="<?=$l->iia_photo;?>">
            <input id="btnImageUpload1" class="btnImageUpload" type="file" name="files[]" <?=$l->iia_photo?'style="display:none"':'';?>>    
            <div id="files1" class="files">
                <?php if($l->iia_photo!=""): ?>
                <img src="http://www.harngallery.com/uploads/invest_in_art/<?=$l->iia_photo;?>" style="width:200px;height:150px;">
                <a class="removeimage" href="javascript:void(0)"><i style="vertical-align: text-top; position: absolute;" class="icon-trash"></i></a>
                <?php endif; ?>
            </div>
        </div>           
    </div>
	<div class="control-group">
		<label class="control-label" style="vertical-align:top;padding:0" for="invest_desc<?=$l->id;?>">Description</label>
        <div class='controls'>
            <textarea class="textarea" id="invest_desc<?=$l->id;?>" name="invest_desc<?=$l->id;?>" style="width: 810px; height: 200px"><?=$l->iia_desc;?></textarea>
        </div>           
    </div>    
    <?php } ?>  
    <input type="hidden" id="iia_members_ids" name="iia_members_ids" value="<?=join(",",$iia_members_ids);?>">
    <?php } ?>  
    <div class="form-actions">  
        <button name="save"  class="btn btn-inverse pull-left" type="submit">Save</button>
    </div>        
</fieldset>          
<?php echo form_close(); ?>          