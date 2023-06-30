if (window.currentPage === "invoice-payment") {
    require(['jquery', 'template', 'local_cart_service'], function (jQuery, template, LocalCartService) {
        const discountRow = jQuery('#discount-row');
        const discountInput = discountRow.find('.discount-form input[name="discount_code"]');
        const submitButton = discountRow.find('.discount-form a.btn.submit');
        const couponRow = jQuery('#coupon-row');
        const couponSelect = couponRow.find('.coupon-form select[name="coupon_id"]');
        const couponSubmitButton = couponRow.find('.coupon-form a.btn.submit');
        const noteContainer = discountRow.find('.notes');

        submitButton.on('click', function (_event) {
            _event.preventDefault();
            _event.stopPropagation();

            if (discountInput.val().length > 6) {
                jQuery.ajax({
                    url: '/customer/invoice/check-discount-code',
                    method: 'POST',
                    data: {
                        _token: window.csrfToken,
                        discount_code: discountInput.val()
                    }
                }).done(function (_result) {
                    let messages = _result.transmission.messages;
                    if (messages.length > 0) {
                        noteContainer.removeClass('danger-discount');
                        noteContainer.addClass('success-discount');
                        noteContainer.find('div.ttl').text(messages[0]);
                        LocalCartService.setExtraDiscountAmount(_result.data.discount_amount);
                    }

                }).fail(function (_result) {
                    let messages = _result.responseJSON.transmission.messages;
                    if (messages.length > 0) {
                        noteContainer.removeClass('success-discount');
                        noteContainer.addClass('danger-discount');
                        noteContainer.find('div.ttl').text(messages[0]);
                    }
                });
            }

            return false;
        });

        couponSubmitButton.on('click', function (_event) {
            _event.preventDefault();
            _event.stopPropagation();

            if (couponSelect.val() === '')
                return false;

            jQuery.ajax({
                url: `/customer/invoice/check-coupon/${couponSelect.val()}`,
                method: 'POST',
                data: {
                    _token: window.csrfToken,
                }
            }).done(function (_result) {
                let messages = _result.transmission.messages;
                if (messages.length > 0) {
                    noteContainer.removeClass('danger-discount');
                    noteContainer.addClass('success-discount');
                    noteContainer.find('div.ttl').text(messages[0]);
                    LocalCartService.setCouponAmount((_result.data.discount_amount / 10));
                }

            }).fail(function (_result) {
                let messages = _result.responseJSON.transmission.messages;
                if (messages.length > 0) {
                    noteContainer.removeClass('success-discount');
                    noteContainer.addClass('danger-discount');
                    noteContainer.find('div.ttl').text(messages[0]);
                }
            });

            return false;
        });
    });
}