

function init_masonry(gutter){	
    var $container = $('#content');

    //var gutter = 12;
    var min_width = 225;
    var max_width = 240;
    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector : '.box',
            gutterWidth: gutter,
            isAnimated: true,
              columnWidth: function( containerWidth ) {
              	
                var num_of_boxes = (containerWidth/min_width | 0);

                var box_width = (((containerWidth - (num_of_boxes-1)*gutter)/num_of_boxes) | 0) ;
/*
                if (containerWidth < min_width) {
                    box_width = containerWidth;
                }
            	if (box_width > max_width) {
                    box_width = max_width;
                }            	
*/
                $('.box').width(box_width);

                return box_width;
              }
        });
    });
}