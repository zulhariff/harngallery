<script type="text/javascript" src="http://www.harngallery.com/assets/js/jquery.validate.js" ></script>
<script>
$(function () {
    $('#changePasswordForm').validate({
        debug : true,
        ignore: [],
        rules: {
        oldPassword: 'required',
        newPassword: 'required',
        confirmPassword: {
            equalTo: "#newPassword"
        }
    } ,
    submitHandler: function(form) {  
        console.log('submit');
        if ($(form).valid()) 
            form.submit(); 
            return false; // prevent normal form posting
        } 
    });
});
</script>
<h4>Change Password</h4>

<?php echo form_open('','class="form-horizontal well" id="changePasswordForm"'); ?>
<fieldset>
    <?php if ($error_msg){?>    
    <?php } ?> 
    <div class="control-group">
		<label class="control-label" for="oldPassword">Old Password</label>
        <div class='controls'>            
            <input id='oldPassword' type='password' name='oldPassword'  />
            <label id="error" class="error"><?=$error_msg;?></label>
        </div>           
    </div>   
    <div class="control-group">
        <label class="control-label" for="newPassword">New Password</label>
        <div class='controls'>            
            <input id='newPassword' type='password' name='newPassword'  />
        </div>           
    </div>   
    <div class="control-group">
        <label class="control-label" for="confirmPassword">Confirm Password</label>
        <div class='controls'>            
            <input id='confirmPassword' type='password' name='confirmPassword'  />
        </div>           
    </div>   
    <div class="form-actions">  
        <button name="save"  class="btn btn-inverse pull-left" type="submit">Save</button>
    </div>        
</fieldset>          
<?php echo form_close(); ?>  