<?php

if ( ! class_exists( 'PrivacyBee_Widget' ) ) {

    class PrivacyBee_Widget {

        public static function init() {
            $api_key = get_option('privacybee_api_key');

            if( !empty( $api_key ) ){
                add_shortcode( 'privacybee_widget', array( __CLASS__, 'privacybee_render_widget' ) );
                add_action( 'enqueue_block_assets', array( __CLASS__, 'privacybee_enqueue_gutenberg_block' ) );
                add_action( 'vc_before_init', array( __CLASS__, 'privacybee_integrate_with_vc' ) );
                add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'privacybee_register_elementor_widget' ) );
                add_action( 'init', array( __CLASS__, 'privacybee_register_block' ) );
            }
            
        }
        public static function privacybee_register_block() {
            register_block_type( 'privacybee/widget', array(
                'render_callback' => array( __CLASS__, 'render_block' ),
            ) );
        }
        public static function render_block( $attributes ) {
            $website_id = get_option('privacybee_api_key');

            $type = isset( $attributes['type'] ) ? esc_attr( $attributes['type'] ) : 'dsgvo';
            $lang = isset( $attributes['lang'] ) ? esc_attr( $attributes['lang'] ) : 'en';
            $show_header = isset( $attributes['show_header'] ) ? esc_attr( $attributes['show_header'] ) : '2';

            return do_shortcode( '[privacybee_widget type="' . esc_attr($type) . '" lang="' . esc_attr($lang) . '" show_header="'. esc_attr($show_header) .'"] '  );
        }
        public static function privacybee_render_widget( $atts ) {
            $type = $lang = $show_header = "";
            if( array_key_exists( 'type' , $atts ) ){
                $type = $atts['type'];
            }else{
                $type = "dsgvo";
            }
            if( array_key_exists( 'lang' , $atts ) ){
                $lang = $atts['lang'];
            }
            else{
                $lang = "en";
            }

            if( array_key_exists( 'show_header' , $atts ) ){
                if( $atts['show_header'] == "1" ){
                    $show_header = "true";    
                }else{
                    $show_header = "false";    
                }
            }else{
                $show_header = "true";
            }
            // echo $show_header;

            $atts = shortcode_atts( array(
                'type' => $type,
                'lang' => $lang,
                'show_header' => $show_header,
            ), $atts, 'privacybee_widget' );
            if( array_key_exists( "show_header" , $atts ) ){
                if( $atts['show_header'] == 2 ){
                    $atts['show_header'] = "false";
                }else{
                    $atts['show_header'] = "true";
                }
            }
            
            
            if (  empty( $atts['type'] ) ) {
                return '<p>' . __( 'Both Website ID and Type are required.', 'privacybee-privacy-policy' ) . '</p>';
            }
            $output = "";             
            $data = get_option( 'privacybee_lazyload');
            if( empty( $data ) ){
                $data = "defer";
            } else if( $data == "enabled" ){
                $data = "async='async'";
            }
            $url = "https://www.privacybee.io/widget.js";
            $api_key = get_option('privacybee_api_key');

            if( array_key_exists( 'show_header' , $atts  ) ){
                if( $atts['show_header'] == "true" ){
                    $output .= '<privacybee-widget website-id="' . esc_attr( $api_key ) . '" type="' . esc_attr( $atts['type'] ) . '" lang="' . esc_attr( $atts['lang'] ) . '"></privacybee-widget>';
                }else{
                    $output .= '<privacybee-widget website-id="' . esc_attr( $api_key ) . '" type="' . esc_attr( $atts['type'] ) . '" lang="' . esc_attr( $atts['lang'] ) . '" hide-title="true"></privacybee-widget>';
                }
            }else{
                $output .= '<privacybee-widget website-id="' . esc_attr( $api_key ) . '" type="' . esc_attr( $atts['type'] ) . '" lang="' . esc_attr( $atts['lang'] ) . '"></privacybee-widget>';
            }

            return $output;
            
        }

        public static function privacybee_enqueue_gutenberg_block() {
            wp_enqueue_script(
                'privacybee-gutenberg-block',
                PRIVACYBEE_PLUGIN_URL . 'assets/js/gutenberg-block.js',
                array( 'wp-blocks', 'wp-element', 'wp-editor' ),
                PRIVACYBEE_PLUGIN_VERSION,
                true
            );
            
        }

        public static function privacybee_integrate_with_vc() {
            vc_map( array(
                'name' => __( 'PrivacyBee', 'privacybee-privacy-policy' ),
                'base' => 'privacybee_widget',
                'category' => __( 'Content', 'privacybee-privacy-policy' ),
                "icon" =>  "dashicons-before dashicons-shield",
                'params' => array(                    
                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Legal basis', 'privacybee-privacy-policy' ),
                        'param_name' => 'type',
                        'value' => array(
                            __( 'GDPR', 'privacybee-privacy-policy' ) => 'dsgvo',
                            __( 'Swiss', 'privacybee-privacy-policy' ) => 'dsg',
                        ),
                        'admin_label' => true,
                        'description' => __( 'Select the Legal basis (required).', 'privacybee-privacy-policy' ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Language', 'privacybee-privacy-policy' ),
                        'param_name' => 'lang',
                        'value' => array(
                            __( 'English', 'privacybee-privacy-policy' ) => 'en',
                            __( 'German', 'privacybee-privacy-policy' ) => 'de',
                            __( 'French', 'privacybee-privacy-policy' ) => 'fr',
                            __( 'Italian', 'privacybee-privacy-policy' ) => 'it',
                            // Additional languages can be added here
                        ),
                        'description' => __( 'Select the language.', 'privacybee-privacy-policy' ),
                    ),
                     array(  // New dropdown for Title
                        'type' => 'dropdown',
                        'heading' => __( 'Show Header', 'privacybee-privacy-policy' ),
                        'param_name' => 'show_header',
                        'value' => array(
                            __( 'Default', 'privacybee-privacy-policy' ) => '1',
                            __( 'Hidden', 'privacybee-privacy-policy' ) => '2',
                        ),
                        'description' => __( 'Choose whether to display the title.', 'privacybee-privacy-policy' ),
                    ),
                ),
            ));

        }

        public static function privacybee_register_elementor_widget( $widgets_manager ) {
            require_once PRIVACYBEE_PLUGIN_DIR . 'includes/class-privacybee-elementor-widget.php';
            $widgets_manager->register( new \PrivacyBee_Elementor_Widget() );
        }
    }
}
