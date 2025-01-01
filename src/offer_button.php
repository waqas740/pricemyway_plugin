<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'woocommerce_single_product_summary', 'pricemyway_product_details', 25 );

function pricemyway_product_details() {
    $pricemyway_hook = get_option("pricemyway_button_position_single_hook","woocommerce_after_add_to_cart_form");

    global $product;
    $product_id = $product->get_id();
    $product_price = $product->get_price();
    $product_stock = $product->get_stock_quantity();
    $exclude_on_out_of_stock = get_option("pricemyway_exclude_out_of_stock", "no");
    $above_price = get_option("pricemyway_exclude_above_price",0);
    $below_price = get_option("pricemyway_exclude_below_price",0);
    pricemyway_log_me("Product ID: $product_id, Price: $product_price, Stock: $product_stock, Exclude on out of stock: $exclude_on_out_of_stock, Above Price: $above_price, Below Price: $below_price");
    if($exclude_on_out_of_stock == "yes" && $product_stock == 0){
        return;
    }
    if($above_price && $product_price >  $above_price ){
        return;
    }
    if($below_price && $product_price <  $below_price ){
        return;
    }
    add_action($pricemyway_hook, 
    function() use ( $product_price ) { 
        pricemyway_add_offer_button( $product_price ); 
    });
    
}





// Add button to WooCommerce product page
function pricemyway_add_offer_button($product_price) {
    $btn_width = get_option( "pricemyway_btn_width", "100%" );
    $btn_bg_color = get_option( "pricemyway_btn_back_color", "#2463eb");
    $btn_text_color = get_option( "pricemyway_btn_text_color","#FFF" );
    $btn_border_color = get_option( "pricemyway_btn_border_color",  "#2463eb" );
    $btn_label = get_option( "pricemyway_btn_label", "Make an Offer" );
    $button_radius = get_option( "pricemyway_btn_border_radius", "5" );
    // covert into style format
    $btn_style = "width:{$btn_width}; background-color:{$btn_bg_color}; color:{$btn_text_color}; border-color:{$btn_border_color}; border-radius:{$button_radius}px;";  

    $modal_bg_color = get_option( "pricemyway_modal_back_color", "#374151" );
    $modal_header_bg_color = get_option( "pricemyway_modal_header_bg_color", "#374151" );
    $modal_text_color = get_option( "pricemyway_modal_header_text_color", "#fff" );
    $modal_btn_bg_color = get_option( "pricemyway_modal_btn_back_color", "#2563eb" );
    $modal_btn_text_color = get_option( "pricemyway_modal_btn_text_color", "#fff" );
    $model_label = get_option( "pricemyway_modal_label", "Make an Offer" );
    $modal_btn_label = get_option( "pricemyway_modal_btn_label", "Submit Offer" );
    // covert into style format

  ?>
  <button id="pricemyway-offer-btn"  style="<?php echo $btn_style ?>" class="tw-font-medium tw-text-sm tw-px-5 tw-py-2.5 tw-text-center" type="button">
    <?php echo esc_html__($btn_label, 'pricemyway'); ?>
  </button>
    
  <!-- Main modal -->
  <div id="pricemyway-modal" tabindex="-1" aria-hidden="true" class="tw-hidden tw-fixed tw-top-0 tw-right-0 tw-left-0 tw-z-50 tw-flex tw-justify-center tw-items-center tw-w-full md:tw-inset-0 tw-h-[calc(100%-1rem)] tw-max-h-full">
      <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-max-h-full">
          <!-- Modal content -->
          <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow" style="background-color:<?php echo $modal_bg_color; ?>">
              <!-- Modal header -->
              <div class="tw-flex tw-items-center tw-justify-between tw-p-4 md:tw-p-5 tw-border-b tw-rounded-t" style="background-color:<?php echo $modal_header_bg_color; ?>">
                  <h3 class="tw-text-xl tw-font-semibold" style="color:<?php echo $modal_text_color; ?>">
                      <?php echo esc_html__($model_label, 'pricemyway'); ?>
                  </h3>
                  <button type="button" class="tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-w-8 tw-h-8 tw-inline-flex tw-justify-center tw-items-center dark:tw-hover:bg-gray-600 dark:tw-hover:text-white" id="pricemyway-modal-colse-btn">
                      <svg class="tw-w-3 tw-h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                     
                  </button>
              </div>
              <!-- Modal body -->
              <div class="tw-p-4 md:tw-p-5">
                  <div id="pricemyway-offer-form " class="tw-flex tw-flex-col tw-space-y-4">
                      <div>
                          <label for="offer_amount" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white"><?php echo esc_html__('Offer Amount', 'pricemyway'); ?></label>
                          <input type="number" min=0 max=<?php echo $product_price?> name="offer_amount" id="offer_amount" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg tw-focus:ring-blue-500 tw-focus:border-blue-500 tw-w-full tw-p-2.5" placeholder="Enter your offer amount" required />
                      </div>
                      <div>
                          <label for="email" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white"><?php echo esc_html__('Your Email', 'pricemyway'); ?></label>
                          <input type="email" name="email" id="email" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg tw-focus:ring-blue-500 tw-focus:border-blue-500 tw-w-full tw-p-2.5" placeholder="name@company.com" required />
                      </div>
                      <button type="button" class="tw-w-full tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-text-center" style="background-color:<?php echo $modal_btn_bg_color ?> ; color:<?php echo $modal_btn_text_color ?> "><?php echo esc_html__($modal_btn_label, 'pricemyway'); ?></button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php
}



function pricemyway_enqueue_modal_scripts() {
    wp_enqueue_script('pricemyway-modal', PRICEMYWAY_PLUGIN_URL . '/assets/js/modal.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'pricemyway_enqueue_modal_scripts');
