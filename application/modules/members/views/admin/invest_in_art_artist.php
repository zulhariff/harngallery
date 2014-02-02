
<h4>Invest In Art</h4>
<?php if($list){ ?>
<table class="table table-bordered table-hover">
	<tr><th>Name</th><th>Email</th>
	<th>Image</th>
	<th></th></tr>
<?php 
	foreach($list as $l){ ?>
<tr>
	<td><?=$l->firstname;?> <?=$l->lastname;?></td>
	<td><?=$l->email;?></td>	
	<td>
		<img src="http://www.harngallery.com/uploads/invest_in_art/<?=$l->iia_photo;?>" style="width:200px;height:150px;">
	</td>
	<td>
		<a href="/members/admin/add_remove_invest_in_art/<?=$l->id;?>/0/invest_in_art_artist/">Remove</a>
	</td>
</tr>
<?php  }?>	
</table>
<?php  }?>	
