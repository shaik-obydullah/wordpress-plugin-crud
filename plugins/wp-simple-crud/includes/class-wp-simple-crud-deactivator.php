<?php
class WP_Simple_CRUD_Deactivator {
    public static function deactivate() {
        // Optional: Drop table if you want
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}books");
    }
}