<h4>Stats</h4>

<?php echo form_open(); ?>
<fieldset>
	<div class="control-group">
		<label class="control-label" for="stats">Stats</label>
        <div class='controls'>
            <textarea class="textarea" id="stats" name="stats" style="width: 810px; height: 200px"><?=$messages['stats'];?></textarea>
        </div>           
    </div>  
    <div class="control-group"> 
    	<div class='controls'>
        	<button name="save"  class="btnHarn" type="submit">Save</button>
        </div>
    </div>        
</fieldset>          
<?php echo form_close(); ?>          