<div class="row-fluid" style="position:relative;top:-25px">
	<div class="span12">
		<div class="carousel slide" id="carousel-163514" data-interval="false">
			<ol class="carousel-indicators">
				<li data-slide-to="0" data-target="#carousel-163514" class="active"></li>
				<li data-slide-to="1" data-target="#carousel-163514"></li>
				<li data-slide-to="2" data-target="#carousel-163514"></li>
			</ol>
			<div class="carousel-inner">
			<?if(isset($slider['link1'])){?>
				<div class="item active">
				<?php if ($slider['link1']!=""){ ?>
					<a href="<?=$slider['link1'];?>" target="_blank">
				<?php }?>
				<img alt="" src="http://www.harngallery.com/uploads/slider/<?=$slider['image1'];?>">
				<?php if ($slider['link1']!=""){ ?>
					</a>
				<?php }?>
				<div class="carousel-caption">
					<font size="5" color="#FFFFFF"><?=$slider['desc1'];?></font>							
				</div>
			</div>
			<?}?>
			<?if(isset($slider['link2'])){?>
				<div class="item">
				<?php if ($slider['link2']!=""){ ?>
					<a href="<?=$slider['link2'];?>" target="_blank">
				<?php }?>
				<img alt="" src="http://www.harngallery.com/uploads/slider/<?=$slider['image2'];?>">
				<?php if ($slider['link1']!=""){ ?>
					</a>
				<?php }?>
					<div class="carousel-caption">
						<font size="5" color="#FFFFFF"><?=$slider['desc2'];?></font>
					</div>
				</div>
			<?}?>
			<?if(isset($slider['link3'])){?>
				<div class="item">
				<?php if ($slider['link3']!=""){ ?>
					<a href="<?=$slider['link3'];?>" target="_blank">
				<?php }?>
				<img alt="" src="http://www.harngallery.com/uploads/slider/<?=$slider['image3'];?>">
				<?php if ($slider['link3']!=""){ ?>
					</a>
				<?php }?>
					<div class="carousel-caption">
						<font size="5" color="#FFFFFF"><?=$slider['desc3'];?></font>
					</div>
				</div>
			<?}?>
		</div> 
	<!--<a data-slide="prev" href="#carousel-163514" class="left carousel-control">‹</a> -->
	<a data-slide="next" href="#carousel-163514" class="right carousel-control">›</a>
	</div>
	</div>
</div>
<div class="row-fluid" id="harn_content" style="position:relative;top:-25px">
	<div id="featured_art">
		<div class="contentTitle">Featured Art</div>			
        <div id="main_content" style="margin-top:10px"> 
		</div>
	</div>
</div>
