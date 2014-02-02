
<?php include('nav_artist.php'); ?>
<style>
.progress-bar-success {
    background-color: #5CB85C;
}
</style>

<div class="row-fluid">
	<div class="span12">				
        It is the first time you upload your Art on Harngallery.com. Thank you!<br />
        <br />
        We would like to ensure that it meets our gallery quality requirements. Please upload 5 photos of your artworks.
        We will review them within 2 working days<br />
        <br />
        Once your application is approved your next artworks will be automatically published in our gallery.
	</div>
</div>
<br />
<?php
$validation_errors = validation_errors();
if ($validation_errors) : ?>
<div class="alert alert-block alert-error fade in">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors:</h4>
  <?php echo $validation_errors; ?>
</div>
<?php
endif;
if (isset($members)){
  $members = (array) $members;
}
$id = isset($members['id']) ? $members['id'] : '';
?>
<div class="row-fluid">
	<div class="span12">				
         
<?php echo form_open('','class="form-horizontal" id="ArtworkSubForm"'); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="artwork1">Artwork #1</label>
        <div class='controls'>
            <input type="hidden" name="artwork1" id="artwork1">
            <input class="btnfileupload"  id="fl_artwork1" type="file" name="files[]">    
            <div id="files1" class="files"></div>
            
        </div>        
    </div>     
    <div class="control-group">
		<label class="control-label" for="artwork2">Artwork #2</label>
        <div class='controls'>
            <input type="hidden" name="artwork2" id="artwork2">
            <input class="btnfileupload" id="fl_artwork2" type="file" name="files[]">    
            <div id="files2" class="files"></div>
        </div>           
    </div>     
    <div class="control-group">
		<label class="control-label" for="artwork3">Artwork #3</label>
        <div class='controls'>
            <input type="hidden" name="artwork3" id="artwork3">
            <input class="btnfileupload"  id="fl_artwork3" type="file" name="files[]">    
            <div id="files3" class="files"></div>
        </div>           
    </div>     
    <div class="control-group">
		<label class="control-label" for="artwork4">Artwork #4</label>
        <div class='controls'>
            <input type="hidden" name="artwork4" id="artwork4">
            <input  class="btnfileupload" id="fl_artwork4" type="file" name="files[]">    
            <div id="files4" class="files"></div>
        </div>           
    </div>     
    <div class="control-group">
		<label class="control-label" for="artwork5">Artwork #5</label>
        <div class='controls'>
            <input type="hidden" name="artwork5" id="artwork5">
            <input class="btnfileupload" id="fl_artwork5" type="file" name="files[]">    
            <div id="files5" class="files"></div>
        </div>           
    </div>     
    <div class="control-group">
        <div class='controls'>
        <button name="save"  class="pull-left btnHarn">
            SUBMIT</button>   
        </div>           
    </div>        
</fieldset>          
<?php echo form_close(); ?>
	</div>
</div>