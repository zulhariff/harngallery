<div id="content">
<?php 
$countries = config_item('address.countries');
if(count($artworks)==0){
	echo 'No Artwork Found. Please start a new search.';
}else{
foreach ($artworks as $artwork) {
?>
<div class="box">
	<a href="/members/profile/item/<?=$artwork->id;?>"><img src="<?=config_item('upload_url').$artwork->user_id."/artwork/thumbnail/".$artwork->image; ?>"></a>
	<p class="art-title"><?=$artwork->title;?></p>
	<p class="art-price">$<?=$artwork->price;?></p>
	<p class="artist-name"><?=$artwork->firstname." ".$artwork->lastname;?></p>
	<p class="artist-country"> <?=$countries[$artwork->country]['printable'];?></p>
</div>
<?php } 
}
?>
</div>
<input type="hidden" id="totalArtworks" value="<?=$totalArtworks;?>">
<?php echo $links; ?>
<script>
$('#pagination-div-id a').click(function(){
	loadloader();
	$.ajax({
		type: 'POST',
		url: $(this).attr('href'),
		success: function(res){
			$('#harn_content').html(res);
            init_masonry(40);
		}
	});
	return false;
});
</script>