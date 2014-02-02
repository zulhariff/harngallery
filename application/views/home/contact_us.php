<ul class="breadcrumb">
	<li>
		<a href="/">Home</a> <span class="divider">></span>
	</li>
	<li class="active">
		Contact Us
	</li>								
</ul>	
<h4 style="color:#333333">Contact Us</h4>
Feel free to contact us using the form below
<BR /><BR />
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="contactUsForm"'); ?>  
<fieldset>
	<div class="control-group">
		<label class="control-label" for="txtName">Name</label>
        <div class='controls'>
             <input type="text" class="input-xlarge" id="txtName" name="txtName" value="<?=isset($name)?$name:'';?>">    
        </div>           
    </div>
    <div class="control-group">
        <label class="control-label" for="txtEmail">Email</label>
        <div class='controls'>
             <input type="text" class="input-xlarge" id="txtEmail" name="txtEmail" value="<?=isset($email)?$email:'';?>">    
        </div>           
    </div>
    <div class="control-group">
        <label class="control-label" for="txtSubject">Subject</label>
        <div class='controls'>
             <input type="text" class="input-xlarge" id="txtSubject" name="txtSubject" value="<?=isset($subject)?$subject:'';?>">    
        </div>           
    </div>    
	<div class="control-group">
		<label class="control-label" for="txtMessage">Message</label>
        <div class='controls'>
            <textarea class="textarea" id="txtMessage" name="txtMessage" style="width: 510px; height: 200px"><?=isset($message)?$message:'';?></textarea>
        </div>           
    </div>    
    <div class="control-group">  
          <label class="control-label" for="contactus_captcha" style="float:left;width:150px">Verify Code</label>  
         <div class="controls">  
            <input type="password" class="input-medium" id="contactus_captcha" name="contactus_captcha">    
            <?php if(isset($error_message)) { ?>
            <label class="error"><?=$error_message;?></label>
            <?php } ?>
         </div>  
      </div>
      <div class="control-group">  
        <div class="controls">  
          <div id="ContactUsCaptcha" class="captcha_div"></div>
        </div>  
      </div>    
   <div class="control-group">
        <div class='controls'> 
            <button name="save"  class="btnHarn" type="submit">Send</button>
        </div>        
    </div>
</fieldset>          
<?php echo form_close(); ?>

