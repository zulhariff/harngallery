<h4>Artwork</h4>
<form action="/members/admin/getItem/all" method="post" accept-charset="utf-8">  
<table border="0" style="width:100%"><tr><td style="text-align:right">
<div>Search by ID: <input type="text" style="width:100px" id="searchID" name="searchID"><input type="submit" value="OK" class="btnHarn"></div>
<?=$first;?>-<?=$last;?> of <?=$total_rows;?> results(s)
</td></tr></table>
</form>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="registrationForm"'); ?>  
<table class="table table-bordered table-hover">	
	<tr>
		<th><input type="checkbox" id="chkbox_all" ></th>
		<th>Image</th>
		<th>ID</th>
		<th>
			<a href="<?=$curr_url;?>title/<?=$sort_by=="title"?$ad=="asc"?"desc":"asc":"asc";?>">Title
				<i class="fa fa-sort-<?=$sort_by=="title"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
			</a>
		</th>
		<th><a href="<?=$curr_url;?>email/<?=$sort_by=="email"?$ad=="asc"?"desc":"asc":"asc";?>">Email
			<i class="fa fa-sort-<?=$sort_by=="email"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>
		<th><a href="<?=$curr_url;?>uploaded/<?=$sort_by=="uploaded"?$ad=="asc"?"desc":"asc":"asc";?>">Date
			<i class="fa fa-sort-<?=$sort_by=="uploaded"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>
		<th><a href="<?=$curr_url;?>price/<?=$sort_by=="price"?$ad=="asc"?"desc":"asc":"asc";?>">Price
			<i class="fa fa-sort-<?=$sort_by=="price"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>	
		<th style="width:70px"><a href="<?=$curr_url;?>visits/<?=$sort_by=="visits"?$ad=="asc"?"desc":"asc":"asc";?>">Views
			<i class="fa fa-sort-<?=$sort_by=="visits"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>
	<th>Actions</th></tr>
<?php foreach($list as $l){ ?>
<tr>
	<td><input type="checkbox" name="chkbox" value="<?=$l->id;?>" ></td>
	<td>
		<a href="/members/profile/item/<?=$l->id;?>">
		<img src="<?=config_item('upload_url');?><?=$l->user_id;?>/artwork/thumbnail/<?=$l->image;?>" style="width:80px;height:60px">
		</a>
	</td>
	<td><?=$l->id;?></td>
	<td><?=$l->title;?></td>
	<td>
		<a href="/members/profile/portfolio/<?=$l->member_id;?>">
		<?=$l->email;?>
		</a>
	</td>	
	<td><?=$l->uploaded;?></td>
	<td><?=$l->price;?></td>
	<td style="text-align:center"><?=$l->visits;?></td>
	<td>
		<div class="btn-group">
			<button class="btn btn-default">Action</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li>
					<a href="/members/admin/edit_artwork/<?=$l->id;?>">Edit</a>
				</li>
				<li>
					<?php if($l->new_this_week_id){ ?>
						<a href="/members/admin/remove_from_newthisweek/<?=$l->new_this_week_id;?>">Remove From New This Week</a>
					<?php }else{ ?>		   	
						<a href="/members/admin/add_to_newthisweek/<?=$l->id;?>">Add To New This Week</a>
					<?php } ?>
				</li>
				<li>
					<a href="/members/admin/deleteArtwork/<?=$l->id;?>/artwork">Delete</a>
				</li>
				<li>
					<?php if($l->staff_favourites_id){ ?>
						<a href="/members/admin/remove_from_stafffavourites/<?=$l->staff_favourites_id;?>">Remove From Staff Favourites</a>
					<?php }else{ ?>
						<a href="/members/admin/add_to_stafffavourites/<?=$l->id;?>">Add To Staff Favourites</a>
					<?php } ?>	
				</li>
				<li>
					<a href="/members/admin/add_curator/<?=$l->id;?>">Add Curator's review</a>
				</li>
				<li>
					<?php if($l->iia) { ?>
						<a href="/members/admin/add_remove_invest_in_art/<?=$l->member_id;?>/0/artwork/">Remove from Invest in Art</a>			
					<?php }else{  ?>		
						<a href="/members/admin/add_remove_invest_in_art/<?=$l->member_id;?>/1/artwork/">Add to Invest in Art</a>
					<?php } ?>
				</li>
				<li>
					<?php if($l->featured_id){ ?>
						<a href="/members/admin/remove_from_homepage_featured/<?=$l->featured_id;?>">Remove From Hompage Featured</a>
					<?php }else{ ?>		   	
					 	<a href="/members/admin/add_to_homepage_featured/<?=$l->id;?>">Add To Homepage Featured</a>
					<?php } ?>					
				</li>
			</ul>
		</div>

	</td>
</tr>
<?php } ?>	
<tr>
<td colspan="9">
	<a href="javascript:void(0)" id="bulkDelete">Delete</a>
</td>
</tr>
</table>
<?php echo $links;?>
<?php echo form_close(); ?>


