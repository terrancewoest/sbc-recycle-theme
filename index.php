<!DOCTYPE html>
<html>
<head>
    <title>SBC Recycle</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php do_action('sbc_before_site'); ?>
<!-- Begin SBC Site -->
<div class="Site" id="SBC">

    <?php do_action('sbc_before_site_wrapper');?>
    <!-- Begin Site Wrapper -->
    <div class="Site__wrapper">

        <?php
        do_action('sbc_before_header');
        get_header();
        do_action('sbc_after_header');
        ?>

        <!-- Begin Content -->
        <main class="Content">
            <p>Here is the content.</p>
            <?php
            do_action('sbc_before_content_inner');
            do_action('sbc_content_inner');
            do_action('sbc_after_content_inner');
            ?>

        </main>
        <!-- End Content -->

        <?php
        do_action('sbc_before_footer');
        get_footer();
        do_action('sbc_after_footer');
        ?>

    </div>
    <!-- End SBC Site Wrapper -->
    <?php do_action('sbc_after_site_wrapper'); ?>

</div>
<!-- End SBC Site -->
<?php do_action('sbc_after_site'); ?>

<?php wp_footer(); ?>
</body>
</html>