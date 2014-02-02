<?php include "header.php"; ?>
<h4><?=$title;?></h4>

<table class="table table-bordered table-hover">
		<th><a href="<?=$curr_url;?>name/<?=$sort_by=="name"?$ad=="asc"?"desc":"asc":"asc";?>">Name
			<i class="fa fa-sort-<?=$sort_by=="name"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>
		<th><a href="<?=$curr_url;?>email/<?=$sort_by=="email"?$ad=="asc"?"desc":"asc":"asc";?>">Email
			<i class="fa fa-sort-<?=$sort_by=="email"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>	
		<th><a href="<?=$curr_url;?>reviewed/<?=$sort_by=="reviewed"?$ad=="asc"?"desc":"asc":"asc";?>">Rejection date
			<i class="fa fa-sort-<?=$sort_by=="reviewed"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>			
	</tr>
<?php foreach($list as $l){ ?>
<tr>

	<td><?=$l->name;?></td>
	<td><?=$l->email;?></td>	
	<td><?=$l->reviewed;?></td>
</tr>
<?php } ?>	
</table>
<?php echo $links;?>