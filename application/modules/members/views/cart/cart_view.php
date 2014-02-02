		<?php if (! empty($message)) { ?>
			<div class="alert alert-error">
				<?php echo $message; ?>
			</div>
		<?php } ?>
<h4>Cart Content</h4>
<?php echo form_open(current_url(),'id="cartForm"');?>
<table class="table">
	<thead>
		<tr>
		<th>Remove</th>
		<th>ID</th>
		<th>Artwork</th>
		<th>Title</th>
		<th>Artist's Name</th>
		<th>Location</th>
		<th>Price</th>
		</tr>
	</thead>
	<tbody>
	<?php if (! empty($cart_items)) {
		$i = 0;
		foreach($cart_items as $row) { 
			$i++;?>
		<tr>
		<td><input type="hidden" name="items[<?php echo $i;?>][row_id]" value="<?php echo $row['row_id'];?>"/><a href="/members/cart/delete_item/<?php echo $row['row_id'];?>" title="Click to remove item from cart">Remove</a></td>
		<td><?php echo $row['id'];?></td>
		<td><img src="<?=$row['image'];?>" style="height:40px"></td>
		<td><?php echo $row['title'];?></td>
		<td><?php echo $row['artist'];?></td>
		<td><?php echo $row['country'];?></td>
		<td><?php echo $row['price'];?></td>
		</tr>
	<?php } } else { ?>
		<tr>
		<td colspan="7" class="empty">
			<div class="alert alert-error">
				You currently have no items in your shopping cart
			</div>
		</td>
		</tr>
	<?php } ?>	
	</tbody>
	<tfoot>
		<tr>
		<th colspan="6">Item Summary Total</th>
		<td><?php echo $this->flexi_cart->item_summary_total();?></td>
		</tr>
	</tfoot>	
</table>
<button type="submit" class="btnHarn" name="destroy" value="Clear Cart" style="background:none repeat scroll 0 0 #BD362F" >
<span class="icon-trash icon-white"></span>&nbsp;Clear Cart
</button>

	<?php if($this->session->userdata('members_loggedin')) : ?>
		<button type="submit" name="checkout" value="Checkout" class="btnHarn">
			Checkout
		</button>
    <?php else: ?>
    	<button type="button" href="#LoginModal"   class="btnHarn" role="button" data-toggle="modal">Checkout
    	</button>
		
	<?php endif; ?>
<?php echo form_close();?>
