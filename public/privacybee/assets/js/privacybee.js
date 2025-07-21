jQuery( document ).ready(function() {
    jQuery( document ).on( "change" , "#privacybee_lazyload" , function(){
        jQuery( ".privacybee_lazyload" ).val( jQuery( this ).val() );
        jQuery( "#desubmit" ).trigger( "click" );
    } )
    jQuery( document ).on( "click" , ".privacybee-disconect" , function(){
        jQuery( ".privacybee_api_keys" ).val( "" );
        jQuery( "#desubmit" ).trigger( "click" );
    } )
});