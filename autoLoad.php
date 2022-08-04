<?php

function autoLoad($path) {
    $path .= '/';

    $files = scandir($path);

    foreach ($files as $file) {
        //Prüfung ob es sich um einen Ordner handelt
        if (is_dir($path . $file)) {
            continue;
        }

        if (substr($file, -3) == 'php') {
            require_once($path . $file);
        }
    }
}
