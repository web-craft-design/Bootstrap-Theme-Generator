<?php
/*
Plugin Name:	Bootstrap Theme Generator
Plugin URI:		https://web-craft.design
Description:	Theme Generator für Bootstrap, erzeugt eine kompilierte CSS Datei anhand der vorgegebenen Einstellungen
Version:		1.0.0
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
require_once(BSTG_PLUGINPATH . 'autoLoad.php');


// REGISTER BOOTSTRAP
wp_register_style('bootstrap', BSTG_PLUGINURL . 'assets/css/bootstrap.css');
wp_register_style('settingStyles', BSTG_PLUGINURL . 'assets/css/settingStyles.css');


//TODO: Use the separated files from the SRC-Folder and load them when the corresponding component was picked. Alternatively add them as dependency to the blocks?
wp_register_script('bootstrapJS', BSTG_PLUGINURL . 'assets/js/bootstrap.bundle.min.js', '', '', true);



autoLoad(BSTG_PLUGINPATH . 'inc/metabox');
add_filter('mb_settings_pages', 'bstg_register_general_settings');
add_filter('rwmb_meta_boxes', 'bstg_register_setting_fields');

add_action('admin_init', function () {


	//require_once(BSTG_PLUGINPATH . 'inc/metabox/mbCallbacks.php');
	autoLoad(BSTG_PLUGINPATH . 'functionality');





	add_action('enqueue_block_editor_assets', function () {
		$settings = getOptionsByGroupName('general_settings');


		if ($settings['enqueue_bs_in_gb']) wp_enqueue_style('bootstrap');



		foreach ($settings['enqueue_bs_js'] as $option) {
			if ($option == 'backend') wp_enqueue_script('bootstrapJS');
		}
	}, 999999);


	// REGISTER SETTING-STYLES:
	isset($_GET['page']) ? $location = $_GET['page'] : $location = false;


	if ($location == 'bstg_general_settings') {
		add_action('admin_head', function () {
			wp_enqueue_style('settingStyles');
		}, 9999);
		wp_enqueue_style('bootstrap');
	}
});


//FRONTEND STYLES:
add_action('wp_enqueue_scripts', function () {
	require_once(BSTG_PLUGINPATH . 'functionality/getOptions.php');
	$settings = getOptionsByGroupName('general_settings');

	wp_enqueue_style('bootstrap');


	foreach ($settings['enqueue_bs_js'] as $option) {
		if ($option == 'frontend') wp_enqueue_script('bootstrapJS');
	}
});
