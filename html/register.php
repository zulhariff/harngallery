<?php include "header.php"; ?>
<link href="css/datepicker.css" rel="stylesheet">
<link href="css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-formhelpers.min.js"></script>

<h4>Thank You!</h4>
To complete the registration please answer the following (all fields required)
<form class="well form-horizontal" style="width:800px">  
          <div class="control-group">  
            <label class="control-label">First Name</label>
            <div class="controls">  
              <input type="text" class="input-xlarge" readonly="true" value="user first name">    
            </div> 
          </div>  
          <div class="control-group">  
            <label class="control-label">Last Name</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" readonly="true" value="user's last name">    
            </div>  
          </div> 
          <div class="control-group">  
            <label class="control-label" for="input01">Email</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" readonly="true" value="user's email address">    
            </div>  
          </div>  
          <div class="control-group">  
            <label class="control-label">Password</label>  
            <div class="controls">  
              <input type="password" class="input-xlarge" readonly="true" value="user's last name">    
            </div>  
          </div>                       
          <div class="control-group">  
            <label class="control-label" >Date of Birth</label>  
            <div class="controls">
				  	<div class="input-append date datepicker" id="dpYears" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
						<input class="span2" size="16" type="text" value="12-02-2012" readonly>
						<span class="add-on"><i class="icon-calendar"></i></span>
			  		</div>
          	</div>
          </div>  
          <div class="control-group">  
            <label class="control-label">Country</label>  
            <div class="controls">
					<select class="form-control bfh-countries" data-country="US"></select> 
          	</div>
          </div>            
          <div class="control-group">  
            <label class="control-label">Street Address</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" >    
            </div>  
          </div> 
          <div class="control-group">  
            <label class="control-label">Apt / Unit</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" >    
            </div>  
          </div> 
          <div class="control-group">  
            <label class="control-label">Phone</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" >    
            </div>  
          </div> 
          <div class="control-group">  
            <label class="control-label">City</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" >    
            </div>  
          </div>    
          <div class="control-group">  
            <label class="control-label">Zip / Postal Code</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" >    
            </div>  
          </div>  
          <div class="control-group">  
            <label class="control-label">I am an artist</label>  
            <div class="controls">  	
            		<label class="radio inline">Yes<input type="radio"></label>
            		<br />          			
            		<label class="radio inline">No<input type="radio"></label> 			        			
            </div>  
          </div>                                                			
          <div class="form-actions">  
            <button class="btn btn-inverse pull-left" type="button" style="padding:0;text-align:center;width:250px;font-style:italic;height:40px;font-size:13pt">COMPLETE REGISTRATION</button> 
          </div>  
</form>          
<script >
$('.datepicker').datepicker();
</script>
<?php include "footer.php"; ?>