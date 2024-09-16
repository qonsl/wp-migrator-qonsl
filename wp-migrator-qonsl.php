<?php
/**
 * Plugin Name: WordPress Migrator Qonsl
 * Plugin URI: https://github.com/qonsl/wp-migrator-qonsl.git
 * Description: This plugin is responsible for migrating WordPress sites, and also provides backup and restore functionality.
 * Version: 1.0.0
 * Author: Qonsl
 * Author URI: https://github.com/qonsl
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-migrator-qonsl
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    die("Page not found."); // Exit if accessed directly.
}

// Hooks to add admin menu
add_action('admin_menu', 'brp_add_admin_menu');

// Register admin menu
function brp_add_admin_menu() {
    add_menu_page(
        'WP Migrator', // Page title
        'WP Migrator',     // Menu title
        'manage_options',     // Capability
        'brp_backup_restore', // Menu slug
        'brp_admin_page'      // Callback function
    );
}

// Admin page content
function brp_admin_page() {
    ?>
    <div class="wrap">
        <h1>Backup and Restore</h1>
        <form method="post" enctype="multipart/form-data">
            <h2>Backup</h2>
            <input type="submit" name="backup" class="button button-primary" value="Create Backup">
            
            <h2>Restore</h2>
            <input type="file" name="backup_file">
            <input type="submit" name="restore" class="button button-primary" value="Restore Backup">
        </form>
    </div>
    <?php
    brp_handle_backup_restore();
}