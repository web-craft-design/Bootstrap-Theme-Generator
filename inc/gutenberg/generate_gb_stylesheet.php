<?php

add_action('rwmb_bstg_settingfields_colors_after_save_post', 'generateGbStylesheet');

function generateGbStylesheet() {

    $bstg = new HelperFunctions;


    $colors = $bstg->getOptionsByGroupName('colors');
    unset($colors['_state']);


    // Generate the String for CSS!
    $string = '';
    foreach ($colors as $key => $value) {
        $string .= "
        .has-{$key}-color{
            color: {$value};
        }
        .has-{$key}-background-color{
            background-color: {$value};
        }
        ";
    }

    //Define the path of the output-file
    $path = BSTG_PLUGINPATH . 'assets/css/gutenberg-bs-styles.css';


    //opens the file
    $file = fopen($path, "w");

    //First of all: Empty the file
    fwrite($file, "");

    fwrite($file, $string);

    // Close the file
    fclose($file);


    // NOTE: Stylesheet get's enqueued by following file: @/functionality/add_frontend_stylesheets.php
    // NO need to enqueue it in gutenberg, since gutenberg handles colors inside!

}
