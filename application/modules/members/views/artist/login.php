  <?php echo form_open('','class="form-horizontal"'); ?>
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
       </div>  
    </div>
    <div class="control-group">  
       <div class="controls">  
          <a href="javascript:void(0)">Forget your password</a>
       </div>  
    </div>
    </fieldset>
  </div>
  <div class="modal-footer">
  <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
    <button class="btn btn-inverse pull-left btnHarn">Login</button>
  </div>
  <?php echo form_close(); ?>