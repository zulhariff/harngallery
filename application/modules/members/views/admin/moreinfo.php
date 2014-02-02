<?php
$countries = config_item('address.countries');
?>
<div class="admin-box">
	<h3>Member more info</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>
			<div class="control-group">
				<div class='controls'>
					<img src="/uploads/<?=$member->id;?>/registration/<?=$member->photo;?>">
				</div>
			</div>			
			<div class="control-group">				
				<label class="control-label">First Name</label>
				<div class='controls'>
					<?=$member->firstname;?>
				</div>
			</div>

			<div class="control-group">
				<?php echo form_label('Last Name', 'members_lastname', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$member->lastname;?>
				</div>
			</div>

			<div class="control-group">
				<?php echo form_label('Email'. lang('bf_form_label_required'), 'members_email', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$member->email;?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Date of Birth', 'members_dob', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$member->dob;?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Country</label>				
				<div class='controls'>
					<?= $countries[$member->country]['printable'];?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Street address', 'members_address1', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$member->address1;?>
				</div>
			</div>

			<div class="control-group">
				<?php echo form_label('Apt', 'members_address2', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$member->address2;?>
				</div>
			</div>

			<div class="control-group">
				<?php echo form_label('Phone', 'members_phone', array('class' => 'control-label') ); ?>
				<div class='controls'>

					<?=$member->phone;?>
				</div>
			</div>

			<div class="control-group">
				<?php echo form_label('City', 'members_city', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$member->city;?>
				</div>
			</div>

			<div class="control-group">
				<?php echo form_label('Postal', 'members_postal', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$member->postal;?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">User Type</label>				
				<div class='controls'>
					<?php if($member->type==1) {
						echo "Artist";
					}else{
						echo "Collector";
					}
					?>
				</div>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>