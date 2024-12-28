<?php
/**
 * Plugin dashboard page.
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


 function pricemyway_dashboard_page() {
  $auth_completed = get_option('pricemyway_auth_completed', false);
  echo '<h1>' . esc_html__('Pricemyway Dashboard', 'pricemyway') . '</h1>';

  if (!$auth_completed) {
      echo '<div class="alert-danger">';
      echo esc_html__('Alert: Authentication is not completed. Please authenticate to continue.', 'pricemyway');
      echo '</div>';
      echo '<p><a href="' . esc_url(admin_url('admin.php?page=pricemyway-authentication')) . '" class="button button-primary">';
      echo esc_html__('Authenticate Now', 'pricemyway') . '</a></p>';
  } else {
      echo '<div class="alert-success">';
      echo esc_html__('Success: Authentication is completed. You are all set!', 'pricemyway');
      echo '</div>';
      ?>
      <div class="wrap">
          <h1>Coupon Settings</h1>
          <form method="post"  action="options.php" >
          <input type="hidden" name="action" value="pricemyway_coupon_form">

              <?php
                  settings_fields('pricemyway_coupon_settings');
                  do_settings_sections('pricemyway-coupon-settings');
                  submit_button();
              ?>
          </form>
      </div>
      
      
      <?php

  }

}
