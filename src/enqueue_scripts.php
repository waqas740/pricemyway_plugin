<?php
function pricemyway_enqueue_scripts() {
  // Register and enqueue JavaScript file
  wp_register_script('pricemyway-script', PRICEMYWAY_PLUGIN_URL . 'assets/js/pricemyway.js', array('jquery'), '1.0', true); // true for loading in footer
  wp_enqueue_script('pricemyway-script');

  // Register and enqueue CSS file
  wp_register_style('pricemyway-style', PRICEMYWAY_PLUGIN_URL . 'assets/css/pricemyway_output.css', array(), '1.0');
  wp_enqueue_style('pricemyway-style');
}
add_action('wp_enqueue_scripts', 'pricemyway_enqueue_scripts');

// To enqueue in the admin area specifically
add_action('admin_enqueue_scripts', 'pricemyway_enqueue_scripts');
