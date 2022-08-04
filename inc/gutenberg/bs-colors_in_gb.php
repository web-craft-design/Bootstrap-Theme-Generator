<?php

/**
 * Registers support for Gutenberg features.
 */
function theme_slug_gutenberg_support() {
    $bstg = new HelperFunctions;
    // Add theme support for custom color palette.

    add_theme_support('editor-color-palette', $bstg->get_gutenberg_colors());

    // Disable theme support for custom colors.
    //add_theme_support('disable-custom-colors');
}
add_action('after_setup_theme', 'theme_slug_gutenberg_support', 9999);
