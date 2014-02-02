	<ul class="breadcrumb">
		<li>
			<a href="/">Home</a><span class="divider">></span>
		</li>
		<li class="active">Profile - Portfolio</a></li>				
	</ul>	

<div id="harn_content">
	<div class="row-fluid">
		<div class="span12">
			<h4 style="color:#000000"><?= $member->firstname.' '.$member->lastname; ?></h5>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<h4 style="color:#000000">About</h5>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4" style="width:auto;" id="divArtistPhoto">	
			<img class="artist_photo" src="<?=config_item('upload_url').$member->id."/registration/profile_photo/".$member->photo; ?>" />
		</div>
		<div class="" style="margin-left:10px;display:block;float:left" id="divArtistAbout">
		    <div style="color:#333333;">																	
	            	<?php $countries = config_item('address.countries'); ?>            	            	
	                <article>
	                	<b>Location : <?=$countries[$member->country]['printable'];?></b><br />
	                	<?= nl2br($member->about); ?></article>
	            
            </div>            		
            <div>
            	<?php if($members){ ?>
	            	<?php if($fav_artist){ ?>
	            		<a class="fav_artist_link" followed="1" artist_id="<?=$member->id;?>">Unfollow the Artist</a>	
	            	<? }else{ ?>
	            	<a class="fav_artist_link" followed="0" artist_id="<?=$member->id;?>">Follow the Artist</a>	
	            	<? } ?>	            
	            <?php } else{ ?>	            
            		<a href="#LoginModal" role="button" data-toggle="modal">Follow the Artist</a>
            	<?php } ?>
            	<?php if ($member->commission==1){ ?>
            	<a href="/contact-us" style="padding-left:40px;padding-right:20px">Commission the Artist</a>	
            	<?php } ?>
            	
            </div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12" style="margin-top:10px">
			<h4 style="color:#000000">Art</h5>
		</div>
	</div>
    <div class="row-fluid">
        <div class="span12">            
            <div id="main_content" style="top:-10px" >                                   
            </div>
        </div>
    </div>
</div>
