<?php

if (!defined('ABSPATH')) {
   
    exit; // Exit if accessed directly
  }
// Include the WordPress filesystem API
if (!function_exists('wp_handle_upload')) {
    require_once ABSPATH . 'wp-admin/includes/file.php';
}

// Initialize the WP_Filesystem
global $wp_filesystem;
if (!WP_Filesystem()) {
    return; // Handle error if WP_Filesystem initialization fails
}
function get_pricemyway_log_file_path() {
    $upload_dir = wp_upload_dir();
    $log_dir    = trailingslashit( $upload_dir['basedir'] ) . 'pricemyway/';

    // Ensure the directory exists
    if ( ! file_exists( $log_dir ) ) {
        wp_mkdir_p( $log_dir );
    }

    return trailingslashit( $log_dir ) . 'pricemyway_log.txt';
}



function pricemyway_log_me_($message){
    global $wp_filesystem;

    // Ensure the filesystem is initialized
    if (!$wp_filesystem) {
        WP_Filesystem();
    }

    // Specify the log file path within the uploads directory
    $upload_dir = wp_upload_dir();
    $log_file = get_pricemyway_log_file_path();

    // Create the directory if it doesn't exist
    if (!is_dir(dirname($log_file))) {
        wp_mkdir_p(dirname($log_file));
    }

    $message = gmdate('Y-m-d H:i:s') . ' - ' . print_r($message, true) . PHP_EOL;

    // Check if the filesystem is ready and write to the file
    if ($wp_filesystem && $wp_filesystem->put_contents($log_file, $message, FILE_APPEND)) {
        return true;
    } else {
        pricemyway_log_error('Filesystem Error:', 'Unable to write to log file.');
        return false;
    }
}

function pricemyway_log_error($label, $error){
    // Log to the WordPress debug log if WP_DEBUG_LOG is enabled
    if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
        error_log($label . $error);
    }
}

function pricemyway_log_me($message){
    // Specify the log file path within the uploads directory
    $upload_dir = wp_upload_dir();
    //$log_file = get_pricemyway_log_file_path();
    $log_file = WP_CONTENT_DIR . '/plugins/pricemyway/pricemyway_log.txt';

    // Create the directory if it doesn't exist
    if (!is_dir(dirname($log_file))) {
        wp_mkdir_p(dirname($log_file));
    }

    $message = gmdate('Y-m-d H:i:s') . ' - ' . print_r($message, true) . PHP_EOL;
    file_put_contents($log_file, $message, FILE_APPEND);
}
?>
