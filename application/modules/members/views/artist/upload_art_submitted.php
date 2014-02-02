

		<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a> <span class="divider">></span>
				</li>
				<li class="active">
					My Account	
				</li>								
			</ul>	
<h4 style="color:#333333">My Account</h4>

<a href="/members/upload_art">Upload Art</a> / 
<a href="/members/my_art">My Art</a> / 
<a href="/members/sales">Sales</a> / 
<a href="/members/profile">Account Information - Profile</a> /
<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a>
<br /><br />
<h4 style="color:#333333">Upload Art</h4>
<div class="row-fluid">
	<div class="span12">
        <?=$message;?>
        <br />
        <?php if($curator): ?>
            Curator's Review $49    
            <div style="padding-top:10px">
                <form action="<?=$config['paypal_url'];?>" method="post">
                <input type="hidden" name="artwork_id" id="artwork_id" value="<?=$artwork_id;?>">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="<?=$config['hosted_button_id'];?>">
                <input name="notify_url" value="http://www.harngallery.com/members/artist/addCurator/<?=$artwork_id;?>" type="hidden">
                <input name="return"  type="hidden"  value="http://www.harngallery.com/members/artist/add_curator">
                <input name="image_url" type="hidden" value="http://www.harngallery.com/assets/images/logo.png">                
                <button name="save"  class="btnHarn pull-left" type="submit">
                    PAY NOW</button>              
            </div>  
        <?php endif;?>
	</div>
</div>