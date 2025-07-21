<?php
/*
Plugin Name: PrivacyBee - Privacy Policy
Description: PrivacyBee is a service designed to automatically generate and update privacy policies for websites. It helps you to stay compliant with privacy policy laws in EU and Switzerland. Fully compatible with Elementor, Oxygen Builder and Gutenberg, PrivacyBee integrates seamlessly into your page builder's directory, allowing you to easily add a privacy policy section anywhere on your website.
Version: 1.0.0
Author: privacybee
Text Domain: privacybee-privacy-policy
Domain Path: /languages
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
define('PRIVACYBEE_PLUGIN_TEXTDOMAIN', 'privacybee-privacy-policy');
// Define plugin constants
define( 'PRIVACYBEE_PLUGIN_VERSION', '1.0' );
define( 'PRIVACYBEE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PRIVACYBEE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files
require_once PRIVACYBEE_PLUGIN_DIR . 'includes/class-privacybee-settings.php';
require_once PRIVACYBEE_PLUGIN_DIR . 'includes/class-privacybee-widget.php';
require_once PRIVACYBEE_PLUGIN_DIR . 'includes/class-privacybee-i18n.php';

// Initialize plugin classes
function privacybee_plugin_init() {
    // Load text domain for translations
    PrivacyBee_i18n::load_plugin_textdomain();
    
    // Initialize settings page
    PrivacyBee_Settings::init();

    // Initialize widget rendering
    PrivacyBee_Widget::init();

    
}
add_action( 'plugins_loaded', 'privacybee_plugin_init' );

// Activation and deactivation hooks
function privacybee_plugin_activate() {
    // Actions to perform on plugin activation
    // flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'privacybee_plugin_activate' );

function privacybee_plugin_deactivate() {
    // Actions to perform on plugin deactivation
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'privacybee_plugin_deactivate' );
