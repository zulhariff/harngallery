<!-- Modal -->
<div id="RegisterModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="RegisterLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="RegisterLabel">Register</h3>
<span id="mgsReply" style="color:green"></span>
</div>

<script>
function clearRegisterForm(){
  $('#member_firstname').val('');
  $('#member_lastname').val('');
  $('#member_email').val(''); 
}

function disableFields(){
  $('#member_email').attr('disabled','disabled');
  $('#member_email').attr('disabled','disabled');
  $('#member_email').attr('disabled','disabled');
}

$.validator.setDefaults({
  submitHandler: function($form) {
    if($form.id=='registrationModalForm'){

      var cct = $("input[name=ci_csrf_token]").val();
      $.ajax({
        type: "POST",
        url: "/members/register_member",
          data: { firstname: $('#member_firstname').val(), 
          lastname: $('#member_lastname').val() , 
          password: $('#member_pswd').val(), 
          email: $('#member_email').val(),
          txtCaptcha: $('#reg_captcha').val(),
          'ci_csrf_token': cct}  
        })
        .done(function(data) {       
            data=JSON.parse(data); 
            if(data.status){
             // clearRegisterForm();
              //$('#mgsReply').html('Thank you for registering!<br /> Please check your email for instructions to activate your account') ;
              $('#AlertModal_Title').html('Register');
              $('#AlertModal_Message').html('Thank you for registering!<br /> Please check your email for instructions to activate your account');
              $('#RegisterModal').modal('hide');
              $('#AlertModal').modal('show');              
            }else{
              //alert(data.message);
              $('#captcha_error').html(data.message);
              $('#captcha_error').show();
            }          
        });
    }else if($form.id=='LoginModalForm'){
        var cct = $("input[name=ci_csrf_token]").val();
        $.ajax({
          type: "POST",
          url: "/members/login",
            data: { email: $('#login_email').val(), 
            password: $('#login_password').val() ,
            'ci_csrf_token': cct}  
          })
          .done(function(data) {      
            data=JSON.parse(data);   
            if(data.status){
               //location.reload(); 
               window.location = window.location.href;
              //$('#RegisterModal').modal('hide');
              //window.top.location.href = '/members/';
            }else{
              $('#msgLoginReply').html(data.message);              
            }           
          });
    }
  }
});

$().ready(function() {

  $("#registrationModalForm").validate({
    rules: {
      member_firstname: "required",
      member_lastname: "required",
      reg_captcha : "required",
      member_pswd: {
        required: true,
        minlength: 5
      },
      confirm_member_pswd: {
        required: true,
        minlength: 5,
        equalTo: "#member_pswd"
      },
      member_email: {
        required: true,
        email: true
      }
    },
    messages: {
      member_firstname: "Please enter your firstname",
      member_lastname: "Please enter your lastname",
      member_pswd: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      confirm_member_pswd: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
        equalTo: "Please enter the same password as above"
      },
      member_email: "Please enter a valid email address"
    }
  });
});
</script>

<!--form class="form-horizontal" id="registrationModalForm" method="get" action="" !-->
<?php echo form_open('','class="form-horizontal" id="registrationModalForm"'); ?>

<div class="modal-body">    
<fieldset> 
      <div class="control-group <?php echo form_error('firstname') ? 'error' : ''; ?>">
        <?php echo form_label('First Name'. lang('bf_form_label_required'), 'member_firstname', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='member_firstname' type='text' name='member_firstname' maxlength="50" />
        </div>
      </div>

      <div class="control-group <?php echo form_error('lastname') ? 'error' : ''; ?>">
        <?php echo form_label('Last Name'. lang('bf_form_label_required'), 'member_lastname', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='member_lastname' type='text' name='member_lastname' maxlength="50" />
        </div>
      </div>

      <div class="control-group <?php echo form_error('email') ? 'error' : ''; ?>">
        <?php echo form_label('Email'. lang('bf_form_label_required'), 'member_email', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='member_email' type='text' name='member_email' maxlength="100"  />
        </div>
      </div>
      <div class="control-group <?php echo form_error('pswd') ? 'error' : ''; ?>">
        <?php echo form_label('Password'. lang('bf_form_label_required'), 'member_pswd', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='member_pswd' type='password' name='member_pswd' maxlength="15"  />
        </div>
      </div>
      <div class="control-group <?php echo form_error('pswd') ? 'error' : ''; ?>">
        <?php echo form_label('Confirm Password', 'confirm_member_pswd', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='confirm_member_pswd' type='password' name='confirm_member_pswd' maxlength="15" />
        </div>
      </div>
      <div class="control-group">  
          <label class="control-label" for="reg_captcha" style="float:left;width:150px">Verify Code</label>  
         <div class="controls">  
            <input type="password" class="input-medium" id="reg_captcha" name="reg_captcha">    
            <label id="captcha_error" class="error" for="reg_captcha" style="display: none;">This field is required.</label>  
         </div>  
      </div>
      <div class="control-group">  
        <div class="controls">  
          <div id="RegistrationCaptcha" class="captcha_div"></div>
        </div>  
      </div>
    <div class="control-group">  
      <div class="controls">  
        <button class="pull-left btnHarn">Register</button>
      </div>
    </div>      

</fieldset>
</div>

<!--/form-->
<?php echo form_close(); ?>
</div>