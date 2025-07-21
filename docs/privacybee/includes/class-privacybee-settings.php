<?php

if ( ! class_exists( 'PrivacyBee_Settings' ) ) {

    class PrivacyBee_Settings {

        public static function init() {
            add_action( 'admin_menu', array( __CLASS__, 'privacybee_add_settings_page' ) );
            add_action( 'admin_init', array( __CLASS__, 'privacybee_register_settings' ) );
            add_action('admin_enqueue_scripts',  array( __CLASS__ ,  'privacybee_my_custom_styles' ) );
            add_action('wp_enqueue_scripts', array( __CLASS__ , 'privacybee_my_custom_styles_front' ) );
            add_action('plugins_loaded', array( __CLASS__ , 'privacybee_load_textdomain' ) );
            

            $lazy_load_check = get_option('privacybee_lazyload');
            if( empty( $lazy_load_check ) ){
                $lazy_load_check = "disabled";
            }
            if( $lazy_load_check != "disabled" ){
                add_action('wp_head', array( __CLASS__ ,  'inject_custom_script' )  );
            }

        }
        public static function inject_custom_script() {
            // Enqueue the script
            wp_enqueue_script( 'privacybee-custom-script' );

            // Add the inline script
            $inline_script = "
                const urlParams = new URLSearchParams(window.location.search);
                function hasPrivacyScannerParam() {
                    return (
                        urlParams.has('privacybee-scanner') &&
                        urlParams.get('privacybee-scanner') === 'true'
                    );
                }
                window.addEventListener('borlabs-cookie-after-init', () => {
                    if (hasPrivacyScannerParam()) {
                        Object.values(BorlabsCookie.Services.services).forEach((s) => {
                            if (s.id) {
                                BorlabsCookie.Consents.addConsent(s.id, s.serviceGroupId);
                            }
                        });
                    }
                });
            ";

            // Inject the inline script after the external script
            wp_add_inline_script( 'privacybee-custom-script', $inline_script );
        }

        
        public function privacybee_load_textdomain() {
            load_plugin_textdomain('privacybee-privacy-policy', false, dirname(plugin_basename(__FILE__)) . '/languages');
        }
        public static function privacybee_my_custom_styles() {
            // Enqueue the CSS for admin
            wp_register_style(
                'privacybee-custom-admin-style',
                PRIVACYBEE_PLUGIN_URL . 'assets/css/admin.css',
                array(), // Dependencies
                '1.0.0', // Version number
                'all' // Media type
            );
            
            // Enqueue the registered style
            wp_enqueue_style('privacybee-custom-admin-style');

            // Enqueue the JavaScript for admin
            wp_register_script(
                'privacybee-admin-js',
                PRIVACYBEE_PLUGIN_URL . 'assets/js/privacybee.js',
                array('jquery'), // Adding jQuery as a dependency
                PRIVACYBEE_PLUGIN_VERSION, // Version number
                true // Load in footer
            );
            
            // Enqueue the registered script
            wp_enqueue_script('privacybee-admin-js');
        }
        public static function privacybee_my_custom_styles_front() {
            $lazy_load_check = get_option('privacybee_lazyload');
            if( empty( $lazy_load_check ) ){
                $lazy_load_check = "disabled";
            }
            if( $lazy_load_check != "disabled" ){
                wp_register_script(
                    'privacybee-js', // Script handle
                    'https://www.privacybee.io/widget.js', // Script URL
                    array(), // Dependencies
                    PRIVACYBEE_PLUGIN_VERSION, // Version
                    array( 'strategy' => 'async'  ),
                    true, // Load in footer
                );    
            }else{
                wp_register_script(
                    'privacybee-js', // Script handle
                    'https://www.privacybee.io/widget.js', // Script URL
                    array(), // Dependencies
                    PRIVACYBEE_PLUGIN_VERSION, 
                    true, // Load in footer
                );    
            }

            // Enqueue the script
            wp_enqueue_script('privacybee-js');

        }
        

        public static function privacybee_add_settings_page() {
            // Add main menu page
            add_menu_page(
                __('PrivacyBee Settings', 'privacybee-privacy-policy'),
                __('PrivacyBee', 'privacybee-privacy-policy'),
                'manage_options',
                'privacybee-settings',
                array( __CLASS__, 'render_settings_page' ),
                'dashicons-shield', // Optional: Dashicon for the menu item
                60 // Optional: Position in the menu
            );

            add_submenu_page(
                'privacybee-settings', // The slug of the parent menu
                __('Privacy Policy', 'privacybee-privacy-policy'), // Page title
                __('Privacy Policy', 'privacybee-privacy-policy'), // Menu title
                'manage_options', // Capability required to access this page
                'privacybee-privacy-policy', // Menu slug
                array(__CLASS__, 'render_settings_page') // Callback function to display the page content
            );
        }

        public static function privacybee_register_settings() {
            // Register API key setting with a sanitization callback
            register_setting( 'privacybee_settings_group', 'privacybee_api_key', array(
                'type' => 'string',
                'sanitize_callback' => array( __CLASS__, 'sanitize_api_key' ), // Use array syntax for static method reference
                'default' => ''
            ));

            // Register lazyload setting with a sanitization callback
            register_setting( 'privacybee_settings_group', 'privacybee_lazyload', array(
                'type' => 'string', // Type of the setting
                'sanitize_callback' => array( __CLASS__, 'sanitize_api_key' ), // Use array syntax for static method reference
                'default' => 'disabled' // Default value, can adjust as necessary
            ));
        }

        public static function render_settings_page() {
            require_once PRIVACYBEE_PLUGIN_DIR . "templates/privacybee-admin-setting.php";
        }
        public static function sanitize_api_key($input) {
            // Validate the API key (example: check if it's a valid length or pattern)
            return sanitize_text_field($input); // You can add additional validation logic if needed
        }
    }
}
