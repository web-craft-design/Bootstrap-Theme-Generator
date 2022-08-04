<?php

function get_components_imports() {

    $components = getOptionsByGroupName('components');
    if (isset($components['_state'])) unset($components['_state']);

    $string = '';
    foreach ($components as $component) {

        foreach ($component as $import) {
            $string .= $import;
        }
    }
    return $string;
}


function get_color_pairs() {
    $colors = getOptionsByGroupName('colors');


    // if no colors are set return, so the default values will apply then!
    if (!$colors) return;

    $string = '';
    foreach ($colors as $key => $value) {
        $string .= "
        \${$key} : {$value};\n
        ";
    }
    return $string;
}
