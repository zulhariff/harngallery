<?php

$num_columns	= 13;
$can_delete	= $this->auth->has_permission('Members.Reports.Delete');
$can_edit		= $this->auth->has_permission('Members.Reports.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

?>
<div class="admin-box">
	<h3>Members</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>Date of Birth</th>
					<th>Country</th>
					<th>Street address</th>
					<th>Apt</th>
					<th>Phone</th>
					<th>City</th>
					<th>Postal</th>
					<th>I am an artist</th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected'); ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('members_delete_confirm'))); ?>')" />
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
					<td><?php echo anchor(SITE_AREA . '/reports/members/edit/' . $record->id, '<span class="icon-pencil"></span>' .  $record->firstname); ?></td>
				<?php else : ?>
					<td><?php e($record->firstname); ?></td>
				<?php endif; ?>
					<td><?php e($record->lastname) ?></td>
					<td><?php e($record->email) ?></td>
					<td><?php e($record->pswd) ?></td>
					<td><?php e($record->dob) ?></td>
					<td><?php e($record->country) ?></td>
					<td><?php e($record->address1) ?></td>
					<td><?php e($record->address2) ?></td>
					<td><?php e($record->phone) ?></td>
					<td><?php e($record->city) ?></td>
					<td><?php e($record->postal) ?></td>
					<td><?php e($record->type) ?></td>
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