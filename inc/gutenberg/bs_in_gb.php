<?php
//enqueue bootstrap in Gutenberg
add_action('enqueue_block_editor_assets', function () {
    $bstg = new HelperFunctions;

    $settings = $bstg->getOptionsByGroupName('general_settings');
    if ($settings['enqueue_bs_in_gb']) wp_enqueue_style('bootstrap');

    if (!isset($settings['enqueue_bs_js'])) return;

    foreach ($settings['enqueue_bs_js'] as $option) {
        if ($option == 'backend') wp_enqueue_script('bootstrapJS');
    }
}, 999999);
