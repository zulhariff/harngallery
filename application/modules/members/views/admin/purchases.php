<h4>Purchases</h4>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="registrationForm"'); ?>  
<table class="table table-bordered table-hover">	
	<tr>
		<th>Image</th>
		<th>Title			
		</th>
		<th>Email
		</th>
		<th>Date</th>
		<th>Price</th>	
		<th>
		Views</th>
	</tr>
<?php foreach($list as $l){ ?>
<tr>	
	<td>
		<a href="/members/profile/item/<?=$l->id;?>">
		<img src="<?=config_item('upload_url');?><?=$l->user_id;?>/artwork/thumbnail/<?=$l->image;?>">
		</a>
	</td>
	<td><?=$l->title;?></td>
	<td>
		<a href="/members/profile/portfolio/<?=$l->member_id;?>">
		<?=$l->email;?>
		</a>
	</td>	
	<td><?=$l->uploaded;?></td>
	<td><?=$l->price;?></td>
	<td><?=$l->visits;?></td>	
</tr>
<?php } ?>	
</table>
<?php echo form_close(); ?>


