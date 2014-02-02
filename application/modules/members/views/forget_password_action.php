
<h4 style="color:#333333">Forgot Your Password?</h4>
<span ><?=$message;?></span>
<br />
<br />
<?php echo form_open('','class="form-horizontal"'); ?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="email">Email</label>
        <div class='controls'>
             <input type="text" class="input-xlarge" id="email" name="email">    
        </div>           
    </div>
   <div class="control-group">
        <div class='controls'> 
            <button name="save" class="btnHarn" type="submit">Submit</button>
        </div>        
    </div>
<?php echo form_close(); ?>