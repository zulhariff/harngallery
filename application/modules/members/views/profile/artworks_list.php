<?php 
foreach ($artworks as $artwork) {
?>
<a href="/members/profile/item/<?=$artwork->id;?>">
<img src="<?=config_item('upload_url').$artwork->user_id."/artwork/thumbnail/".$artwork->image; ?>" style="padding-top:2px;width:120px;">
</a>
<?php } 
?>