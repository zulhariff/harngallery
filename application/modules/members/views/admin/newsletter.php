<h4>Newsletter</h4>
<?php if($newsletters){ ?>
<table class="table table-bordered table-hover">	
	<tr><th>Email</th></tr>
<?php foreach($newsletters as $newsletter){ ?>
<tr>
	<td><?=$newsletter->email;?></td>
</tr>
<?php } ?>	
</table>
<?php } ?>	

