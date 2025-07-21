<?php

if ( ! class_exists( 'PrivacyBee_Elementor_Widget' ) ) {

    class PrivacyBee_Elementor_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'privacybee_widget';
        }

        public function get_title() {
            return __( 'PrivacyBee', 'privacybee-privacy-policy' );
        }

        public function get_icon() {
            return 'eicon-code';
        }

        public function get_categories() {
            return [ 'general' ];
        }

        protected function _register_controls() {
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Content', 'privacybee-privacy-policy' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'type',
                [
                    'label' => __( 'Legal basis', 'privacybee-privacy-policy' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'dsgvo', // Set GDPR as the default option
                    'options' => [
                        'dsgvo' => __( 'GDPR', 'privacybee-privacy-policy' ),
                        'dsg' => __( 'Swiss', 'privacybee-privacy-policy' ),
                    ],
                    'required' => true, // This is only for documentation purposes
                ]
            );
            $this->add_control(
                'lang',
                [
                    'label' => __( 'Language', 'privacybee-privacy-policy' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'en' => __( 'English', 'privacybee-privacy-policy' ),
                        'de' => __( 'German', 'privacybee-privacy-policy' ),
                        'fr' => __( 'French', 'privacybee-privacy-policy' ),
                        'it' => __( 'Italian', 'privacybee-privacy-policy' ),
                        // Additional languages can be added here
                    ],
                    'default' => 'en',
                ]
            );
            $this->add_control(
                'show_header',
                [
                    'label' => __( 'Show Header', 'privacybee-privacy-policy' ),
                    'type' => \Elementor\Controls_Manager::SELECT,

                    'options' => [
                        '1' => __( 'Default', 'privacybee-privacy-policy' ),
                        '2' => __( 'Hidden', 'privacybee-privacy-policy' ),
                    ],
                    'default' => '1',
                    'description' => __( 'Choose whether to display the title.', 'privacybee-privacy-policy' ),
                ]
            );

            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();

            // Validation
            if ( empty( $settings['type'] ) ) {
                echo '<p>' . esc_attr( 'Both Website ID and Type are required.', 'privacybee-privacy-policy' ) . '</p>';
                return;
            }
            // Render shortcode with settings
            echo do_shortcode( '[privacybee_widget type="' . esc_attr( $settings['type'] ) . '" lang="' . esc_attr( $settings['lang'] ) . '" show_header="'. esc_attr( $settings['show_header'] ) .'"]' );
           
        }
    }
}
