<?php include('nav_artist.php'); 
$order_status=array(
	1 => 'Awaiting Payment',
	2 => 'New Order',
	3 => 'Processing Order',
	4 => 'Order Complete',
	5 => 'Order Cancelled'
	);
?>
<?php if(count($sales)){ ?>
<table class="table table-bordered table-hover">
	<tr><th>Artworks</th>
		<th>Title</th>
		<th>Collectors</th>
		<th>Price</th>
		<th>Date</th>
		<th>Status</th>
	</tr>
	<?php foreach($sales as $l){ ?>
	<tr>
		<td>
		<a href="/members/profile/item/<?=$l->ord_det_item_fk;?>">
		<img src="<?=$l->ord_artwork_link;?>" style="max-width:75px">
		</a>
		</td>
		<td><?=$l->ord_det_item_name;?></td>
		<td><?=$l->ord_bill_name;?></td>	
		<td>USD$<?=$l->ord_det_price;?></td>
		<td><?=$l->ord_date;?></td>
		<td><?=$order_status[$l->ord_status];?></td>
	</tr>
	<?php } ?>
</table>	
<?php }else{
	echo "You don't have any sales yet";
}
?>