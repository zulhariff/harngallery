$
(function () {
	$.ajax({
        type: "POST",
        url: "/members/profile/artworks/1"
    }).done(function(data) {       
		$('#content').html(data);
		init_masonry(40);
	});
});
      