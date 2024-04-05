<?php
/*
Plugin Name: To-do List
Description: A Plugin to add to daily to-do lists
Author: Muhammad Qurban
Author URI: https://linkedin.com/in/mr-qurban
Version: 1.0

*/


// Exit if accessed directly 

if (!defined('ABSPATH')) {
    exit;
}


// Load Scripts 
require_once(plugin_dir_path(__FILE__) . '/includes/todo-list-scripts.php');

// Load Shortcode for To-do List 
require_once(plugin_dir_path(__FILE__) . '/includes/todo-list-shortcodes.php');


// Check if admin

if (is_admin()) {

    // Load Registered Post for To-do List 
    require_once(plugin_dir_path(__FILE__) . '/includes/todo-list-cpt.php');

    // Load Custom field for To-do List
    require_once(plugin_dir_path(__FILE__) . '/includes/todo-list-fields.php');
}
