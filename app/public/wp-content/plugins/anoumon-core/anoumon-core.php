<?php
/**
 * Plugin Name: Anoumon Core
 * Description: Sync-endpoint en beheertools voor Anoumon.nl.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: MyCreatief
 * Text Domain: anoumon-core
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ANU_CORE_VERSION', '1.0.0');

add_action('init', function () {
    if (is_user_logged_in() && current_user_can('manage_options')) {
        defined('DONOTCACHEPAGE')    || define('DONOTCACHEPAGE', true);
        defined('DONOTCACHEOBJECT') || define('DONOTCACHEOBJECT', true);
        defined('DONOTMINIFY')      || define('DONOTMINIFY', true);
    }
});

require_once plugin_dir_path(__FILE__) . 'includes/class-sync-center.php';

add_action('plugins_loaded', function () {
    (new Anoumon_Sync_Center())->init();
});
