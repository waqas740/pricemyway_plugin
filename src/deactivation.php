<?php

register_deactivation_hook(__FILE__, 'pricemyway_plugin_deactivation');
/**
 * Deactivation hook to clean up options.
 */
function pricemyway_plugin_deactivation() {
  delete_option('pricemyway_auth_completed');
  delete_option('pricemyway_cookie_duration');
}
