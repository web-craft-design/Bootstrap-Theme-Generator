<?php
//enqueue bootstrap in Gutenberg
add_action('enqueue_block_editor_assets', function () {
    $bstg = new HelperFunctions;

    $settings = $bstg->getOptionsByGroupName('general_settings');
    if ($settings['enqueue_bs_in_gb']){
        wp_enqueue_style('bootstrap');
        wp_enqueue_script('bootstrapJS');
    }
}, 99);
