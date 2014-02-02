<ul class="breadcrumb">
	<li>
		<a href="/">Home</a> <span class="divider">></span>
	</li>
	<?php
		foreach ($breadcrumbs as $b) { 
			if(isset($b['active']) && $b['active']==true){
				echo "<li class='active'>";
				$active_title=$b['name'];
			}else{
				echo "<li>";
			}
			if(isset($b['link']) && $b['link'])
				echo "<a href='".$b['link']."'>";
			echo $b['name'];
			if(isset($b['link']) && $b['link'])
				echo "</a>";
			echo "</li>";
		}

	?>					
</ul>	
<?php if (isset($active_title)){ ?>
<h4 style="color:#333333"><?=$active_title;?></h4>
<?php } ?>

