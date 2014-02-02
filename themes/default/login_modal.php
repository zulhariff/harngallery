
<!-- Modal -->
<div id="LoginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
  <script>

  $().ready(function() {
    $('#lnkCreateAccount').click(function(){
      $('#LoginModal').modal("hide");
      $('#RegisterModal').modal("show") 
    });
    $('#lnkForgetPassword').click(function(){
      $('#LoginModal').modal("hide");
      window.top.location.href = '/members/forget_password_action';   
    });

    $("#LoginModalForm").validate({
      rules: {
          login_email: {
            required: true,
            email: true
          },
          login_password: {
            required: true,
            minlength: 5
          },
          messages: {
            login_email: "Please enter a valid email address",
            login_password: {
              required: "Please provide a password",
              minlength: "Your password must be at least 5 characters long"
            }
          }
        }         
      });
   });

  </script>
  <?php echo form_open('','class="form-horizontal" id="LoginModalForm"'); ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <strong style="font-size:16pt">Login</strong> or <a href="javascript:void(0)" id="lnkCreateAccount">Create an account</a>
    <span id="msgLoginReply" style="color:red"></span>
  </div>
  <div class="modal-body">
    <fieldset> 
    <div class="control-group">  
      <label class="control-label" for="login_email" style="float:left;width:150px">Email</label>  
       <div class="controls">  
          <input type="text" class="input-xlarge" id="login_email" name="login_email">    
       </div>  
    </div>  
    <div class="control-group">  
      <label class="control-label" for="login_password" style="float:left;width:150px">Password</label>  
       <div class="controls">  
          <input type="password" class="input-xlarge" id="login_password" name="login_password">    
          <br /><a href="javascript:void(0)" id="lnkForgetPassword">Forgot your password?</a>
       </div>  
    </div>    
    <div class="control-group">  
      <div class="controls">  
        <button class="pull-left btnHarn">Login</button>
      </div>
    </div>
    </fieldset>
  </div>
  
<?php echo form_close(); ?>
</div>
