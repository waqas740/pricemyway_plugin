<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get general settings for the Pricemyway plugin.
 *
 * @return array
 */
function pricemyway_get_general_settings() {
    return array(
        array(
            'heading'           => __( 'Products', 'pricemyway' ),
            'tooltip'           => __( 'You can enable price offers for <strong>all products</strong> or for <strong>selected products only</strong>.', 'pricemyway' ),
            'field_key'         => 'pricemyway_products',
            'type'              => 'select',
            'class'             => 'chosen_select',
            'default'           => 'yes',
            'options'           => array(
                'yes'           => __( 'Enable for all products', 'pricemyway' ),
                'no'            => __( 'Enable for selected products only', 'pricemyway' ),
            ),
            'custom_attributes' => apply_filters( 'pricemyway_settings', array( 'disabled' => 'disabled' ) ),
        ),
        array(
            'heading'           => __( 'Exclude', 'pricemyway' ),
            'desc'              => __( 'Out of stock', 'pricemyway' ),
            'tooltip'           => __( 'Excludes out of stock products.', 'pricemyway' ),
            'field_key'         => 'pricemyway_exclude_out_of_stock',
            'type'              => 'checkbox',
            'default'           => 'no',
            'checkboxgroup'     => 'start',
        ),
        
        array(
            'desc'              => __( 'Above price', 'pricemyway' ),
            'tooltip'           => '<span class="dashicons dashicons-info"></span> ' .
                __( 'Excludes all products priced higher than the set price. Ignored if set to zero.', 'pricemyway' ),
            'field_key'         => 'pricemyway_exclude_above_price',
            'type'              => 'number',
            'default'           => '',
            'custom_attributes' => array( 'min' => 0, 'step' => 0.0000001 ),
        ),
        array(
            'desc'              => __( 'Below price', 'pricemyway' ),
            'tooltip'           => '<span class="dashicons dashicons-info"></span> ' .
                __( 'Excludes all products priced lower than the set price. Ignored if set to zero.', 'pricemyway' ),
            'field_key'         => 'pricemyway_exclude_below_price',
            'type'              => 'number',
            'default'           => '',
            'custom_attributes' => array( 'min' => 0, 'step' => 0.0000001 ),
        ),
        array(
          'heading'             => __( 'Position on single product page', 'pricemyway' ),
          'field_key'                => 'pricemyway_button_position_single_hook',
          'type'              => 'select',
          'class'             => 'chosen_select',
          'default'           => 'woocommerce_after_add_to_cart_form',
          'options'           => array(
            'disable'                                   => __( 'Do not add', 'pricemyway' ),
            'woocommerce_before_single_product'         => __( 'Before single product', 'pricemyway' ),
            'woocommerce_before_single_product_summary' => __( 'Before single product summary', 'pricemyway' ),
            'woocommerce_single_product_summary'        => __( 'Inside single product summary', 'pricemyway' ),
            'woocommerce_before_add_to_cart_form'       => __( 'Before add to cart form', 'pricemyway' ),
            'woocommerce_after_add_to_cart_form'        => __( 'After add to cart form', 'pricemyway' ),
            'woocommerce_after_single_product_summary'  => __( 'After single product summary', 'pricemyway' ),
            'woocommerce_after_single_product'          => __( 'After single product', 'pricemyway' ),
          ),
        ),
    );
}

/**
 * Get style settings for the Pricemyway plugin.
 *
 * @return array
 */
function pricemyway_get_style_settings() {
    return array(
        array(
            'heading' => __( 'Button Options', 'pricemyway' ),
            'field_key' => 'pricemyway_button_options',
            'type' => 'title',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Label', 'pricemyway' ),
            'field_key' => 'pricemyway_btn_label',
            'type' => 'text',
            'default' => __( 'Make an offer', 'pricemyway' ),
            'css' => 'width:80%;',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Width%', 'pricemyway' ),
            'field_key' => "pricemyway_btn_width",
            'type' => 'text',
            'default' => '80%',
            'css' => 'width:80%;',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Background color', 'pricemyway' ),
            'field_key' => "pricemyway_btn_back_color",
            'type' => 'color',
            'default' => '#2463eb',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Border color', 'pricemyway' ),
            'field_key' => "pricemyway_btn_border_color",
            'type' => 'color',
            'default' => '#2463eb',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Border radius(px)', 'pricemyway' ),
            'field_key' => "pricemyway_btn_border_radius",
            'type' => 'number',
            'default' => '5',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Text color', 'pricemyway' ),
            'field_key' => "pricemyway_btn_text_color",
            'type' => 'color',
            'default' => '#FFFFFF',
            'desc' => '',
        ),
        // make a offer modal settings
        array(
            'heading' => __( 'Modal Options', 'pricemyway' ),
            'field_key' => 'pricemyway_modal_options',
            'type' => 'title',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Label', 'pricemyway' ),
            'field_key' => 'pricemyway_modal_label',
            'type' => 'text',
            'default' => __( 'Make an offer', 'pricemyway' ),
            'css' => 'width:80%;',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Button label', 'pricemyway' ),
            'field_key' => 'pricemyway_modal_btn_label',
            'type' => 'text',
            'default' => __( 'Submit', 'pricemyway' ),
            'css' => 'width:80%;',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Background color', 'pricemyway' ),
            'field_key' => "pricemyway_modal_back_color",
            'type' => 'color',
            'default' => '#374151',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Header background color', 'pricemyway' ),
            'field_key' => "pricemyway_modal_header_bg_color",
            'type' => 'color',
            'default' => '#374151',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Header text color', 'pricemyway' ),
            'field_key' => "pricemyway_modal_header_text_color",
            'type' => 'color',
            'default' => '#FFFFFF',
            'desc' => '',
        ),

        array(
            'heading' => __( 'Button Background color', 'pricemyway' ),
            'field_key' => "pricemyway_modal_btn_back_color",
            'type' => 'color',
            'default' => '#2463eb',
            'desc' => '',
        ),
        array(
            'heading' => __( 'Button Text color', 'pricemyway' ),
            'field_key' => "pricemyway_modal_btn_text_color",
            'type' => 'color',
            'default' => '#FFFFFF',
            'desc' => '',
        ),

    );
}

