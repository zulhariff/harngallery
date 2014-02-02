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
		<th><a href="<?=$curr_url;?>reviewed/<?=$sort_by=="reviewed"?$ad=="asc"?"desc":"asc":"asc";?>">Date of Approval
			<i class="fa fa-sort-<?=$sort_by=="reviewed"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>				
		<th><a href="<?=$curr_url;?>TotalArtwork/<?=$sort_by=="TotalArtwork"?$ad=="asc"?"desc":"asc":"asc";?>">Number of artworks
			<i class="fa fa-sort-<?=$sort_by=="TotalArtwork"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>						
		<th><a href="<?=$curr_url;?>TotalSales/<?=$sort_by=="TotalSales"?$ad=="asc"?"desc":"asc":"asc";?>">Number of sales
			<i class="fa fa-sort-<?=$sort_by=="TotalSales"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>				
	
	<th></th></tr>
<?php foreach($list as $l){ ?>
<tr>

	<td><?=$l->name;?></td>
	<td><?=$l->email;?></td>	
	<td><?=$l->reviewed;?></td>
	<td><?=$l->TotalArtwork;?></td>
	<td><?=$l->TotalSales;?></td>
	<td>
		<div class="btn-group">
			<button class="btn btn-default">Action</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li>
					<?php if ($l->ban) { ?>
					<a href="/members/admin/banMember/<?=$l->member_id;?>/0">UnBan</a>
					<?php }else{;?>
					<a href="/members/admin/banMember/<?=$l->member_id;?>/1">Ban</a>
					<?php } ?>
				</li>
				<li>
					<a href="/members/admin/moreinfo/<?=$l->member_id;?>">More info</a>
				</li>
				<li>
					<?php if($l->iia) { ?>
						<a href="/members/admin/add_remove_invest_in_art/<?=$l->member_id;?>/0/artsubmission/">Remove from Invest in Art</a>			
					<?php }else{  ?>		
						<a href="/members/admin/add_remove_invest_in_art/<?=$l->member_id;?>/1/artsubmission/">Add to Invest in Art</a>
					<?php } ?>			
				</li>
			</ul>
		</div>	
	</td>
</tr>
<?php } ?>	
</table>
<?php echo $links;?>