<div>
	<h1 class="page-header">Artwork</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
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
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td>
						<?php if ($field == 'deleted'): ?>
							<?php e(($value > 0) ? lang('artwork_true') : lang('artwork_false')); ?>
						<?php else: ?>
							<?php e($value); ?>
						<?php endif ?>
					</td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>