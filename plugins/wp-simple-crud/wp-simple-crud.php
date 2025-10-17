<?php
/*
Plugin Name: WP Simple CRUD
Description: A simple CRUD plugin example for learning purposes.
Version: 1.0
Author: Shaik Obydullah
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Activation & Deactivation hooks
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-simple-crud-activator.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-simple-crud-deactivator.php';

register_activation_hook(__FILE__, ['WP_Simple_CRUD_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['WP_Simple_CRUD_Deactivator', 'deactivate']);

// Admin page and CRUD handler
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-simple-crud-handler.php';
new WP_Simple_CRUD_Handler();
