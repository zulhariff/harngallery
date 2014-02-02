<?php include "header.php"; ?>
		<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a> <span class="divider">></span>
				</li>				
				<li class="active">
					Contact Us		
				</li>				
				
			</ul>	
<h2>Contact Us</h2>
<div>
<fieldset> 
<div class="control-group">  
	<label class="control-label" for="input01" style="float:left;width:150px">Name</label>  
   <div class="controls">  
      <input type="text" class="input-xlarge" id="input01">    
   </div>  
</div>  
<div class="control-group">  
	<label class="control-label" for="input02" style="float:left;width:150px">Email</label>  
   <div class="controls">  
      <input type="text" class="input-xlarge" id="input02">    
   </div>  
</div>  
<div class="control-group">  
	<label class="control-label" for="input03" style="float:left;width:150px">Subject</label>  
   <div class="controls">  
      <input type="text" class="input-xlarge" id="input03">    
   </div>  
</div>  
<div class="control-group">  
	<label class="control-label" for="input04" style="float:left;width:150px">Message</label>  
   <div class="controls">  
   	<textarea id="input04"></textarea>    
   </div>  
</div>  

<div class="control-group">  
	<label class="control-label" for="input06" style="float:left;width:150px">Verify Code</label>  
   <div class="controls">  
      <input type="text" class="input-medium" id="input06">    
   </div>  
</div>    
<!--img id="img-captcha" style="margin-left:150px" src="http://www.titanauctions.net/demo/site/captcha.htm?v=526653582553c" -->
</fieldset>
</div>
<div>
<button class="btn btn-inverse pull-left btnHarn">Send</button>
</div>
<?php include "footer.php"; ?>