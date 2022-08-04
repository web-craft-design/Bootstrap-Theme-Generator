<?php
function getOptionsByGroupName($group) {
    $settings = get_option('bstg_general_settings');
    if (isset($settings[$group])) {
        return $settings[$group];
    } else {
        return false;
    }
}
