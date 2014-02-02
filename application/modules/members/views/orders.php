<div  id="harn_content">
		<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a> <span class="divider">></span>
				</li>
				<li class="active">
					My Account	
				</li>								
			</ul>	

<h4 style="color:#333333">My Account</h4>

<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a> / 
<a href="/members/orders">Orders</a> / 
<a href="/members/profile/info">Account Information</a>
<br />
<br />
<h4 style="color:#333333">Orders</h4>

<?php 
$order_status=array(
	1 => 'Awaiting Payment',
	2 => 'New Order',
	3 => 'Processing Order',
	4 => 'Order Complete',
	5 => 'Order Cancelled'
	);
?>
<?php if(count($orders)){ ?>
<table class="table table-bordered table-hover">
	<tr><th>Artworks</th>
		<th>Title</th>
		<th>Artists</th>
		<th>Price</th>
		<th>Date</th>
		<th>Status</th>
	</tr>
	<?php foreach($orders as $l){ ?>
	<tr>
		<td>
		<a href="/members/profile/item/<?=$l->ord_det_item_fk;?>">
		<img src="<?=$l->ord_artwork_link;?>" style="max-width:75px">
		</a>
		</td>
		<td><?=$l->ord_det_item_name;?></td>
		<td><?=$l->ord_artist_name;?></td>	
		<td>USD$<?=$l->ord_det_price;?></td>
		<td><?=$l->ord_date;?></td>
		<td><?=$order_status[$l->ord_status];?></td>
	</tr>
	<?php } ?>
</table>	
<?}else{
	echo "You don't have any orders yet";
}
?>