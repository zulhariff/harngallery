
<div  id="harn_content">	
	<ul class="breadcrumb">
		<li>
			<a href="/">Home</a> <span class="divider">></span>
		</li>
		<li>	
			<a href="/browse-art">Browse Art</a><span class="divider">></span>			
		</li>
		<li>	
			<a href="/members/profile/portfolio/<?=$artwork->user_id;?>"><?=$artwork->firstname." ".$artwork->lastname;?></a><span class="divider">></span>			
		</li>				
		<li class="active">
			<?=$artwork->title;?>
		</li>				
	</ul>	
<div class="row-fluid">
	<div class="span6" id="profile_item_right_panel">					
    	<div id="LBox" class="lightbox hide fade" tabindex="-1" role="dialog" aria-hidden="true">
    		<div class='lightbox-content'>
    			<img src="<?=config_item('upload_url').$artwork->user_id."/artwork/".$artwork->image;?>" style="max-height:770px">
    			<div class="lightbox-caption"><p><?=$artwork->title;?></p></div>
    		</div>
    	</div>
		<a data-toggle="lightbox" href="#LBox">
			<img src="<?=config_item('upload_url').$artwork->user_id."/artwork/medium/".$artwork->image;?>" style="width:98%">
		</a>
		<div style="padding:10px">
			<?php include 'social-media.php' ?>
			<?php if($members){ ?>
				<?php if(!$f_art_flag){ ?>
				<div id="addFavButtProfileItem" artwork_id="<?=$artwork->id;?>"><i class="addToFavGreyHeart"></i> <span>Add to Favourites</span></div>
				<?php }else{ ?>
				<div id="addFavButtProfileItem" artwork_id="<?=$artwork->id;?>"><i class="addToFavRedHeart"></i> <span>Added to favourites!</span></div>
				<?php } ?>
			<?php } else{ ?>	            
				<div id="addFavButtProfileItemLogin"><i class="addToFavGreyHeart"></i>
            	<a id="addFavButtProfileItemLoginA" href="#LoginModal" role="button" data-toggle="modal">Add to Favourites</a>
            	 </div>
            <?php } ?>
		</div>
	</div>
	<div class="span6" id="itemPanel">
		<?php $countries = config_item('address.countries'); ?>
		<div class="row">
			<h3 style="margin:0;padding:0;color:#333333"><?=$artwork->title;?></h3>
			<p style="margin:0 0 30px;color:#333333">by 
				<a href="/members/profile/portfolio/<?=$artwork->user_id;?>"><?=$artwork->firstname." ".$artwork->lastname;?></a>, <?=$countries[$artwork->country]['printable'];?>, <?=substr($artwork->created, 0,4); ?></p>
			<p style="margin:0;color:#333333"><?=$artwork->category;?>, <?=$artwork->medium;?>, <?=$artwork->framing?'F':'Unf';?>ramed</p>
			<p style="margin:0;color:#333333">Size <?=$artwork->height;?> x <?=$artwork->width;?> <?=$artwork->dimension_unit==1?'cm':'in';?></p>			
			<p style="margin:0;color:#333333">Shipping : <?=($artwork->ship_type==1)?'Worldwide':$countries[$artwork->country]['printable'];?></p>
			<h3 style="color:#333333">$<?=$artwork->price;?></h3>
				<div class="pull-left">		
	          		<?php if ($artwork->sold){ ?>
	          			<span style="height:22px;cursor:default" class="btnHarn">SOLD</span>     
	          		<?php }else{ ?>
	          			<?php if($members['type']==1){ ?>
		          			<a href="javascript:void(0)" id="artist_purchase" class="btnHarn" role="button">PURCHASE</a>     
	          			<?php }else{ ?>
		          			<a href="/members/cart/insert_link_item_to_cart/<?=$artwork->id;?>" class="btnHarn" role="button">PURCHASE</a>     
	          			<?php } ?>
	          		<?php } ?>
	          		
				</div>
			</div>
			<div class="row" style="padding:20px 0">
				<div style="padding-right:10px" class="span12">
					<p style="margin:0;color:#333333"><strong>About the Artist</strong></p>
					<div style="color:#333333;margin-bottom:0">
					<div style="float: right;margin: 0 0 1em 1em;">
						<img class="artist_photo" src="<?=config_item('upload_url').$artwork->user_id."/registration/profile_photo/".$artwork->member_photo; ?>" />
					</div>
					<?=substr($artwork->about, 0,390)."...";?></div>		
					<a href="/members/profile/portfolio/<?=$artwork->user_id;?>">View Profile</a>									
				</div>									
				
				<?php if ($artwork->description) { ?>
					<div style="margin:0;width:100%;padding-top:10px" class="span12">
					<p style="margin:0;color:#333333"><strong>About the Artwork</strong></p>
					<article style="color:#333333"><?=$artwork->description;?></article>
					</div>
				<?php } ?>
			</div>
			<?php if($curator_flag){ ?>
			<div class="row" style="padding:35px 0">
				<div>
					<p style="margin:0;color:#333333"><strong>Curator's Review</strong></p>
					<article style="color:#333333">
						<div style="float: right;margin: 0 0 1em 1em;">
							<img class="artist_photo" src="<?=config_item('upload_url');?>/curator/profile_photo/<?=$curator->photo; ?>" />
						</div>						
						<?=$curator->review;?>
					</article>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12" style="margin-top:20px">
		<strong style="color:#000000">More from <?=$artwork->firstname." ".$artwork->lastname;?></strong> - 
		<a href="/members/profile/portfolio/<?=$artwork->user_id;?>">View Portfolio</a>
		</div>
		<div class="span12" id="item_list">

		</div>
	</div>	           
	</div>	