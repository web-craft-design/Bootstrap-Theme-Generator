<?php

use ScssPhp\ScssPhp\OutputStyle;




add_action('rwmb_bstg_settingfields_colors_after_save_post', 'compileBootstrap');

function compileBootstrap() {
    $bstg = new HelperFunctions;
    //Add compiler (scssphp)
    require_once(BSTG_PLUGINPATH . 'inc/compiler/scss.inc.php');
    $compiler = new \ScssPhp\ScssPhp\Compiler;

    // OUTPUT-STYLE

    $compiler->setOutputStyle(OutputStyle::COMPRESSED);
    // or OutputStyle::EXPANDED

    //Import-Paths --> absolutely necessary to point to the bootstrap-folder so all those @import statements inside of bootstrap don't fail!
    $compiler->setImportPaths(BSTG_PLUGINPATH . 'assets/bootstrap_scss/');

    $stringToCompile = '';
    $stringToCompile .= '@import "functions";';

    $stringToCompile .= $bstg->get_color_pairs();

    $stringToCompile .= '
    /*** REQUIRED ***/
    @import "variables";
    @import "maps";
    @import "mixins";
    @import "root";
    
    

    @import "utilities";

    /*** SPACE FOR CUSTOM UTILITIES HERE ***/
    /*** SEE: https://getbootstrap.com/docs/5.2/utilities/api/#add-utilities ***/
    
    @import "utilities/api";

    @import "transitions";
    @import "reboot";
    @import "helpers";
    @import "type";

    ';


    // LOAD SELECTED COMPONENTS (for a list of available components see: @/inc/metabox/mbCallbacks )
    $stringToCompile .= $bstg->get_components_imports();


    $compiledString = $compiler->compileString($stringToCompile)->getCss();


    //Define the path of the output-file
    $path = BSTG_PLUGINPATH . 'assets/css/bootstrap.css';


    //opens the file
    $file = fopen($path, "w");

    //First of all: Empty the file
    fwrite($file, "");

    // Write the compiled BS into the file!
    fwrite($file, $compiledString);

    // Close the file
    fclose($file);

    return;
}
