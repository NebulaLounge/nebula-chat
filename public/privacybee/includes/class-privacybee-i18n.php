<?php
if ( ! class_exists( 'PrivacyBee_i18n' ) ) {
    
    class PrivacyBee_i18n {
        public static function load_plugin_textdomain() {
            load_plugin_textdomain(
                'privacybee-privacy-policy',
                false,
                dirname( plugin_basename( __FILE__ ) ) . '/../languages/'
            );
        }
    } 
}
