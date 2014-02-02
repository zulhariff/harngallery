<style>
.collections-ui {
    border-radius: 4px;
    position: absolute;
    right: 2px;
    top: 2px;
    /*visibility: hidden;*/
}
.collections-ui .btn-fave, .collections-ui .btn-collect {
    background: none repeat scroll 0 0 padding-box #FFFFFF;
    border-color: rgba(0, 0, 0, 0.15);
    float: left;
    height: 25px;
    line-height: 23px;
    padding: 0;
    width: 26px;
    z-index: 2;
}
.btn-fave, .btn-collect {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: -moz-linear-gradient(center top , #FFFFFF 0px, #FDFDFC 4%, #F3F3F2 11%, #F3F3F2 95%, #E9E9E8 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-color: #DDDAD6 #D8D5D2 #CDC9C6;
    border-image: none;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px;
    color: #5A5552;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    height: 25px;
    line-height: 23px;
    margin: 0;
    outline: 0 none;
    padding: 0 9px 0 30px;
    position: relative;
    text-shadow: 0 1px 0 #FFFFFF;
}
.btn-fave .icon, .btn-collect .icon, .btn-dropdown .icon-dropdown {
    background: url("/assets/images/sprites-v2.20131106185931.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    display: block;
    height: 16px;
    left: 7px;
    overflow: hidden;
    position: absolute;
    text-indent: -1000px;
    top: 4px;
    width: 16px;
}
.btn-fave .icon {
    top: 5px;
    left:4px;    
}
.btn-favourited{
background-position:-15px center !important;	
}

.collections-ui .btn-fave .default, .collections-ui .btn-fave .done, .collections-ui .btn-collect .default, .collections-ui .btn-collect .done {
    display: none;
}
.hovercard{display:none;}

</style>

<div id="content">
<?php 
$countries = config_item('address.countries');
if(count($artworks)==0){
    if (isset($f_art_flag)){ 
        echo 'Your favorite list is empty.';
    }else{
        if(isset($my_art_flag) && $my_art_flag){
            echo "You have not uploaded any artwork yet";
        }else{
            echo "No artwork found. Please start a new search.";
        }
    }
}else{
foreach ($artworks as $artwork) {
?>
<div class="box" data-hovercard="<?$artwork->id;?>">
	<a href="/members/profile/item/<?=$artwork->id;?>" class="artwork_thumb"><img src="<?=config_item('upload_url').$artwork->user_id."/artwork/thumbnail/".$artwork->image; ?>"></a>
<div class="hide-link hovercard">
    <div class="collections-ui">
        <div data-artwork-id="<?=$artwork->id;?>" class="favorite-container">           
            <button class="btn-fave inline-overlay-trigger btn-fave-action" type="button" <?php if(!$logged_in){ ?>  href="#LoginModal"  class="btn btn-default" role="button" data-toggle="modal" <?php } ?> >
                <span class="icon <?=(in_array($artwork->id, $f_art))?'btn-favourited':'';?>"></span>
            </button>
        </div>
    </div>
    
</div>

	<p class="art-title"><?=$artwork->title;?></p>
	<p class="art-price">$<?=$artwork->price;?></p>
	<p class="artist-name"><?=$artwork->firstname." ".$artwork->lastname;?></p>
	<p class="artist-country"> <?=$countries[$artwork->country]['printable'];?></p>
    <?php if(isset($my_art_flag) && $my_art_flag){ ?>
    <p class="artist-name"><a href="/members/artist/edit_art/<?=$artwork->id;?>">Edit</a></p>
    <p class="artist-name"><a href="javascript:void(0)" class="lnk_artwork" artwork_id="<?=$artwork->id;?>" action="delete">Delete</a></p>
    <?php } ?>
</div>
<?php } 
}
?>
</div>
<input type="hidden" id="totalArtworks" value="<?=$totalArtworks;?>">
<?if(isset($featured_art_flag)) { ?>
<div style="float:right"><a href="/browse-art">Browse more Art</a></div>
<?php }else { ?>
<?php echo $links; ?>
<?php } ?>
<script>
$('#pagination-div-id a').click(function(){
	if($(this).attr('href')=="javascript:void(0)")
		return false;
	loadloader();	
	$.ajax({
		type: 'POST',
		url: $(this).attr('href'),
        <?php if(isset($search)){ ?>
        data: {
                category:'<?=$search['category'];?>',
                price:'<?=$search['price'];?>',
                medium:'<?=$search['medium'];?>',
                orientation:'<?=$search['orientation'];?>',
                style:'<?=$search['style'];?>',
                subject:'<?=$search['subject'];?>',
                size:'<?=$search['size'];?>',
                color:'<?=$search['color'];?>',
                loc:'<?=$search['location'];?>',
                searchStr:'<?=$search['searchStr'];?>',
                sortType:'<?=$search['sortType'];?>'
            },
        <?php } ?>
		success: function(res){
			loadartwork(res);
		}
	});
	return false;
});
$('.lnk_artwork').click(function() {
    artwork_id=$(this).attr("artwork_id");
    url="/members/profile/deleteArtwork";
    if(confirm("Are you sure you want to delete your Artwork?")){
        $.ajax({
            type: 'POST',
            url: url,
            data:{artwork_id:artwork_id},
            success: function(res){
                loadloader();
                ajaxArtwork('myart',1);
            }
        });  
    }
});
$('.btn-fave').click(function(){
	var $span_bnt= $(this).find('span');
	var artwork_id=$(this).parent().attr('data-artwork-id');
    var $parent=$(this).parent().parent().parent().parent();
	if($span_bnt.hasClass('btn-favourited')){
		url='/members/deleteFavouriteArt/'+artwork_id
		action='delete';
        $span_bnt.removeClass('btn-favourited');
        <?php if (isset($f_art_flag)){ ?>
            $parent.removeClass('box');
            $parent.html("<div class='loader-bert'></div>");
        <?}?>    
	}else{
		url='members/addFavouriteArt/'+artwork_id;
		action='add';
        $span_bnt.addClass('btn-favourited');
	}
	$.ajax({
		type: 'POST',
		url: url,		
		success: function(res){
			<?php if (isset($f_art_flag)){ ?>
                    loadfav_art();
            <?}?>

		}
	});	
});
//$(function () { });
    $('.hovercard').hover(function() {
        $(this).stop(true, false).show();
    }, function() {
        $('.hovercard').hide();
    });
    $('.box').hover(function() {
        $(this).find('.hovercard').delay(100).fadeIn(); // show() doesn't seem to work with delay
    }, function() {
        $(this).find('.hovercard').delay(500).fadeOut('fast');
    });

</script>
