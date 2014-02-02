<style>
.iia {margin:0 !important;}
.iia li{ 
	list-style-type: none;
 	background-color: #FFFFFF;
    border: 1px solid #ECECEC;
    float: left;
    min-height: 400px;
    margin: 0 8px 14px 0;
    padding: 6px;
    position: relative;
    width: 47%;
} 
</style>
	<ul class="iia">
		<?php foreach ($artists as $artist) { ?>
		<li>
			<div style="padding:5px;">
			<a href="/members/profile/portfolio/<?=$artist->id;?>">
				<img src="http://www.harngallery.com/uploads/invest_in_art/<?=$artist->iia_photo;?>">
			</a>
			</div>
			<div style="padding:5px;">
			<?=$artist->iia_desc;;?>
			</div>
		</li>
		<?php } ?>		
	</ul>
<?php echo $links; ?>
<script>
$('#pagination-div-id a').click(function(){
	loadIIALoader();
	$.ajax({
		type: 'POST',
		url: $(this).attr('href'),
		success: function(res){
			loadInvestInArt(res);
		}
	});
	return false;
});
</script>