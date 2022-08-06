<?php
//FRONTEND STYLES:
add_action('wp_enqueue_scripts', function () {
    $bstg = new HelperFunctions;

    $settings = $bstg->getOptionsByGroupName('general_settings');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('gutenberg-bs-styles');

    if (!isset($settings['enqueue_bs_js'])) return;

    foreach ($settings['enqueue_bs_js'] as $option) {
        if ($option == 'frontend') wp_enqueue_script('bootstrapJS');
    }
});
