<?php
/*
Plugin Name:	Bootstrap Theme Generator
Plugin URI:		https://web-craft.design
Description:	Theme Generator für Bootstrap, erzeugt eine kompilierte CSS Datei anhand der vorgegebenen Einstellungen
Version:		1.0.1
Author:			Wolfgang Hartl | web-craft.design
Author URI:		https://web-craft.design
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

*/

if (!defined('WPINC')) {
	die;
}

//DEFINES
DEFINE('BSTG_PLUGINPATH', plugin_dir_path(__FILE__));
DEFINE('BSTG_PLUGINURL', plugin_dir_url(__FILE__));


// REGISTER BOOTSTRAP
wp_register_style('bootstrap', BSTG_PLUGINURL . 'assets/css/bootstrap.css');
wp_register_style('settingStyles', BSTG_PLUGINURL . 'assets/css/settingStyles.css');
wp_register_style('gutenberg-bs-styles', BSTG_PLUGINURL . 'assets/css/gutenberg-bs-styles.css');

//TODO: Use the separated files from the SRC-Folder and load them when the corresponding component was picked. Alternatively add them as dependency to the blocks?
wp_register_script('bootstrapJS', BSTG_PLUGINURL . 'assets/js/bootstrap.bundle.min.js', '', '', true);


// Autoloader & Helper Functions (class: HelperFunctions)
require_once(BSTG_PLUGINPATH . 'autoLoad.php');
require_once(BSTG_PLUGINPATH . 'inc/helpers/HelperFunctions.php');



autoLoad(BSTG_PLUGINPATH . 'inc/metabox');
add_filter('mb_settings_pages', 'bstg_register_general_settings');
add_filter('rwmb_meta_boxes', 'bstg_register_setting_fields');


autoLoad(BSTG_PLUGINPATH . 'functionality');


autoLoad(BSTG_PLUGINPATH . 'inc/gutenberg');
