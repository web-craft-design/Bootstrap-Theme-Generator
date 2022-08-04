<?php

function bstg_register_general_settings($settings_pages) {
    $settings_pages[] = [
        'menu_title'    => __('BS-Settings', 'bstg'),
        'id'            => 'bstg_general_settings',
        'option_name'   => 'bstg_general_settings',
        'position'      => 0,
        'parent'        => 'themes.php',
        'style'         => 'no-boxes',
        'columns'       => 1,
        'submit_button' => __('Änderungen Speichern', 'bstg'),
        'message'       => __('Änderungen erfolgreich gespeichert!', 'bstg'),
        'icon_url'      => 'dashicons-admin-generic',
    ];

    return $settings_pages;
}
