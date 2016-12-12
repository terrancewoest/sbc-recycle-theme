<?php
function sbc_meta() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
}
add_action('wp_head', 'sbc_meta', 1);