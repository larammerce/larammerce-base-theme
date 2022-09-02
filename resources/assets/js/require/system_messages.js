require(['jquery', 'toast'], function (jQuery) {
    jQuery('.system-messages ul li').each(function (index) {
        var messageEl = jQuery(this);
        jQuery.toast({
            text: messageEl.text(),
            icon: messageEl.data('type'),
            loader: true,
            textAlign : 'justify',
            bgColor: messageEl.data('color'),
            loaderBg: '#fabe3c',
            position : 'bottom-right',
            hideAfter : 7000

        });
    });
});