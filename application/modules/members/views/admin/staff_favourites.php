<h4>Staff Favourites</h4>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="registrationForm"'); ?>  
<table class="table table-bordered table-hover">
	<tr>
		<th><input type="checkbox" id="chkbox_all" ></th>
		<th>ID</th>
		<th>Image</th>
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
		<th><a href="<?=$curr_url;?>visits/<?=$sort_by=="visits"?$ad=="asc"?"desc":"asc":"asc";?>">Views
			<i class="fa fa-sort-<?=$sort_by=="visits"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		</a></th>
	<th>Actions</th></tr>
<?php foreach($list as $l){ ?>
<tr>
	<td><input type="checkbox" name="chkbox" value="<?=$l->id;?>" ></td>	
	<td><?=$l->id;?>
	<td>
		<a href="/members/profile/item/<?=$l->id;?>">
		<img style="max-width:80px;height:60px" src="<?=config_item('upload_url');?><?=$l->user_id;?>/artwork/thumbnail/<?=$l->image;?>">
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
	<td>
		<div class="btn-group">
			<button class="btn btn-default">Action</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li>
					<a href="/members/admin/edit_artwork/<?=$l->id;?>">Edit</a>
				</li>
				<li>
					<a href="/members/admin/remove_from_newthisweek/<?=$l->new_this_week_id;?>">Delete</a>
				</li>
				<li>
					<?php if($l->new_this_week_id){ ?>
						<a href="/members/admin/remove_from_newthisweek/<?=$l->new_this_week_id;?>">Remove From New This Week</a>
					<?php }else{ ?>		   	
						<a href="/members/admin/add_to_newthisweek/<?=$l->id;?>">Add To New This Week</a>
					<?php } ?>			
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
						<a href="/members/admin/add_remove_invest_in_art/<?=$l->member_id;?>/0/new_this_week/">Remove from Invest in Art</a>			
					<?php }else{  ?>		
						<a href="/members/admin/add_remove_invest_in_art/<?=$l->member_id;?>/1/new_this_week/">Add to Invest in Art</a>
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
</table>
<?php echo form_close(); ?>
