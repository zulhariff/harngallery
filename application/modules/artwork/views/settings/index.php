<?php

$num_columns	= 21;
$can_delete	= $this->auth->has_permission('Artwork.Settings.Delete');
$can_edit		= $this->auth->has_permission('Artwork.Settings.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

?>
<div class="admin-box">
	<h3>Artwork</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Image</th>
					<th>Title</th>
					<th>Description</th>
					<th>Created</th>
					<th>User</th>
					<th>Price</th>
					<th>Category</th>
					<th>Medium</th>
					<th>Style</th>
					<th>Orientation</th>
					<th>Size</th>
					<th>Color</th>
					<th>Height</th>
					<th>Width</th>
					<th>Dimension Unit</th>
					<th>Framing</th>
					<th>Keywords</th>
					<th>Curator Review</th>
					<th>Status</th>
					<th>Date Uploaded</th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected'); ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('artwork_delete_confirm'))); ?>')" />
					</td>
				</tr>
				<?php endif; ?>
			</tfoot>
			<?php endif; ?>
			<tbody>
				<?php
				if ($has_records) :
					foreach ($records as $record) :
				?>
				<tr>
					<?php if ($can_delete) : ?>
					<td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $record->id; ?>" /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/settings/artwork/edit/' . $record->id, '<span class="icon-pencil"></span>' .  $record->image); ?></td>
				<?php else : ?>
					<td><?php e($record->image); ?></td>
				<?php endif; ?>
					<td><?php e($record->title) ?></td>
					<td><?php e($record->description) ?></td>
					<td><?php e($record->created) ?></td>
					<td><?php e($record->user_id) ?></td>
					<td><?php e($record->price) ?></td>
					<td><?php e($record->cat_id) ?></td>
					<td><?php e($record->medium_id) ?></td>
					<td><?php e($record->style_id) ?></td>
					<td><?php e($record->orientation_id) ?></td>
					<td><?php e($record->size_id) ?></td>
					<td><?php e($record->color_id) ?></td>
					<td><?php e($record->height) ?></td>
					<td><?php e($record->width) ?></td>
					<td><?php e($record->dimension_unit) ?></td>
					<td><?php e($record->framing) ?></td>
					<td><?php e($record->keywords) ?></td>
					<td><?php e($record->curator_review) ?></td>
					<td><?php e($record->status) ?></td>
					<td><?php e($record->date_uploaded) ?></td>
				</tr>
				<?php
					endforeach;
				else:
				?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">No records found that match your selection.</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>