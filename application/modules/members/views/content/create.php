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
<div class="admin-box">
	<h3>Members</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('firstname') ? 'error' : ''; ?>">
				<?php echo form_label('First Name'. lang('bf_form_label_required'), 'members_firstname', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_firstname' type='text' name='members_firstname' maxlength="100" value="<?php echo set_value('members_firstname', isset($members['firstname']) ? $members['firstname'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('firstname'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('lastname') ? 'error' : ''; ?>">
				<?php echo form_label('Last Name', 'members_lastname', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_lastname' type='text' name='members_lastname' maxlength="100" value="<?php echo set_value('members_lastname', isset($members['lastname']) ? $members['lastname'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('lastname'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('email') ? 'error' : ''; ?>">
				<?php echo form_label('Email'. lang('bf_form_label_required'), 'members_email', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_email' type='text' name='members_email' maxlength="100" value="<?php echo set_value('members_email', isset($members['email']) ? $members['email'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('email'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('pswd') ? 'error' : ''; ?>">
				<?php echo form_label('Password'. lang('bf_form_label_required'), 'members_pswd', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_pswd' type='text' name='members_pswd' maxlength="8" value="<?php echo set_value('members_pswd', isset($members['pswd']) ? $members['pswd'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('pswd'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('dob') ? 'error' : ''; ?>">
				<?php echo form_label('Date of Birth', 'members_dob', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_dob' type='text' name='members_dob'  value="<?php echo set_value('members_dob', isset($members['dob']) ? $members['dob'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('dob'); ?></span>
				</div>
			</div>

			<?php // Change the values in this array to populate your dropdown as required
				$options = array(
				);

				echo form_dropdown('members_country', $options, set_value('members_country', isset($members['country']) ? $members['country'] : ''), 'Country');
			?>

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

			<div class="control-group <?php echo form_error('phone') ? 'error' : ''; ?>">
				<?php echo form_label('Phone', 'members_phone', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_phone' type='text' name='members_phone' maxlength="50" value="<?php echo set_value('members_phone', isset($members['phone']) ? $members['phone'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('phone'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('city') ? 'error' : ''; ?>">
				<?php echo form_label('City', 'members_city', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_city' type='text' name='members_city' maxlength="100" value="<?php echo set_value('members_city', isset($members['city']) ? $members['city'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('city'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('postal') ? 'error' : ''; ?>">
				<?php echo form_label('Postal', 'members_postal', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='members_postal' type='text' name='members_postal' maxlength="50" value="<?php echo set_value('members_postal', isset($members['postal']) ? $members['postal'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('postal'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('type') ? 'error' : ''; ?>">
				<?php echo form_label('I am an artist', '', array('class' => 'control-label', 'id' => 'members_type_label') ); ?>
				<div class='controls' aria-labelled-by='members_type_label'>
					<label class='radio' for='members_type_option1'>
						<input id='members_type_option1' name='members_type' type='radio' class='' value='option1' <?php echo set_radio('members_type', 'option1', TRUE); ?> />
						Radio option 1
					</label>
					<label class='radio' for='members_type_option2'>
						<input id='members_type_option2' name='members_type' type='radio' class='' value='option2' <?php echo set_radio('members_type', 'option2'); ?> />
						Radio option 2
					</label>
					<span class='help-inline'><?php echo form_error('type'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('members_action_create'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/content/members', lang('members_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>