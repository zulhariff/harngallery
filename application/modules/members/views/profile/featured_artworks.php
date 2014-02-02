<div id="content">
<?php 
$countries = config_item('address.countries');
foreach ($artworks as $artwork) {
?>
<div class="box-hp">
	<a href="/members/profile/item/<?=$artwork->id;?>"><img src="<?=config_item('upload_url').$artwork->user_id."/artwork/thumbnail/".$artwork->image; ?>"></a>
	<p class="art-title"><?=$artwork->title;?></p>
	<p class="art-price">$<?=$artwork->price;?></p>
	<p class="artist-name"><?=$artwork->firstname." ".$artwork->lastname;?></p>
	<p class="artist-country"> <?=$countries[$artwork->country]['printable'];?></p>
</div>
<?php } 
?>
</div>
<div style="float:right"><a href="/browse-art">Browse more Art</a></div>


