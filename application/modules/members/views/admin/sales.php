<?php
$order_status=array(
	3 => 'Processing Order',
	4 => 'Order Complete',
	5 => 'Order Cancelled'
	);
	?>
<h4>Sales</h4>
<table class="table table-bordered table-hover">
	<tr><th>Artworks</th>
		<th>Title</th>
		<th>Collector</th>
		<th>Artist</th>	
		<th>Price</th>
		<th>Date</th>
		<th>Status</th>
	</tr>
	<?php foreach($list as $l){ ?>
	<tr>
		<td>
		<a href="/members/profile/item/<?=$l->ord_det_item_fk;?>">
		<img src="<?=$l->ord_artwork_link;?>" style="width:80px;height:60px">
		</a>
		</td>
		<td><?=$l->ord_det_item_name;?></td>
		<td><?=$l->ord_email;?></td>
		<td><?=$l->ord_artist_email;?></td>	
		<td>USD$<?=$l->ord_det_price;?></td>
		<td><?=$l->ord_date;?></td>
		<td>
		<div class="btn-group">
		<button class="btn btn-default"><?=$order_status[$l->ord_status];?></button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
		  <ul class="dropdown-menu" role="menu">
		  	<?php foreach($order_status as $key=>$value){ ?>
		    <li><a href="/members/admin/updateorder/<?=$l->ord_order_number;?>/<?=$key;?>"><?=$value;?></a></li>
		    <?php } ?>		  
		  </ul>
		</div>

		</td>
	</tr>
	<?php } ?>
</table>	
