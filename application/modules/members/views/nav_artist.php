<?php

$breadcrumbs=array(
		array('name'=>'My Account','active'=>true)
	);

?>
<?php include 'breadcrumbs.php' ?>	
<?php if($members['type']==1): ?>
<a href="/members/upload_art">Upload Art</a> / 
<a href="/members/my_art">My Art</a> / 
<a href="/members/sales">Sales</a> / 
<a href="/members/profile/info">Account Information - Profile</a> /
<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a> 
<?php else: ?>
<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a> / 
<a href="/members/orders">Orders</a> / 
<a href="/members/profile/info">Account Information</a>
<?php endif; ?>
<br /><br />
<?php if(isset($title)) { ?>
<h4 style="color:#333333"><?=$title;?></h4>
<?php } ?>