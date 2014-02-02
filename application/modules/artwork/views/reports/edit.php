<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined offset:  1</p>
<p>Filename: files/view_default.php</p>
<p>Line Number: 183</p>

</div><?php

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

if (isset($artwork))
{
	$artwork = (array) $artwork;
}
$id = isset($artwork['id']) ? $artwork['id'] : '';

?>
<div class="admin-box">
	<h3>Artwork</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('image') ? 'error' : ''; ?>">
				<?php echo form_label('Image'. lang('bf_form_label_required'), 'artwork_image', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_image' type='text' name='artwork_image' maxlength="100" value="<?php echo set_value('artwork_image', isset($artwork['image']) ? $artwork['image'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('image'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
				<?php echo form_label('Title'. lang('bf_form_label_required'), 'artwork_title', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_title' type='text' name='artwork_title' maxlength="100" value="<?php echo set_value('artwork_title', isset($artwork['title']) ? $artwork['title'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('title'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('description') ? 'error' : ''; ?>">
				<?php echo form_label('Description', 'artwork_description', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_description' type='text' name='artwork_description' maxlength="255" value="<?php echo set_value('artwork_description', isset($artwork['description']) ? $artwork['description'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('description'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('created') ? 'error' : ''; ?>">
				<?php echo form_label('Created'. lang('bf_form_label_required'), 'artwork_created', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_created' type='text' name='artwork_created'  value="<?php echo set_value('artwork_created', isset($artwork['created']) ? $artwork['created'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('created'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('user_id') ? 'error' : ''; ?>">
				<?php echo form_label('User'. lang('bf_form_label_required'), 'artwork_user_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_user_id' type='text' name='artwork_user_id'  value="<?php echo set_value('artwork_user_id', isset($artwork['user_id']) ? $artwork['user_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('user_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('price') ? 'error' : ''; ?>">
				<?php echo form_label('Price'. lang('bf_form_label_required'), 'artwork_price', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_price' type='text' name='artwork_price' maxlength="4" value="<?php echo set_value('artwork_price', isset($artwork['price']) ? $artwork['price'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('price'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('cat_id') ? 'error' : ''; ?>">
				<?php echo form_label('Category', 'artwork_cat_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_cat_id' type='text' name='artwork_cat_id'  value="<?php echo set_value('artwork_cat_id', isset($artwork['cat_id']) ? $artwork['cat_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('cat_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('medium_id') ? 'error' : ''; ?>">
				<?php echo form_label('Medium', 'artwork_medium_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_medium_id' type='text' name='artwork_medium_id'  value="<?php echo set_value('artwork_medium_id', isset($artwork['medium_id']) ? $artwork['medium_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('medium_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('style_id') ? 'error' : ''; ?>">
				<?php echo form_label('Style', 'artwork_style_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_style_id' type='text' name='artwork_style_id'  value="<?php echo set_value('artwork_style_id', isset($artwork['style_id']) ? $artwork['style_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('style_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('orientation_id') ? 'error' : ''; ?>">
				<?php echo form_label('Orientation', 'artwork_orientation_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_orientation_id' type='text' name='artwork_orientation_id'  value="<?php echo set_value('artwork_orientation_id', isset($artwork['orientation_id']) ? $artwork['orientation_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('orientation_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('size_id') ? 'error' : ''; ?>">
				<?php echo form_label('Size', 'artwork_size_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_size_id' type='text' name='artwork_size_id'  value="<?php echo set_value('artwork_size_id', isset($artwork['size_id']) ? $artwork['size_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('size_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('color_id') ? 'error' : ''; ?>">
				<?php echo form_label('Color', 'artwork_color_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_color_id' type='text' name='artwork_color_id'  value="<?php echo set_value('artwork_color_id', isset($artwork['color_id']) ? $artwork['color_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('color_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('height') ? 'error' : ''; ?>">
				<?php echo form_label('Height', 'artwork_height', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_height' type='text' name='artwork_height'  value="<?php echo set_value('artwork_height', isset($artwork['height']) ? $artwork['height'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('height'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('width') ? 'error' : ''; ?>">
				<?php echo form_label('Width', 'artwork_width', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_width' type='text' name='artwork_width'  value="<?php echo set_value('artwork_width', isset($artwork['width']) ? $artwork['width'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('width'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('dimension_unit') ? 'error' : ''; ?>">
				<?php echo form_label('Dimension Unit', 'artwork_dimension_unit', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_dimension_unit' type='text' name='artwork_dimension_unit'  value="<?php echo set_value('artwork_dimension_unit', isset($artwork['dimension_unit']) ? $artwork['dimension_unit'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('dimension_unit'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('framing') ? 'error' : ''; ?>">
				<?php echo form_label('Framing', 'artwork_framing', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_framing' type='text' name='artwork_framing' maxlength="1" value="<?php echo set_value('artwork_framing', isset($artwork['framing']) ? $artwork['framing'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('framing'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('keywords') ? 'error' : ''; ?>">
				<?php echo form_label('Keywords', 'artwork_keywords', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_keywords' type='text' name='artwork_keywords'  value="<?php echo set_value('artwork_keywords', isset($artwork['keywords']) ? $artwork['keywords'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('keywords'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('curator_review') ? 'error' : ''; ?>">
				<?php echo form_label('Curator Review', 'artwork_curator_review', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_curator_review' type='text' name='artwork_curator_review' maxlength="1" value="<?php echo set_value('artwork_curator_review', isset($artwork['curator_review']) ? $artwork['curator_review'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('curator_review'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('status') ? 'error' : ''; ?>">
				<?php echo form_label('Status', 'artwork_status', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_status' type='text' name='artwork_status' maxlength="1" value="<?php echo set_value('artwork_status', isset($artwork['status']) ? $artwork['status'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('status'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('date_uploaded') ? 'error' : ''; ?>">
				<?php echo form_label('Date Uploaded', 'artwork_date_uploaded', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_date_uploaded' type='text' name='artwork_date_uploaded'  value="<?php echo set_value('artwork_date_uploaded', isset($artwork['date_uploaded']) ? $artwork['date_uploaded'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('date_uploaded'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('artwork_action_edit'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/reports/artwork', lang('artwork_cancel'), 'class="btn btn-warning"'); ?>
				
			<?php if ($this->auth->has_permission('Artwork.Reports.Delete')) : ?>
				or
				<button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php e(js_escape(lang('artwork_delete_confirm'))); ?>'); ">
					<span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('artwork_delete_record'); ?>
				</button>
			<?php endif; ?>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>