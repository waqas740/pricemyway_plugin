<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action('admin_menu', 'pricemyway_create_menu');
/**
 * Create menu pages for the plugin.
 */
function pricemyway_create_menu() {
  $icon_svg = '<svg width="20" height="20" viewBox="0 0 512 512" fill="black"  xmlns="http://www.w3.org/2000/svg"><path d="M398 0L181.339 124.209L398 248.454V162.228L331.69 124.23L398 86.2252V0Z" fill="black"/><path d="M355.969 310.507L194.597 218.006C191.671 216.317 190.183 213.754 190.183 210.405C190.183 207.041 191.671 204.485 194.597 202.804L223.869 186.029L149.486 143.393C127.693 159.119 115.11 183.153 115 210.71C115.117 240.714 130.809 267.602 156.995 282.644L318.396 375.167C321.321 376.834 322.803 379.382 322.803 382.731C322.803 386.08 321.322 388.629 318.388 390.311L256.5 425.789L115 344.697V430.908L256.493 512L355.969 454.97C382.271 439.899 397.985 412.895 397.985 382.739C397.985 352.582 382.279 325.578 355.969 310.507Z" fill="black"/></svg>';
  // Add main menu (Pricemyway)
  add_menu_page(
      esc_html__('Pricemyway Dashboard', 'pricemyway'), // Page title
      esc_html__('Pricemyway', 'pricemyway'), // Menu title
      '', // Capability
      'pricemyway-dashboard', // Menu slug
      '',
      'data:image/svg+xml;base64,' . base64_encode($icon_svg), // Icon URL
      6 // Position
  );
  // Add hidden authentication callback page
  add_submenu_page(
    "pricemyway-dashboard", // No parent menu
    esc_html__('Home', 'pricemyway'), // Page title
    'Home', // Menu title (hidden)
    'manage_options', // Capability
    'pricemyway-home', // Menu slug
    'pricemyway_dashboard_page'
);
add_submenu_page(
    "pricemyway-dashboard", // No parent menu
    esc_html__('Settings', 'pricemyway'), // Page title
    'Settings', // Menu title (hidden)
    'manage_options', // Capability
    'pricemyway-settings', // Menu slug
    'pricemyway_render_settings_page'
);

  // Add hidden authentication callback page
  add_submenu_page(
      null, // No parent menu
      esc_html__('Pricemyway Auth', 'pricemyway'), // Page title
      '', // Menu title (hidden)
      'manage_options', // Capability
      'pricemyway-authentication', // Menu slug
      'pricemyway_authentication_page'
  );

  // Add hidden authentication callback page
  add_submenu_page(
      null, // No parent menu
      esc_html__('Pricemyway Auth', 'pricemyway'), // Page title
      '', // Menu title (hidden)
      'manage_options', // Capability
      'authentication-callback', // Menu slug
      'pricemyway_auth_callback_page'
  );
}
