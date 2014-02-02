
function init_masonry(){	
    /*
    var $container = $('#content');    

    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector : '.box',
            gutterWidth: 40,
            isAnimated: true,            
            columnWidth: 30
        });
    });
    */
    var $container = $('#content');
    var gutter = 40;
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
                $('.box').width(box_width);
                return box_width;
              }
        });
        $('.box').animate({'opacity': 1}, 1000);
    });  
}
function loadfeatured(data){    
    $('#main_content').html(data);
    var $container = $('#content');
    //console.log($(window).width());
    if( ($(window).width()) < 1025){
        if( ($(window).width()) < 926){    
            var gutter=9;
            /*
            if( ($(window).width()) < 769){    
          
            }else{
                var gutter=95;
            }
            */
        }else{
            var gutter=12;
        } 
    }else{
        var gutter = 40;
    }
    //console.log($(window).width());
    //console.log(gutter);
    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector : '.box',
            gutterWidth: gutter,
            isAnimated: true,
            columnWidth:240
        });
        $('.box').animate({'opacity': 1}, 1000);
    });    
    
}
function loadartwork(data){    
    $('#main_content').html(data);
    $('#outputTotalArtworks').html($('#totalArtworks').val());
    init_masonry();
}
function loadloader () {
    $('#main_content').html('<div class="loader"><div style="margin: -25px; padding-top: 35px; width: 200px;">Retrieving art…</div></div>');
}

function loadIIALoader(){
    $('#iia_artists').html('<div class="loader"><div style="margin: -25px; padding-top: 35px; width: 200px;">Retrieving art…</div></div>');   
}
function loadInvestInArt(data){
    $('#iia_artists').html(data);
}
function searchArtwork(){
    searchStr=$('#txtSearch').val();
    JSON.stringify(searchStr).replace(/&/, "&amp;").replace(/"/g, "&quot;")
    $.ajax({
        type: 'POST',
        url: "/members/search",
        data: { searchStr: searchStr},
        success: function(res){
            $('#harn_content').html(res);
            init_masonry(40);
        }
    });
}
function loadfav_art(){
    loadloader();
    $.ajax({
        type: 'POST',
        url: '/members/profile/getfavart/'
        }).done(function(data) {       
            loadartwork(data);
    });
}
function loadfav_artist(){
    loadloader();
    $.ajax({
        type: 'POST',
        url: '/members/profile/getfavartist/'
        }).done(function(data) {       
            loadartwork(data);
    });
}
function browse_art(sortType){
    $('.btnArtworkSort').attr('functionCall','browse_art');
    $('.btnArtworkSort').attr('sortType',sortType);    
    sortText=$('.btnArtworkSort .dropdown-menu li a[value="'+sortType+'"]').html();
    $('.btnArtworkSort .firstbtn').html(sortText);    
    $.ajax({
        type: 'POST',
        url: '/members/profile/getArtworks/all'
    }).done(function(data) {       
        loadartwork(data);
    });
}
function ajaxArtwork(artworkType,sortType,searchStr){
    searchStr = typeof searchStr !== 'undefined' ? searchStr : '';
    $('#txtSearch').val(searchStr);
    data='';
    switch(artworkType){
        case 'browse_art':
            //url = '/members/profile/getArtworks/all/'+sortType;
            url= '/members/browseart_search';
            category=$('#ctlCategory').val();
            price=$('#ctlPrice').val();
            medium=$('#ctlMedium').val();
            or=$('#ctlOrientation').val();
            style=$('#ctlStyle').val();
            subject=$('#ctlSubject').val();
            size=$('#ctlSize').val();
            color=$('#ctlColor').val();
            loc=$('#ctlLocation').val();
            data= {
                category:category,
                price:price,
                medium:medium,
                orientation:or,
                style:style,
                subject:subject,
                size:size,
                color:color,
                loc:loc,
                searchStr:searchStr,
                sortType:sortType
            }
        break;
        case 'new_this_week':
            url = '/members/profile/getArtworks/newthisweek/'+sortType;
        break;
        case 'under500':
            url = '/members/profile/getArtworks/under500/'+sortType;
        break;
        case 'staff_favourite':
            url = '/members/profile/getArtworks/stafffavourites/'+sortType;
        break;
        case 'most_popular':
            url = '/members/profile/getArtworks/popular/'+sortType;
        break; 
        case 'myart':
            url = '/members/profile/getArtworks/myart/'+sortType;
        break;        
        default:
            url = '/members/profile/getArtworks/all/'+sortType;
    }
    $('.btnArtworkSort').attr('artworkType',artworkType);
    $('.btnArtworkSort').attr('sortType',sortType);    
    sortText=$('.btnArtworkSort .dropdown-menu li a[value="'+sortType+'"]').html();
    $('.btnArtworkSort .firstbtn').html(sortText);    
    loadloader();
    $.ajax({
        type: 'POST',
        url: url,
        data:data
    }).done(function(data) {       
        loadartwork(data);
    });    
}
    function getInternetExplorerVersion(){
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer'){
            var ua = navigator.userAgent;
            var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
            rv = parseFloat( RegExp.$1 );
        }
        else if (navigator.appName == 'Netscape'){
            var ua = navigator.userAgent;
            var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
            rv = parseFloat( RegExp.$1 );
        }
        return rv;
    };
        function grayscaleIE10(src){
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var imgObj = new Image();
            imgObj.src = src;
            canvas.width = imgObj.width;
            canvas.height = imgObj.height; 
            ctx.drawImage(imgObj, 0, 0); 
            var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
            for(var y = 0; y < imgPixels.height; y++){
                for(var x = 0; x < imgPixels.width; x++){
                    var i = (y * 4) * imgPixels.width + x * 4;
                    var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
                    imgPixels.data[i] = avg; 
                    imgPixels.data[i + 1] = avg; 
                    imgPixels.data[i + 2] = avg;
                }
            }
            ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
            return canvas.toDataURL();
        };


