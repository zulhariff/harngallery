<?php echo theme_view('_header'); ?>
<div class="container">
 <?php echo theme_view('_sitenav'); ?>
	    <?php
        echo Template::message();
        echo isset($content) ? $content : Template::content();
    ?>

</div>

<?php echo theme_view('_footer'); ?>