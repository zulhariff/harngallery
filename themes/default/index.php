
<?php echo theme_view('_header'); ?>

<div id="main-container"> <!-- Start of Main Container -->

    <?php echo theme_view('_sitenav'); ?>

    <?php
        echo Template::message();
        echo isset($content) ? $content : Template::content();
    ?>

<?php echo theme_view('_footer'); ?>

<?php //echo Template::block('registration_modal'); ?>
<?php echo theme_view('registration_modal'); ?>
<?php echo theme_view('login_modal'); ?>
<?php echo theme_view('forgetpassword_modal'); ?>
<?php echo theme_view('alert_modal'); ?>
<?php
        echo Template::stats(); ?>