/**
 * Register plugin settings.
 */
function pricemyway_register_settings() {
            $general_settings = pricemyway_get_general_settings();
            pricemyway_register_settings_helper($general_settings, 'general',"pricemyway_general_settings");
            
            $style_settings = pricemyway_get_style_settings();
            pricemyway_register_settings_helper($style_settings, 'style','pricemyway_style_settings');
            
    
}

/**
 * Register settings helper function.
 *
 * @param array $settings The settings to register.
 * @param string $tab The tab name.
 */
function pricemyway_register_settings_helper($settings, $tab,$settings_group) {


    foreach ($settings as $setting) {
        if (isset($setting['type']) && $setting['type'] !== 'title' && $setting['type'] !== 'sectionend') {
            register_setting($settings_group, $setting['field_key'], array(
                'type' => $setting['type']
            ));
            add_settings_section('pricemyway_' . $setting['field_key'] . '_section', '', null, $settings_group);
            add_settings_field(
                $setting['field_key'],
                isset($setting['heading']) ? $setting['heading'] : '',
                'pricemyway_render_field',
                $settings_group,
                'pricemyway_' . $setting['field_key'] . '_section',
                $setting
            );
        }

        if (isset($setting['type']) && $setting['type'] === 'title') {
            add_settings_section(
                'pricemyway_' . $setting['field_key'] . '_section',
                '<h1 class="tw-mt-2">' . wp_kses_post($setting['heading']) . '</h1>',
                function () use ($setting) {
                    if (isset($setting['desc'])) {
                        echo '<h1 class="tw-mt-2">' . wp_kses_post($setting['desc']) . '</h1>';
                    }
                },
                $settings_group
            );
        }
    }
}

add_action( 'admin_init', 'pricemyway_register_settings' );

/**
 * Render the settings page.
 */
