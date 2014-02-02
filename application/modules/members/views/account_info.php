<div  id="harn_content">
		<ul class="breadcrumb">
				<li>
					<a href="/">Home</a> <span class="divider">></span>
				</li>
				<li class="active">
					My Account	
				</li>								
			</ul>	

<h4 style="color:#333333">My Account</h4>
<?php if($members['type']==1): ?>
<a href="/members/upload_art">Upload Art</a> / 
<a href="/members/my_art">My Art</a> / 
<a href="/members/sales">Sales</a> / 
<a href="/members/profile">Account Information - Profile</a> /
<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a> / 
<?php else: ?>
<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a> / 
<a href="/members/orders">Orders</a> / 
<a href="/members/account_info">Account Information</a>
<?php endif; ?>
<br /><br />
<h4 style="color:#333333">My Account</h4>