(function( blocks, editor, i18n, element, components ) {
    var el = element.createElement;
    var InspectorControls = editor.InspectorControls;
    var SelectControl = components.SelectControl;
    var PanelBody = components.PanelBody;

    blocks.registerBlockType( 'privacybee/widget', {
        title: i18n.__( 'PrivacyBee', 'privacybee-privacy-policy' ),
        icon: 'shield-alt',
        category: 'embed',
        attributes: {
            website_id: {
                type: 'string',
                default: ''
            },
            type: {
                type: 'string',
                default: ''
            },
            lang: {
                type: 'string',
                default: 'en'
            },
            show_header: {  // New attribute for Title display
                type: 'string',
                default: 'default'
            }
        },
        edit: function( props ) {
            var attributes = props.attributes;

            function updateWebsiteID( newValue ) {
                props.setAttributes( { website_id: newValue } );
            }

            function updateType( newValue ) {
                props.setAttributes( { type: newValue } );
            }

            function updateLang( newValue ) {
                props.setAttributes( { lang: newValue } );
            }

            function updateTitleDisplay( newValue ) {  // Function to update title_display
                props.setAttributes( { show_header: newValue } );
            }

            return el(
                'div',
                { className: 'privacybee-block' },
                el(
                    InspectorControls,
                    null,
                    el(
                        PanelBody,
                        { title: i18n.__( 'Settings', 'privacybee-privacy-policy' ) },

                        el( SelectControl, {
                            label: i18n.__( 'Legal basis', 'privacybee-privacy-policy' ),
                            value: attributes.type,
                            options: [
                                { label: i18n.__( 'GDPR', 'privacybee-privacy-policy' ), value: 'dsgvo' },
                                { label: i18n.__( 'Swiss', 'privacybee-privacy-policy' ), value: 'dsg' }
                                // Additional types can be added here
                            ],
                            onChange: updateType
                        } ),
                        el( SelectControl, {
                            label: i18n.__( 'Language', 'privacybee-privacy-policy' ),
                            value: attributes.lang,
                            options: [
                                { label: i18n.__( 'English', 'privacybee-privacy-policy' ), value: 'en' },
                                { label: i18n.__( 'German', 'privacybee-privacy-policy' ), value: 'de' },
                                { label: i18n.__( 'French', 'privacybee-privacy-policy' ), value: 'fr' },
                                { label: i18n.__( 'Italian', 'privacybee-privacy-policy' ), value: 'it' }
                                // Additional languages can be added here
                            ],
                            onChange: updateLang
                        } ),
                        el( SelectControl, {  // New dropdown for Title display
                            label: i18n.__( 'Show Header', 'privacybee-privacy-policy' ),
                            value: attributes.show_header,
                            options: [
                                { label: i18n.__( 'Default', 'privacybee-privacy-policy' ), value: '1' },
                                { label: i18n.__( 'Hidden', 'privacybee-privacy-policy' ), value: '2' }
                            ],
                            onChange: updateTitleDisplay
                        } )
                    )
                ),
                el(
                    'p',
                    null,
                    i18n.__( 'PrivacyBee settings:', 'privacybee-privacy-policy' )
                )
            );
        },
        save: function() {
            return null; // Rendering handled via PHP
        }
    } );
})(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.i18n,
    window.wp.element,
    window.wp.components
);
