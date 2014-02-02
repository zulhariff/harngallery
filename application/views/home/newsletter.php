		<ul class="breadcrumb">
				<li>
					<a href="/">Home</a> <span class="divider">></span>
				</li>
				<li class="active">
					Newsletter
				</li>								
			</ul>	

<h4 style="color:#000000">Get $25 Credit - Sign up to our Newsletter</h4>
<?=$messages['newsletter'];?>
<?if(isset($error_messages)){
    echo $error_messages;
}else { ?>
<span>Please enter your e-mail address below:</span><br /><br /> 
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="newsletterForm"'); ?>  
<fieldset>	
           <input type="text" class="input-xlarge" id="txtEmail" name="txtEmail"> <button name="save" class="btnHarn" type="submit">Subscribe</button>
 


           
   


</fieldset>          
<?php echo form_close(); ?>
<?php } ?> 