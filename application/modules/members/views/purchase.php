<?php

$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class="alert alert-block alert-error fade in">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors:</h4>
  <?php echo $validation_errors; ?>
</div>
<?php
endif;

if (isset($members))
{
  $members = (array) $members;
}
$id = isset($members['id']) ? $members['id'] : '';

?>

<h4>Please enter your shipping address</h4>

<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal well" id="registrationForm"'); ?>  
<fieldset>
      <div class="control-group <?php echo form_error('firstname') ? 'error' : ''; ?>">
        <?php echo form_label('First Name', 'members_firstname', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_firstname' type='text' name='members_firstname' maxlength="100" disabled value="<?php echo set_value('members_firstname', isset($members['firstname']) ? $members['firstname'] : ''); ?>" />
        </div>
      </div>

      <div class="control-group <?php echo form_error('lastname') ? 'error' : ''; ?>">
        <?php echo form_label('Last Name', 'members_lastname', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_lastname' type='text' name='members_lastname' disabled maxlength="100" value="<?php echo set_value('members_lastname', isset($members['lastname']) ? $members['lastname'] : ''); ?>" />
        </div>
      </div>

      <div class="control-group <?php echo form_error('address1') ? 'error' : ''; ?>">
        <?php echo form_label('Street address', 'members_address1', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_address1' type='text' name='members_address1' maxlength="255" value="<?php echo set_value('members_address1', isset($members['address1']) ? $members['address1'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('address1'); ?></span>
        </div>
      </div>

      <div class="control-group <?php echo form_error('address2') ? 'error' : ''; ?>">
        <?php echo form_label('Apt', 'members_address2', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_address2' type='text' name='members_address2' maxlength="255" value="<?php echo set_value('members_address2', isset($members['address2']) ? $members['address2'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('address2'); ?></span>
        </div>
      </div>
            <div class="control-group <?php echo form_error('city') ? 'error' : ''; ?>">
        <?php echo form_label('City', 'members_city', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_city' type='text' name='members_city' maxlength="100" value="<?php echo set_value('members_city', isset($members['city']) ? $members['city'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('city'); ?></span>
        </div>
      </div>

      <div class="control-group <?php echo form_error('members_country') ? 'error' : ''; ?>">
        <?php echo form_label('Country', 'members_country', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <?php echo country_select($members['country'],'US','members_country'); ?>          
        </div>
      </div>
      <div class="control-group <?php echo form_error('postal') ? 'error' : ''; ?>">
        <?php echo form_label('Postal', 'members_postal', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_postal' type='text' name='members_postal' maxlength="50" value="<?php echo set_value('members_postal', isset($members['postal']) ? $members['postal'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('postal'); ?></span>
        </div>
      </div>
      <div class="control-group <?php echo form_error('phone') ? 'error' : ''; ?>">
        <?php echo form_label('Phone', 'members_phone', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_phone' type='text' name='members_phone' maxlength="50" value="<?php echo set_value('members_phone', isset($members['phone']) ? $members['phone'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('phone'); ?></span>
        </div>
      </div>                                           			
          <div class="form-actions">  
            <button name="save"  class="btn btn-inverse pull-left" type="submit" style="padding:0;text-align:center;width:250px;font-style:italic;height:40px;font-size:13pt">COMPLETE REGISTRATION</button>              
          </div>        
</fieldset>          
<?php echo form_close(); ?>