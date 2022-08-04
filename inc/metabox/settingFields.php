<?php

/******** CALLBACKS: *******/
function components_layout() {
    $boxes = [
        '@import "containers";' => 'Container',
        '@import "grid";' => 'Grids',
    ];


    return $boxes;
}

function components_design() {
    $boxes = [
        '@import "alert";' => 'Alert',
        '@import "badge";' => 'Badge',
        '@import "buttons";' => 'Buttons',
        '@import "button-group";' => 'Button-Groups',
        '@import "card";' => 'Cards',
        '@import "close";' => 'Close',
        '@import "dropdown";' => 'Dropdown',
        '@import "forms";' => 'Forms',
        '@import "images";' => 'Images',
        '@import "list-group";' => 'List-Group',
        '@import "nav";' => 'Nav',
        '@import "navbar";' => 'Navbar',
        '@import "pagination";' => 'Pagination',
        '@import "placeholders";' => 'Placeholders',
        '@import "popover";' => 'Popover',
        '@import "progress";' => 'Progress',
        '@import "spinners";' => 'Spinners',
        '@import "tables";' => 'Tables',
    ];


    return $boxes;
}


function components_functionality() {
    $boxes = [
        '@import "accordion";' => 'Accordion',
        '@import "carousel";' => 'Carousel',
        '@import "modal";' => 'Modal',
        '@import "offcanvas";' => 'Offcanvas',
        '@import "popover";' => 'Popover',
        '@import "toasts";' => 'Toasts',
        '@import "tooltip";' => 'Tooltip',
    ];


    return $boxes;
}






/*** REGISTER THE FIELDS! ****/

function bstg_register_setting_fields($meta_boxes) {
    $prefix = '';

    $meta_boxes[] = [
        'title'          => __('Bootstrap Settings', 'bstg'),
        'id'             => 'bstg_settingfields_colors',
        'settings_pages' => ['bstg_general_settings'],
        'class'          => 'bstg_settings',
        'fields'         => [
            [
                'id'            => $prefix . 'general_settings',
                'type'          => 'group',
                'collapsible'   => true,
                'default_state' => 'collapsed',
                'save_state'    => true,
                'group_title'   => 'General Settings',
                'class'         => 'bstg_accordion_wrapper',
                'fields'        => [
                    [
                        'name'  => __('Enqueue Bootstrap inside of Gutenberg?', 'bstg'),
                        'id'    => $prefix . 'enqueue_bs_in_gb',
                        'type'  => 'switch',
                        'style' => 'rounded',
                        'std'   => true,
                    ],
                    [
                        'name'            => __('Where to enqueue Bootstraps\' Javascript File', 'bstg'),
                        'id'              => $prefix . 'enqueue_bs_js',
                        'type'            => 'select_advanced',
                        'options'         => [
                            'backend'  => __('Gutenberg', 'bstg'),
                            'frontend' => __('Frontend', 'bstg'),
                        ],
                        'multiple'        => true,
                        'select_all_none' => true,
                        'tooltip'         => [
                            'icon'     => '',
                            'position' => 'top',
                            'content'  => 'bootstrap.min.js',
                        ],
                    ],
                ],
            ],
            [
                'id'            => $prefix . 'components',
                'type'          => 'group',
                'collapsible'   => true,
                'default_state' => 'collapsed',
                'save_state'    => true,
                'group_title'   => 'Components',
                'class'         => 'bstg_accordion_wrapper',
                'fields'        => [
                    [
                        'name'            => __('Layout', 'bstg'),
                        'id'              => $prefix . 'layout',
                        'type'            => 'checkbox_list',
                        'inline'          => true,
                        'select_all_none' => true,
                        'options' => components_layout(),
                    ],
                    [
                        'name'            => __('Design', 'bstg'),
                        'id'              => $prefix . 'design',
                        'type'            => 'checkbox_list',
                        'inline'          => true,
                        'select_all_none' => true,
                        'options' => components_design(),

                    ],
                    [
                        'name'            => __('Functionality', 'bstg'),
                        'id'              => $prefix . 'functionality',
                        'type'            => 'checkbox_list',
                        'inline'          => true,
                        'select_all_none' => true,
                        'options' => components_functionality(),

                    ],
                ],
            ],
            [
                'id'            => $prefix . 'colors',
                'type'          => 'group',
                'collapsible'   => true,
                'default_state' => 'collapsed',
                'save_state'    => true,
                'group_title'   => 'Colors',
                'class'         => 'bstg_accordion_wrapper',
                'fields'        => [
                    [
                        'name'          => __('Primary', 'bstg'),
                        'id'            => $prefix . 'primary',
                        'type'          => 'color',
                        'std'           => '#3f00b5',
                        'alpha_channel' => true,
                        'columns'       => 2,
                    ],
                    [
                        'name'          => __('Secondary', 'bstg'),
                        'id'            => $prefix . 'secondary',
                        'type'          => 'color',
                        'std'           => '#1f1f25',
                        'alpha_channel' => true,
                        'columns'       => 2,
                    ],
                    [
                        'name'    => __('White', 'bstg'),
                        'id'      => $prefix . 'white',
                        'type'    => 'color',
                        'std'     => '#FFFFFF',
                        'columns' => 2,
                        'tooltip' => [
                            'icon'     => '',
                            'position' => 'top',
                            'content'  => 'Hauptsächlich für Texte auf dunkleren Hintergründen verwendet!',
                        ],
                    ],
                    [
                        'name'          => __('Light', 'bstg'),
                        'id'            => $prefix . 'light',
                        'type'          => 'color',
                        'std'           => '#f8f9fa',
                        'alpha_channel' => true,
                        'columns'       => 2,
                        'tooltip'       => [
                            'icon'     => '',
                            'position' => 'top',
                            'content'  => 'Wird beispielsweise für hellere Hintergründe verwendet!',
                        ],
                    ],
                    [
                        'name'          => __('Dark', 'bstg'),
                        'id'            => $prefix . 'dark',
                        'type'          => 'color',
                        'std'           => '#343a40',
                        'alpha_channel' => true,
                        'columns'       => 2,
                    ],
                    [
                        'name'          => __('Warning', 'bstg'),
                        'id'            => $prefix . 'warning',
                        'type'          => 'color',
                        'std'           => '#ffc107',
                        'alpha_channel' => true,
                        'columns'       => 2,
                    ],
                    [
                        'name'          => __('Success', 'bstg'),
                        'id'            => $prefix . 'success',
                        'type'          => 'color',
                        'std'           => '#28a745',
                        'alpha_channel' => true,
                        'columns'       => 2,
                    ],
                    [
                        'name'          => __('Danger', 'bstg'),
                        'id'            => $prefix . 'danger',
                        'type'          => 'color',
                        'std'           => '#dc3545',
                        'alpha_channel' => true,
                        'columns'       => 2,
                    ],
                    [
                        'name'          => __('Info', 'bstg'),
                        'id'            => $prefix . 'info',
                        'type'          => 'color',
                        'std'           => '#17a2b8',
                        'alpha_channel' => true,
                        'columns'       => 2,
                    ],
                ],
            ],
            [
                'id'      => $prefix . 'submit_button',
                'type'    => 'custom_html',
                'std'     => '<input type="submit" name="submit" id="submit" class="btn ptn-primary" value="Save Settings"  />',
                'columns' => 6,
                'class'   => 'custom-submit',
            ],
        ],
    ];

    return $meta_boxes;
}