function pricemyway_render_settings_page() {
    $tabs = array(
        'general' => __( 'General', 'pricemyway' ),
        'style'   => __( 'Style', 'pricemyway' ),
    );

    $current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'general';
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Settings', 'pricemyway' ); ?></h1>
        <h2 class="nav-tab-wrapper">
            <?php foreach ( $tabs as $tab_key => $tab_name ) : ?>
                <a href="?page=pricemyway-settings&tab=<?php echo esc_attr( $tab_key ); ?>" class="nav-tab <?php echo $current_tab === $tab_key ? 'nav-tab-active' : ''; ?>">
                    <?php echo esc_html( $tab_name ); ?>
                </a>
            <?php endforeach; ?>
        </h2>
        <form method="post" action="options.php">
            <?php
            if ($current_tab === 'style') { 
                ?>
                <div class="tw-flex tw-flex-row tw-gap-2">
                    <div class="tw-w-1/2">
                        <?php 
                        settings_fields('pricemyway_style_settings');
                        do_settings_sections('pricemyway_style_settings');
                        ?>
                    </div>
                    <div class="tw-w-1/2">
                    <div id="pricemyway-preview-container">
                        <div class="tw-bg-white tw-p-2 tw-rounded-lg tw-shadow-md tw-mt-3">
                            <h1 class="tw-text-center"><?php echo esc_html__( 'Button Preview', 'pricemyway' ) ?> </h1>
                            <div id="pricemyway-button-preview" style="margin: 20px 0; padding: 10px; text-align: center;"></div>

                        </div>
                        <div class="tw-mt-[310px] tw-bg-white tw-p-2 tw-rounded-lg tw-shadow-md">
                            <h1 class="tw-text-center"><?php echo esc_html__( 'Modal Preview', 'pricemyway' ) ?> </h1>
                            <div id="pricemyway-modal-preview" style="margin: 20px 0; padding: 10px; text-align: center;"></div>

                        </div>
                         
                    </div>

                    </div>
                </div>
                <?php
              
            }
            else {
              settings_fields('pricemyway_general_settings');
              do_settings_sections('pricemyway_general_settings');
            }
          
            

            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Render individual fields.
 *
 * @param array $setting Setting field array.
 */
function pricemyway_render_field( $setting ) {
    $value = get_option( $setting['field_key'], $setting['default'] );

    switch ( $setting['type'] ) {
        case 'text':
        case 'number':
            echo '<p class="description">' . wp_kses_post( $setting['desc'] ) . '</p>';
            printf(
                '<input type="%s" id="%s" name="%s" value="%s" %s style="%s"/>',
                esc_attr( $setting['type'] ),
                esc_attr( $setting['field_key'] ),
                esc_attr( $setting['field_key'] ),
                esc_attr( $value ),
                isset( $setting['custom_attributes'] ) ? esc_attr( implode( ' ', array_map( fn( $k, $v ) => "$k=\"$v\"", array_keys( $setting['custom_attributes'] ), $setting['custom_attributes'] ) ) ) : '',
                isset( $setting['css'] ) ? esc_attr( $setting['css'] ) : ''
            );
            if ( isset( $setting['tooltip'] ) ) {
                echo '<p class="description">' . wp_kses_post( $setting['tooltip'] ) . '</p>';
            }
            break;

        case 'checkbox':
            echo '<label>';
            printf(
                '<input type="checkbox" id="%s" name="%s" value="yes" %s style="%s"/>',
                esc_attr( $setting['field_key'] ),
                esc_attr( $setting['field_key'] ),
                checked( $value, 'yes', false ),
                isset( $setting['css'] ) ? esc_attr( $setting['css'] ) : ''
            );
            echo wp_kses_post( $setting['desc'] );
            echo '</label>';
            if ( isset( $setting['tooltip'] ) ) {
                echo '<p class="description">' . wp_kses_post( $setting['tooltip'] ) . '</p>';
            }
            break;

        case 'select':
            echo '<select id="' . esc_attr( $setting['field_key'] ) . '" name="' . esc_attr( $setting['field_key'] ) . '" class="' . esc_attr( $setting['class'] ) . '" style="%s">';
            foreach ( $setting['options'] as $key => $label ) {
                printf(
                    '<option value="%s" %s>%s</option>',
                    esc_attr( $key ),
                    selected( $value, $key, false ),
                    esc_html( $label ),
                    isset( $setting['css'] ) ? esc_attr( $setting['css'] ) : ''
                );
            }
            echo '</select>';
            break;

        case 'color':
            printf(
                '<input type="color" id="%s" name="%s" value="%s" class="color-field" style="%s"/>',
                esc_attr( $setting['field_key'] ),
                esc_attr( $setting['field_key'] ),
                esc_attr( $value ),
                isset( $setting['css'] ) ? esc_attr( $setting['css'] ) : ''
            );
            break;

        default:
            do_action( 'pricemyway_render_custom_field', $setting );
            break;
    }
}
function pricemyway_enqueue_script( $hook ) {
   
    wp_enqueue_script(
        'pricemyway-settings-preview',
        PRICEMYWAY_PLUGIN_URL . 'assets/js/settings-preview.js',
        array( 'jquery' ),
        '1.0',
        true
    );

    wp_localize_script( 'pricemyway-settings-preview', 'pricemywaySettings', array(
        'buttonLabel'  => get_option( 'pricemyway_btn_label', __( 'Make an offer', 'pricemyway' ) ),
        'buttonWidth'  => get_option( 'pricemyway_btn_width', '80%' ),
        'buttonBg'     => get_option( 'pricemyway_btn_back_color', '#2463eb' ),
        'buttonBorder' => get_option( 'pricemyway_btn_border_color', '#2463eb' ),
        'buttonText'   => get_option( 'pricemyway_btn_text_color', '#FFFFFF' ),
        'buttonBorderRadius' => get_option( 'pricemyway_btn_border_radius', '5' ),
        'modalBg'      => get_option( 'pricemyway_modal_back_color', '#374151' ),
        'modalHeaderBg' => get_option( 'pricemyway_modal_header_bg_color', '#374151' ),
        'modalHeaderTextColor' => get_option( 'pricemyway_modal_header_text_color', '#FFFFFF' ),
        'modalBtnBg'   => get_option( 'pricemyway_modal_btn_back_color', '#2463eb' ),
        'modalBtnText' => get_option( 'pricemyway_modal_btn_text_color', '#FFFFFF' ),
        'modalLabel'   => get_option( 'pricemyway_modal_label', __( 'Make an offer', 'pricemyway' ) ),
        'modalBtnLabel' => get_option( 'pricemyway_modal_btn_label', __( 'Submit', 'pricemyway' ) ),

    ) );
}
add_action( 'admin_enqueue_scripts', 'pricemyway_enqueue_script' );
