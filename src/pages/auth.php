<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Authentication callback page.
 */
function pricemyway_auth_callback_page() {
  // get query parameters from the URL
  $token = isset($_GET['token']) ? sanitize_text_field(wp_unslash($_GET['token'])) : '';
  $cookie_duration = isset($_GET['cookieDuration']) ? sanitize_text_field(wp_unslash($_GET['cookieDuration'])) : "30";
  // send get request to verify the token and shop url and response value is true then set the auth completed option to true
  $response = wp_remote_get(PRICEMYWAY_API_BASE_URL . '/wordpress/auth_verify?shop_token=' . $token . '&shop_url=' . get_site_url());
  if (is_wp_error($response)) {
      update_option('pricemyway_auth_completed', false);
      pricemyway_log_error('Unable to authenticate. Error: ' . $response->get_error_message());
      wp_die('Unable to authenticate. Please try again.');
  }
  if( wp_remote_retrieve_body($response) == 'true'){
      update_option('pricemyway_auth_completed', true);
      update_option('pricemyway_cookie_duration', $cookie_duration);
  }
  else {
      update_option('pricemyway_auth_completed', false);
  }
  wp_redirect(admin_url('admin.php?page=pricemyway-dashboard')); 
  exit;

}

function pricemyway_authentication_page(){
  pricemyway_authentication();
}
function pricemyway_authentication() {
  $callback_url = admin_url('admin.php?page=authentication-callback'); // The callback URL on the WordPress site
  $api_url = PRICEMYWAY_API_BASE_URL . '/wordpress/auth';
  // Construct the OAuth authorization URL
  $authorization_url = add_query_arg(
      array(
          'callback_url'  => urlencode($callback_url),
          'shop_url'      => urlencode(get_site_url()),
      ),
      $api_url
  );
  // Redirect the admin user to the Rails app for authorization
  wp_redirect($authorization_url);
  exit;

}
