        <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a> <span class="divider">></span>
                </li>
                <li class="active">
                    My Account  
                </li>                               
            </ul>   


<?php include('nav_artist.php'); ?>

<br />
<h4 style="color:#333333">Upload Art</h4>

<div class="row-fluid">
	<div class="span12">	
<?php echo form_open('/members/artist/edit_art_save/'.$artwork->id,'class="form-horizontal" id="artistUploadForm"'); ?>
<fieldset>
	<div class="control-group" style="margin-bottom:10px;border-bottom: 1px dotted #CCC;padding-bottom:5px">
		<label class="control-label" for="image">Image</label>
        <div class='controls'>
            <img src="http://www.harngallery.com/uploads/<?=$artwork->user_id;?>/artwork/thumbnail/<?=$artwork->image;?>" style="max-height:150px;max-width:150px">
        </div>                   
    </div>     
    <div class="control-group" style="margin-bottom:10px">
		<label class="control-label" for="txttitle">Title</label>
        <div class='controls'>            
            <input id='txttitle' type='text' name='txttitle' value="<?=$artwork->title;?>"   />
        </div>           
    </div>     
    <div class="control-group" style="margin-bottom:10px">
		<label class="control-label" for="txtdescription">Description
            <br /><span style="color:#CCCCCC">(optional)</span>
        </label>
        <div class='controls'>
            <textarea id='txtdescription' name='txtdescription' style="width: 207px; height: 118px;"><?=$artwork->description;?></textarea>
        </div>           
    </div>     
    <div class="control-group" style="margin-bottom:10px">
		<label class="control-label" for="txtdatecreated">Date Created</label>

        <div class='controls'>
            <div class="input-append date datepicker" id="dpYears" data-date="<?php echo date("d-m-Y",strtotime($artwork->created));?>" data-date-format="dd-mm-yyyy" style="padding-left:0" >
                <input id='txtdatecreated' type='text' name='txtdatecreated' value="<?php echo date("d-m-Y",strtotime($artwork->created));?>" />
                <span class="add-on"><i class="icon-th"></i></span>
                <label for="txtdatecreated" class="error" style="display: none;">This field is required.</label>
            </div>
        </div>           
    </div> 

	<div class="control-group">
		<label class="control-label" for="ddlCategory">Category</label>
        <div class='controls'>
            <?=$select_category;?>
        </div>           
    </div>         
    <div class="control-group">
        <input type="hidden" name="txtMedium" id="txtMedium" value="<?=$artwork->medium_id;?>"/>
		<label class="control-label" for="ddlMedium">Medium</label>
        <div class='controls'>
            <select id="ddlMedium" name="ddlMedium">
               <option value="">Please select</option>
            </select>
        </div>           
    </div>     
    <div class="control-group">
		<label class="control-label" for="ddlStyle">Style</label>
        <div class='controls'>
            <?=$select_style;?>
        </div>           
    </div> 
    <div class="control-group">
		<label class="control-label" for="ddlSubject">Subject</label>
        <div class='controls'>
            <?=$select_subject;?>
        </div>           
    </div> 
    <div class="control-group">
		<label class="control-label" for="ddlColor">Main Color</label>
        <div class='controls'>
            <?=$select_color;?>
        </div>           
    </div> 
    <div class="control-group">
        <label class="control-label" for="ddlOrientation">Orientation</label>
        <div class='controls'>
            <?=$select_orientation;?>
        </div>           
    </div>     
    <div class="control-group">
		<label class="control-label">Dimension</label>
        <div class='controls'>
            H <input id='dimension_h' type='text' name='dimension_h' class="input-small"  value="<?=$artwork->height;?>"/>
            W <input id='dimension_w' type='text' name='dimension_w'  class="input-small"  value="<?=$artwork->width;?>" />
            <label class="radio inline"><input name='dimension_unit' type='radio' value='1' <?=$artwork->dimension_unit==1?'checked':'';?>/> centimeters</label>
            <label class="radio inline"><input name='dimension_unit' type='radio' value='2' <?=$artwork->dimension_unit==2?'checked':'';?>/> inches</label>
        </div>                           
    </div> 
    <div class="control-group">
		<label class="control-label" for="chkFrame">Framing</label>
        <div class='controls'>
        <label class="checkbox">
            <input type="checkbox" id="chkFrame" name="chkFrame" <?=$artwork->framing==0?'checked':'';?>> This item is sold unframed (recommended)
        </label>
        </div>           
    </div> 
    <div class="control-group">
		<label class="control-label" for="txtprice">Price</label>
        <div class='controls'>
            $ USD <input id='txtprice' type='text' name='txtprice' style="width:50px" value="<?=$artwork->price;?>"  />
        </div>           
    </div> 
    <div class="control-group">
		<label class="control-label" for="txtkeyword">Keyword</label>
        <div class='controls'>
            <label>
            <input id='txtkeyword' type='text' name='txtkeyword' placeholder="e.g. street,flower"  value="<?=$artwork->keywords;?>"/>
            (add comma to separate keywords)
        </label>
        </div>           
    </div> 
    <div class="control-group" style="border-top: 1px dotted #CCC;border-bottom: 1px dotted #CCC">
		<label class="control-label" for="chkCurator">Promote your art</label>
        <div class='controls'>
         <label class="checkbox">
            <input type="checkbox" id="chkCurator" name="chkCurator"> Add Curator's Review to your artwork $49 <a href="/curatorreview.html" target="_blank">Learn More</a>
        </label>
        </div>           
    </div> 
    <div class="control-group">
        <div class='controls'>
         <span class="input-group-addon">
            <label class="checkbox"><input type="checkbox" checked id="chkCopy" name="chkCopy"> I own the copyright for this work
                <label for="chkCopy" class="error" style="display: none;"></label>
            </label>
            <label class="checkbox"><input type="checkbox" checked id="chkOri" name="chkOri"> I sell the original
                <label for="chkOri" class="error" style="display: none;"></label>
            </label>
            <label class="checkbox"><input type="checkbox" checked id="chkTerms" name="chkTerms"> I agree to the <a href="/terms-of-service" target="_blank">terms and conditions</a>
                    <label for="chkTerms" class="error" style="display: none;"></label>
            </label>
        </span>
        </div>           
    </div> 
    <div class="control-group">
        <div class='controls'>
         <button name="save" class="btnHarn" type="submit" >
            SUBMIT</button>              
        </div>           
    </div>     
</fieldset>          
<?php echo form_close(); ?>
