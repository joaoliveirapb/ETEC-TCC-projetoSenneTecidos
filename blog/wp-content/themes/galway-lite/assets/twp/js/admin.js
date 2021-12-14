(function ($) {
    "use strict";

    var ajaxurl = galway_lite_admin_script_data.ajax_url;
    var GalwayLiteNonce = galway_lite_admin_script_data.ajax_nonce;

    // Metabox Tab
    $('.galway-metabox-tab a').click(function (){
        var tabid = $(this).attr('id');
        $('.galway-metabox-tab a').removeClass('galway-tab-active');
        $(this).addClass('galway-tab-active');
        $('.galway-tab-content .galway-content-wrap').hide();
        $('.galway-tab-content #'+tabid+'-content').show();
        $('.galway-tab-content .galway-content-wrap').removeClass('galway-tab-content-active');
        $('.galway-tab-content #'+tabid+'-content').addClass('galway-tab-content-active');
    });

    // Dismiss notice
    $('.twp-custom-setup').click(function(){
        
        var data = {
            'action': 'galway_lite_notice_dismiss',
            '_wpnonce': GalwayLiteNonce,
        };
 
        $.post(ajaxurl, data, function( response ) {

            $('.twp-galway-lite-notice').hide();
            
        });

    });

    // Getting Start action
    $('.twp-install-active').click(function(){

        $(this).closest('.twp-galway-lite-notice').addClass('twp-installing');

        var data = {
            'action': 'galway_lite_getting_started',
            '_wpnonce': GalwayLiteNonce,
        };
 
        $.post(ajaxurl, data, function( response ) {

            window.location.href = response+'&tab=getting-started';
            
        });

    });

    $('.required-plugin-details .twp-active-deactivate').click(function(){
        var id = $(this).closest('.galway-lite-about-col').attr('id');

        $(this).addClass('twp-activating-plugin')
        var PluginName = $(this).closest('.required-plugin-details').find('h2').text();
        var PluginStatus = $(this).attr('plugin-status');
        var PluginFile = $(this).attr('plugin-file');
        var PluginFolder = $(this).attr('plugin-folder');
        var PluginSlug = $(this).attr('plugin-slug');
        var pluginClass = $(this).attr('plugin-class');

        var data = {
            'single': true,
            'PluginStatus': PluginStatus,
            'PluginFile': PluginFile,
            'PluginFolder': PluginFolder,
            'PluginSlug': PluginSlug,
            'PluginName': PluginName,
            'pluginClass': pluginClass,
            'action': 'galway_lite_getting_started',
            '_wpnonce': GalwayLiteNonce,
        };
 
        $.post(ajaxurl, data, function( response ) {

            var active = galway_lite_admin_script_data.active
            var deactivate = galway_lite_admin_script_data.deactivate
            $('#'+id+' .twp-active-deactivate').empty();

            if( response == 'Deactivated' ){
                
                $('#'+id+' .required-plugin-details').removeClass('required-plugin-active');
                $('#'+id+' .twp-active-deactivate').removeClass('twp-plugin-active');
                $('#'+id+' .twp-active-deactivate').addClass('twp-plugin-deactivate');
                $('#'+id+' .twp-active-deactivate').html(active);
                $('#'+id+' .twp-active-deactivate').attr('plugin-status','deactivate');

            }else if( response == 'Activated' ){
                
                $('#'+id+' .required-plugin-details').addClass('required-plugin-active');
                $('#'+id+' .twp-active-deactivate').removeClass('twp-plugin-deactivate');
                $('#'+id+' .twp-active-deactivate').addClass('twp-plugin-active');
                $('#'+id+' .twp-active-deactivate').html(deactivate);
                $('#'+id+' .twp-active-deactivate').attr('plugin-status','active');

            }else{
                
                $('#'+id+' .required-plugin-details').removeClass('required-plugin-active');
                $('#'+id+' .twp-active-deactivate').removeClass('twp-plugin-not-install');
                $('#'+id+' .twp-active-deactivate').addClass('twp-plugin-active');
                $('#'+id+' .twp-active-deactivate').html(active);
                $('#'+id+' .twp-active-deactivate').attr('plugin-status','deactivate');

            }

            $('.twp-active-deactivate').removeClass('twp-activating-plugin');
            $('#'+id+' .twp-installation-message').empty();
            $('#'+id+' .twp-installation-message').html(response);
            
        });
    });

})(jQuery);