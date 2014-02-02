
<div class="row-fluid" id="harn_content">
		<div class="span8">
			<div class="carousel slide" id="carousel-163514" data-interval="false">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-163514">
					</li>
					<li data-slide-to="1" data-target="#carousel-163514" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-163514">
					</li>
				</ol>
				<div class="carousel-inner">
					<?if(isset($slider['link1'])){?>
					<div class="item">
						<?php if ($slider['link1']!=""){ ?>
						<a href="<?=$slider['link1'];?>" target="_blank">
						<?php }?>
						<img alt="" src="http://www.harngallery.com/uploads/slider/<?=$slider['image1'];?>">
						<?php if ($slider['link1']!=""){ ?>
						</a>
						<?php }?>
						<div class="carousel-caption">
							<h4>
								<?=$slider['desc1'];?>
							</h4>							
						</div>
					</div>
					<?}?>
					<?if(isset($slider['link2'])){?>
					<div class="item active">
						<?php if ($slider['link2']!=""){ ?>
						<a href="<?=$slider['link2'];?>" target="_blank">
						<?php }?>
						<img alt="" src="http://www.harngallery.com/uploads/slider/<?=$slider['image2'];?>">
						<?php if ($slider['link1']!=""){ ?>
						</a>
						<?php }?>
						<div class="carousel-caption">
							<h4>
								<?=$slider['desc2'];?>
							</h4>
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
							<h4>
								<?=$slider['desc3'];?>
							</h4>
						</div>
					</div>
					<?}?>
				</div> 
				<!--<a data-slide="prev" href="#carousel-163514" class="left carousel-control">‹</a> -->
				<a data-slide="next" href="#carousel-163514" class="right carousel-control">›</a>
			</div>

			<div id="featured_art">
				<div class="contentTitle">Featured Art</div>			
            	<div id="main_content">                                               
            	</div>
			</div>
		</div>
		<div class="span4" id="harn_rightbar">
			<div style="overflow:hidden">
				<div class="NewsletterBanner">
					<div class="BannerTitle">GET $25 CREDIT</div>
					<div class="BannerSubTitle">SUBSCRIBE TO OUR NEWSLETTER</div>
					<div class="BannerDesc">Plus, discover emerging artist from around the world,
						receive updates about new art for sale, exclusive events...
					</div>
					<div class="BannerForm">
					<form id="newsletterForm" action="/home/newsletter" method="post" accept-charset="utf-8" style="width:100%">  
					<div class="controls pull-right" style="margin-left:13px;width:100%">  
					 <input type="text" class="input-small pull-left" id="txtEmail" name="txtEmail" placeholder="email addresss">    
					 <button id="btnSubNLT" name="save"  class=" btnHarn pull-left">SUBSCRIBE</button>
					</div>
					<label for="txtEmail" class="error" style="display: none;padding-left:20px"></label>
					</form>
				</div>
				</div>				
			</div>

			<div style="margin-top:10px;overflow:hidden">
				 <a href="/how-it-works"><img src="/assets/images/freeshipping-banner.png" class="BannerImage"></a>
				<div class="media-body">
				</div>
			</div>
			<?if(isset($messages['banner_link1'])){?>
			<div class="contentTitle" style="margin-left:30px">Collections:</div>	
			<div style="overflow:hidden">
				 <a href="<?=$messages['banner_link1'];?>">
				 	<img src="/uploads/banner/<?=$messages['banner_image1'];?>" class="BannerImage" style="height:255px">
				 </a>
			</div>
			<?}?>
			<?if(isset($messages['banner_link2'])){?>
			<div style="overflow:hidden">
				 <a href="<?=$messages['banner_link2'];?>">
				 	<img src="/uploads/banner/<?=$messages['banner_image2'];?>"  class="BannerImage" style="height:255px">
				 </a>
			</div>
			<?}?>
		</div>		
	</div>
