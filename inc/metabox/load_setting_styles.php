<?php

add_action('admin_init', function () {

    //require_once(BSTG_PLUGINPATH . 'inc/metabox/mbCallbacks.php');
    autoLoad(BSTG_PLUGINPATH . 'functionality');

    // REGISTER SETTING-STYLES:
    isset($_GET['page']) ? $location = $_GET['page'] : $location = false;


    if ($location == 'bstg_general_settings') {
        add_action('admin_head', function () {
            wp_enqueue_style('settingStyles');
        }, 9999);
        wp_enqueue_style('bootstrap');
    }
});
