<?php include "header.php"; ?>
<h4>Pending Artist</h4>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="registrationForm"'); ?>  
<table class="table table-bordered table-hover">
	<tr><th>First Name</th><th>Last Name</th><th>Email</th>
	<th>Artwork1</th><th>Artwork2</th><th>Artwork3</th><th>Artwork4</th><th>Artwork5</th>
	<th></th></tr>
<?php foreach($list as $l){ ?>
<tr>
	<td><?=$l->firstname;?></td>
	<td><?=$l->lastname;?></td>
	<td><?=$l->email;?></td>	
	<td><?php if($l->artwork1): ?>
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork1;?>">
	<?php endif;?>
	</td>
	<td><?php if($l->artwork2): ?>
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork2;?>">
		<?php endif;?>
	</td>
	<td><?php if($l->artwork3): ?>
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork3;?>">
		<?php endif;?>
	</td>
	<td><?php if($l->artwork4): ?>
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork4;?>">
		<?php endif;?>
	</td>
	<td><?php if($l->artwork5): ?>
		<img src="/uploads/<?=$l->member_id;?>/artsub/thumbnail/<?=$l->artwork5;?>">
		<?php endif;?>
	</td>
	<td>
		<div class="btn-group">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		    Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu">
		    <li><a href="/members/admin/pending/approve/<?=$l->id;?>">Approve</a></li>
		    <li><a href="/members/admin/pending/reject/<?=$l->id;?>">Reject</a></li>
		  </ul>
		</div>
	</td>
</tr>
<?php } ?>	
</table>
          <div class="form-actions">  
            <button name="save"  class="btn btn-inverse pull-left" type="submit" 
            style="padding:0;text-align:center;width:150px;font-style:italic;height:40px;font-size:13pt">
        	SUBMIT</button>
          </div>   
<?php echo form_close(); ?>
