<?php 



// Flushing Rewrite on Activation 

function fa_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fa_rewrite_flush' );






?>