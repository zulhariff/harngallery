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
				<input id='artwork_user_id' type='hidden' name='artwork_user_id'  value="<?php echo set_value('artwork_user_id', isset($artwork['user_id']) ? $artwork['user_id'] : ''); ?>" />
				<?php echo form_label('Image', 'artwork_image', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<a href="/members/profile/item/<?=$artwork['id'];?>">
						<img src="<?=config_item('upload_url');?><?=$artwork['user_id']?>/artwork/thumbnail/<?=$artwork['image'];?>">
					</a>
					<input id='artwork_image' type='hidden' name='artwork_image' maxlength="100" value="<?php echo set_value('artwork_image', isset($artwork['image']) ? $artwork['image'] : ''); ?>" />
				</div>
			</div>

			<div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
				<?php echo form_label('Title', 'artwork_title', array('class' => 'control-label') ); ?>
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
				<?php echo form_label('Created', 'artwork_created', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_created' type='text' name='artwork_created'  value="<?php echo set_value('artwork_created', isset($artwork['created']) ? $artwork['created'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('created'); ?></span>
				</div>
			</div>			

			<div class="control-group <?php echo form_error('price') ? 'error' : ''; ?>">
				<?php echo form_label('Price', 'artwork_price', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_price' type='text' name='artwork_price' maxlength="4" value="<?php echo set_value('artwork_price', isset($artwork['price']) ? $artwork['price'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('price'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('cat_id') ? 'error' : ''; ?>">
				<?php echo form_label('Category', 'artwork_cat_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$select_category;?>
				</div>
			</div>

			<div class="control-group <?php echo form_error('medium_id') ? 'error' : ''; ?>">
				<?php echo form_label('Medium', 'artwork_medium_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<select name="artwork_medium_id" id="artwork_medium_id"  >
						<option>Please select</option>
					</select>
				</div>
			</div>

			<div class="control-group <?php echo form_error('style_id') ? 'error' : ''; ?>">
				<?php echo form_label('Style', 'artwork_style_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$select_style;?>
				</div>
			</div>

			<div class="control-group <?php echo form_error('subject_id') ? 'error' : ''; ?>">
				<?php echo form_label('Subject', 'artwork_subject_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$select_subject;?>
				</div>
			</div>
<!--
			<div class="control-group <?php echo form_error('size_id') ? 'error' : ''; ?>">
				<?php echo form_label('Size', 'artwork_size_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_size_id' type='text' name='artwork_size_id'  value="<?php echo set_value('artwork_size_id', isset($artwork['size_id']) ? $artwork['size_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('size_id'); ?></span>
				</div>
			</div>
-->
			<div class="control-group <?php echo form_error('color_id') ? 'error' : ''; ?>">
				<?php echo form_label('Color', 'artwork_color_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<?=$select_color;?>
				</div>
			</div>

			<div class="control-group <?php echo form_error('height') ? 'error' : ''; ?>">
				<?php echo form_label('Height', 'artwork_height', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input style="width:100px" id='artwork_height' type='text' name='artwork_height'  value="<?php echo set_value('artwork_height', isset($artwork['height']) ? $artwork['height'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('height'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('width') ? 'error' : ''; ?>">
				<?php echo form_label('Width', 'artwork_width', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input style="width:100px" id='artwork_width' type='text' name='artwork_width'  value="<?php echo set_value('artwork_width', isset($artwork['width']) ? $artwork['width'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('width'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('dimension_unit') ? 'error' : ''; ?>">
				<?php echo form_label('Dimension Unit', 'artwork_dimension_unit', array('class' => 'control-label') ); ?>
				<div class='controls'>	
					H <input style="width:100px" id='artwork_height' type='text' name='artwork_height'   value="<?php echo set_value('artwork_height', isset($artwork['height']) ? $artwork['height'] : ''); ?>" />
            		W <input style="width:100px" id='artwork_width' type='text' name='artwork_width'  value="<?php echo set_value('artwork_width', isset($artwork['width']) ? $artwork['width'] : ''); ?>" />
            		<input name='artwork_dimension_unit' type='radio' value='1' <?php echo $artwork['dimension_unit']==1?'checked':'';?> /> centimeters
            		<input name='artwork_dimension_unit' type='radio' value='2' <?php echo $artwork['dimension_unit']==2?'checked':'';?> /> inches					

				</div>
			</div>

			<div class="control-group <?php echo form_error('framing') ? 'error' : ''; ?>">
				<?php echo form_label('Framing', 'artwork_framing', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input type="checkbox" id="artwork_framing" value="1" name="artwork_framing" <?php echo $artwork['framing']?'checked':'';?>> 
				</div>
			</div>

			<div class="control-group <?php echo form_error('keywords') ? 'error' : ''; ?>">
				<?php echo form_label('Keywords', 'artwork_keywords', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='artwork_keywords' type='text' name='artwork_keywords'  value="<?php echo set_value('artwork_keywords', isset($artwork['keywords']) ? $artwork['keywords'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('keywords'); ?></span>
				</div>
			</div>		
			<div class="control-group ">
				<div class="controls">
					<input type="submit" name="save" class="btnHarn" value="SAVE"  />
				</div>
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>