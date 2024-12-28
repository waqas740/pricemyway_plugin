<?php
/*
 * Plugin Name:       Pricemyway
 * Plugin URI:        https://pricemyway.com
 * Description:       Innovative affiliate marketplace for brands in the outdoor industries.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      8.2
 * Author:            Pricemyway
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pricemyway
 * Domain Path:       /languages
 
 */


if (!defined('ABSPATH')) {
   
  exit; // Exit if accessed directly
}
/* Define the base URL for API endpoints. 
This should be the URL of the Rails app including the http:// or https://.
*/
define('PRICEMYWAY_API_BASE_URL', 'http://localhost:3000');
define( 'PRICEMYWAY_PLUGIN_FILE', __FILE__ );
define( 'PRICEMYWAY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PRICEMYWAY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PRICEMYWAY_PLUGIN_SRC', PRICEMYWAY_PLUGIN_DIR . 'src/' );
define( 'PRICEMYWAY_PLUGIN_PAGES', PRICEMYWAY_PLUGIN_SRC . 'pages/' );



require_once PRICEMYWAY_PLUGIN_SRC . 'logger.php';
require_once PRICEMYWAY_PLUGIN_SRC . 'menu.php';
require_once PRICEMYWAY_PLUGIN_SRC . 'enqueue_scripts.php';
require_once PRICEMYWAY_PLUGIN_SRC . 'activation.php';
require_once PRICEMYWAY_PLUGIN_SRC . 'deactivation.php';

require_once PRICEMYWAY_PLUGIN_PAGES . 'dashboard.php';
require_once PRICEMYWAY_PLUGIN_PAGES . 'auth.php';
require_once PRICEMYWAY_PLUGIN_PAGES . 'settings.php';

// Hook registrations
add_action('admin_notices', 'pricemyway_auth_admin_notice');
// Ensure WooCommerce is active
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
  require_once PRICEMYWAY_PLUGIN_SRC . 'offer_button.php';
}
/**
 * Admin notice to prompt authentication.
 */
function pricemyway_auth_admin_notice() {
    $auth_completed = get_option('pricemyway_auth_completed', false);
    if (!$auth_completed) {
        echo '<div class="notice notice-error"><p>' . esc_html__('Pricemyway authentication is not completed. Please authenticate it.', 'pricemyway') . '</p></div>';
    }
}







