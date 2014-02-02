<h4>Collectors</h4>
<?php echo form_open(); ?>
<label>Search</label>
<input type="text" name="collectorSearch" id="collectorSearch">
<select id="searchBy">
	<option value="name">Full Name</option>
	<option value="email">Email</option>
</select>
<button name="save"  class="btn btn-inverse" type="submit">Submit</button>
<?php echo form_close(); ?>   
<table class="table table-bordered table-hover">
	<tr><th>Name</th>
		<th>Email</th>
		<th>Registration date</th>
		<th>Number of Purchases</th>	
		<th>Actions</th>
	</tr>
	<?php foreach($list as $l){ ?>
	<tr><td><?=$l->firstname.' '.$l->lastname;?></td>
		<td><?=$l->email;?></td>
		<td><?=$l->reg_date2;?></td>
		<td><a href="/members/admin/getPurchases/<?=$l->id;?>">Purchases</a></td>	
		<td>
			<div class="btn-group">
				<button class="btn btn-default">Action</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li>
						<?php if ($l->ban) { ?>
						<a href="/members/admin/banMember/<?=$l->id;?>/0/collectors">UnBan</a>
						<?php }else{;?>
						<a href="/members/admin/banMember/<?=$l->id;?>/1/collectors">Ban</a>
						<?php } ?>				
					</li>
					<li><a href="/members/admin/moreinfo/<?=$l->id;?>">More info</a></li>
				</ul>
			</div>
		</td>
	</tr>	
	<?php } ?>	
</table>	

