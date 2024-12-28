<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

add_action( 'activated_plugin', 'pricemyway_plugin_activation' );

function pricemyway_plugin_activation($plugin) {
  if( $plugin == plugin_basename( __FILE__ ) ) {
      add_option('pricemyway_auth_completed',false);
      pricemyway_authentication();
  }
}
