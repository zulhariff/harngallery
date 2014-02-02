
<!-- Modal -->
<div id="ForgetPasswordModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">

  <?php echo form_open('','class="form-horizontal" id="ForgetPasswordModalForm"'); ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>  
    <span style="font-size:22.5px;">Forget Password</span>
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
      <div class="controls">
      <button class="pull-left btnHarn">Submit</button>
      </div>
    </div>    
    </fieldset>
  </div>
  
<?php echo form_close(); ?>
</div>
