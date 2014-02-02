<h4>Artwork</h4>
<form action="/members/admin/getItem/all" method="post" accept-charset="utf-8">  
<table border="0" style="width:100%"><tr><td style="text-align:right">
<div>Search by ID: <input type="text" style="width:100px" id="searchID" name="searchID"><input type="submit" value="OK"></div>
<?=$first;?>-<?=$last;?> of <?=$total_rows;?> results(s)
</td></tr></table>
</form>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="registrationForm"'); ?>  
<table class="table table-bordered table-hover">	
	<tr>
		<th><input type="checkbox" id="chkbox_all" ></th>
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
		<th><a href="<?=$curr_url;?>visits/<?=$sort_by=="visits"?$ad=="asc"?"desc":"asc":"asc";?>">
			<i class="fa fa-sort-<?=$sort_by=="visits"?$ad=="asc"?"desc":"asc":"asc";?>"></i>
		Views</a></th>
	<th colspan="2">Actions</th></tr>
<?php foreach($list as $l){ ?>
<tr>
	<td><input type="checkbox" name="chkbox" value="<?=$l->id;?>" ></td>
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
	<td>
		<a href="#">Edit</a>
		<br />
		<a href="#">Delete</a>
		<br />
		<?php if($l->new_this_week_id){ ?>
			<a href="/members/admin/remove_from_newthisweek/<?=$l->new_this_week_id;?>">Remove From New This Week</a>
		<?php }else{ ?>		   	
			<a href="/members/admin/add_to_newthisweek/<?=$l->id;?>">Add To New This Week</a>
		<?php } ?>
		<br />
		<?php if($l->staff_favourites_id){ ?>
			<a href="/members/admin/remove_from_stafffavourites/<?=$l->staff_favourites_id;?>">Remove From Staff Favourites</a>
		<?php }else{ ?>
			<a href="/members/admin/add_to_stafffavourites/<?=$l->id;?>">Add To Staff Favourites</a>
		<?php } ?>		   	
	</td>
	<td>
		<a href="#">Add Curator's review</a>
		<br />
		<a href="#">Add to Invest in Art</a>
		<br />
		<?php if($l->featured_id){ ?>
			<a href="/members/admin/remove_from_homepage_featured/<?=$l->featured_id;?>">Remove From Hompage Featured</a>
		<?php }else{ ?>		   	
		 	<a href="/members/admin/add_to_homepage_featured/<?=$l->id;?>">Add To Homepage Featured</a>
		<?php } ?>		
	</td>
</tr>
<?php } ?>	
</table>
<?php echo $links;?>
<!--
          <div class="form-actions">  
            <button name="save"  class="btn btn-inverse pull-left" type="submit" 
            style="padding:0;text-align:center;width:150px;font-style:italic;height:40px;font-size:13pt">
        	SUBMIT</button>
          </div>   
      -->
<?php echo form_close(); ?>


