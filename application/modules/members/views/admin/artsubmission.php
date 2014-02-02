<?php include "header.php"; ?>
<h4><?=$title;?></h4>

<table class="table table-bordered table-hover">
	<tr>
		<th><a href="<?=$curr_url;?>name/<?=$sort_by=="name"?$ad=="asc"?"desc":"asc":"asc";?>">Name
			<i class="fa fa-sort-<?=$sort_by=="name"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>		
		<th><a href="<?=$curr_url;?>email/<?=$sort_by=="email"?$ad=="asc"?"desc":"asc":"asc";?>">Email
			<i class="fa fa-sort-<?=$sort_by=="email"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>	
	<th>Artwork1</th><th>Artwork2</th><th>Artwork3</th><th>Artwork4</th><th>Artwork5</th>
	<th></th></tr>
<?php foreach($list as $l){ ?>
<tr>
	<td><?=$l->name;?></td>
	<td><?=$l->email;?></td>	
	<td><?php if($l->artwork1): ?>
		<a href="/uploads/<?=$l->member_id;?>/artsub/<?=$l->artwork1;?>" target="_blank">
			<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork1;?>" style="width:80px;height:60px">
		</a>
	<?php endif;?>
	</td>
	<td><?php if($l->artwork2): ?>
		<a href="/uploads/<?=$l->member_id;?>/artsub/<?=$l->artwork2;?>" target="_blank">
			<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork2;?>" style="width:80px;height:60px">
		</a>
		<?php endif;?>
	</td>
	<td><?php if($l->artwork3): ?>
		<a href="/uploads/<?=$l->member_id;?>/artsub/<?=$l->artwork3;?>" target="_blank">
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork3;?>" style="width:80px;height:60px">
		</a>
		<?php endif;?>
	</td>
	<td><?php if($l->artwork4): ?>
		<a href="/uploads/<?=$l->member_id;?>/artsub/<?=$l->artwork4;?>" target="_blank">
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork4;?>" style="width:80px;height:60px">
		</a>
		<?php endif;?>
	</td>
	<td><?php if($l->artwork5): ?>
		<a href="/uploads/<?=$l->member_id;?>/artsub/<?=$l->artwork5;?>" target="_blank">
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork5;?>" style="width:80px;height:60px">
		</a>
		<?php endif;?>
	</td>
	<td>
		<div class="btn-group">
			<button class="btn btn-default">Action</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="/members/admin/artsubmission_review/approve/<?=$type;?>/<?=$l->id;?>">Approve</a></li>
				<li><a href="/members/admin/artsubmission_review/reject/<?=$type;?>/<?=$l->id;?>">Reject</a></li>
			</ul>
		</div>
	</td>
</tr>
<?php } ?>	
</table>
<?php echo $links;?>