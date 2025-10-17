<?php
class WP_Simple_CRUD_Handler {
    public function __construct() {
        add_action('admin_menu', [$this, 'add_admin_menu']);
    }

    public function add_admin_menu() {
        add_menu_page(
            'Simple CRUD',
            'Simple CRUD',
            'manage_options',
            'wp-simple-crud',
            [$this, 'admin_page_content'],
            'dashicons-book',
            6
        );
    }

    public function admin_page_content() {
        include plugin_dir_path(__FILE__) . '../admin/admin-page.php';
    }
}
