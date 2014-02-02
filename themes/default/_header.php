<?php
/*    Assets::add_js( 'bootstrap.min.js' );
    Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'bootstrap-lightbox.css','style.css'));

    $inline  = '$(".dropdown-toggle").dropdown();';
    $inline .= '$(".tooltips").tooltip();';

    Assets::add_js( $inline, 'inline' );
    */
?>
<!doctype html>
<head>
    <meta charset="utf-8">

    <title><?php echo isset($page_title) ? $page_title : 'Harngallery.com Online Art Gallery'; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($meta_desc) ? $meta_desc: isset($meta_desc) ? $meta_desc : 'Harngallery.com Online Art Gallery'; ?>">
    <meta name="keywords" content="<?php echo isset($meta_keywords) ? $meta_keywords: 'buy art, buy art online, art gallery, art for sale, affordable art, artwork for sale, online art gallery'; ?>" >
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title : 'Harngallery.com Online Art Gallery'; ?>"/>
    <meta property="og:image" content="<?php echo isset($page_image) ? $page_image : 'http://www.harngallery.com/assets/images/favicon.png'; ?>"/>
    <meta property="og:description" content="<?php echo isset($meta_desc) ? $meta_desc: isset($meta_desc) ? $meta_desc : 'Harngallery.com Online Art Gallery'; ?>"/>

    <?php echo Assets::css(); ?>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">    
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=239174479539920";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