$(function () {
    $('.fav_artist_link').click(function(){
        followed=$(this).attr('followed');
        artist_id=$(this).attr('artist_id');
        if(followed==1){
            url='/members/deleteFavouriteArtist/'+artist_id;
            $(this).html("Follow this artist");
            $(this).attr('followed',0);                        
        }else{
            url='/members/addFavouriteArtist/'+artist_id;
            $(this).html("Unfollow this artist");
            $(this).attr('followed',1);
        }
        $.ajax({
            type: 'POST',
            url: url,
            success: function(res){
            
            }
        });                
    });
    $('#addFavButtProfileItem').click(function(event){
        artwork_id=$(this).attr('artwork_id');
        
        $i=$(this).find('i');        
        $span=$(this).find('span');        
        if($i.hasClass('addToFavGreyHeart')){        
            $span.html('Added to Favourites!');
            $i.removeClass('addToFavGreyHeart').addClass('addToFavRedHeart');
            url='/members/addFavouriteArt/'+artwork_id;                    
        }else{
            url='/members/deleteFavouriteArt/'+artwork_id;        
            $span.html('Add to favourites');
            $i.removeClass('addToFavRedHeart').addClass('addToFavGreyHeart');
        }
        $.ajax({
                type: 'POST',
                url: url,
                success: function(res){
                
                }
            });
        
    });
    $('#btnSearchArt').click(function(event){  
        category=$('#ctlCategory').val();
        price=$('#ctlPrice').val();
        medium=$('#ctlMedium').val();
        or=$('#ctlOrientation').val();
        style=$('#ctlStyle').val();
        subject=$('#ctlSubject').val();
        size=$('#ctlSize').val();
        color=$('#ctlColor').val();
        loc=$('#ctlLocation').val();
        $('#txtSearch').val('');
        searchStr=$('#txtSearch').val();        
        loadloader();
        $.ajax({
            type: 'POST',
            url: '/members/browseart_search',
            data: {
                category:category,
                price:price,
                medium:medium,
                orientation:or,
                style:style,
                subject:subject,
                size:size,
                searchStr:searchStr,
                color:color,
                loc:loc
            }
         }).done(function(data) {    
            $('#browseArtTitle').html("Search results:");   
            loadartwork(data);
        });        
    });
/*
    $('#btnSearchArtwork').click(function(event){
        event.preventDefault();       
        //searchArtwork();
        ajaxArtwork()
    });
        
    $('#searchForm').submit(function(event){
        searchArtwork();
        event.preventDefault();
    });
*/
    $('.captcha_div').click(function(){
        var $this=$(this);
        $.ajax({
                type: 'POST',
                url: '/home/getCaptchaImage'
         }).done(function(data) {       
            $this.html(data);
        });
    });     
    $('.btnArtworkSort .dropdown-menu li a').click(function(event){
        $parent=$(this).parent().parent().parent();
        artworkType=$parent.attr('artworkType');
        sortType=$parent.attr('sortType');
        currSort=$(this).attr('value');
        searchStr=$('#txtSearch').val();
        ajaxArtwork(artworkType,currSort,searchStr);
        event.preventDefault();
    });          
    $('#RegisterModal').on('show.bs.modal', function() {            
        $.ajax({
            type: 'POST',
            url: '/home/getCaptchaImage'
        }).done(function(data) {       
            $('#RegistrationCaptcha').html(data);
        });
    });
    /*
    $('#LogoutButton').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/members/logout',
            success: function(res){
                window.location = window.location.href;
            }
        });   
    });
    */
    $('#collector_sell_upload').click(function(){
        $('#AlertModal_Title').html("Artist’s account");
        $('#AlertModal_Message').html('Please open an Artist’s account to be able to sell / upload art.');
        $('#AlertModal').modal('show');   
     }); 


            
});