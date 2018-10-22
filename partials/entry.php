<?php
// First filter all of the different classes.
$entry_class = apply_filters('sbc_entry_class', 'Entry');

?>
<div class="<?php echo $entry_class; ?>">

    <?php if (has_action('sbc_entry_header')): ?>
    <div class="Entry__header">
        <?php do_action('sbc_entry_header'); ?>
    </div>
    <?php endif; ?>

    <?php if (has_action('sbc_entry_content')): ?>
    <div class="Entry__content">
        <?php do_action('sbc_entry_content'); ?>
    </div>
    <?php endif; ?>

    <?php if (has_action('sbc_entry_footer')): ?>
    <div class="Entry__footer">
        <?php do_action('sbc_entry_footer'); ?>
    </div>
    <?php endif; ?>

</div>