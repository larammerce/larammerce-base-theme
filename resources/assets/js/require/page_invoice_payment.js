if (window.currentPage === "invoice-payment") {
    require(['jquery', 'template', 'tools', 'local_cart_service'], function (jQuery, template, tools, LocalCartService) {
        const discountRow = jQuery('#discount-row');
        const discountInput = discountRow.find('.discount-form input[name="discount_code"]');
        const submitButton = discountRow.find('.discount-form a.btn.submit');
        const noteContainer = discountRow.find('.notes');
        const dlFactorBtn = jQuery('.btn.btn-download');

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
                    let amount = _result.data.discount_amount;

                    console.log(_result.data);

                    if (messages.length > 0) {
                        if (amount > 0) {
                            noteContainer.removeClass('danger-discount');
                            noteContainer.addClass('success-discount');
                            noteContainer.find('div.ttl').text(messages[0]);
                            LocalCartService.setExtraDiscountAmount(amount / 10);
                        } else {
                            noteContainer.addClass('danger-discount');
                            noteContainer.find('div.ttl').text('شرایط کد تخفیف با سبدخرید شما همخوانی ندارد.');
                        }
                    }

                }).fail(function (_result) {
                    var messages = _result.responseJSON.transmission.messages;
                    var data = _result.responseJSON.data;
                    if (messages.length > 0) {
                        noteContainer.removeClass('success-discount');
                        noteContainer.addClass('danger-discount');
                        noteContainer.find('div.ttl').text(messages[0]);
                    }
                    if (data.length > 0) {
                        jQuery(data).each(function () {
                            jQuery("div").find(`[data-product-id='${this.id}']`).append(`
                                <div class="alert-danger-discount">محصول نامرتبط</div>
                            `);
                        })
                        jQuery('html, body').animate({scrollTop: 0}, 500);
                        setTimeout(function () {
                            jQuery("div.alert-danger-discount").remove();
                        }, 3000)
                    }
                });
            }

            return false;
        });

        dlFactorBtn.on('click', function (_event) {
            _event.preventDefault();

            const printableRowsContainer = jQuery("#printable-rows-container");
            printableRowsContainer.html("");

            jQuery("[product-box]").each(function (index) {
                console.log(index);
                const thisEl = jQuery(this);
                const newPrintableRow = template.printableInvoiceRow({
                    row_id: tools.convertNumberToPersian(`${index + 1}`),
                    image: {
                        alt: thisEl.find("img").attr("alt"),
                        src: thisEl.find("img").attr("src")
                    },
                    title: thisEl.find(".detail-product .product-name").text(),
                    code: thisEl.attr("product-code"),
                    count: thisEl.find("input.count-control").val(),
                    discount: thisEl.find(".title .discount-container").text(),
                    latest_price: thisEl.find(".price.price-single").text(),
                    before_discount: thisEl.find(".before-discount .sum-price-before.before-price.digit").text(),
                    after_discount: thisEl.find(".after-discount.sum-price .price-data.price-sum").text(),
                    tax: thisEl.find(".tax-price .price-data.price-tax").text()

                });
                printableRowsContainer.append(newPrintableRow);
            });

            jQuery(".price-information .price-data.sum-without-discount").text(
                jQuery(".sum-price-before-discount.before-discount .price-data").text()
            );

            jQuery(".price-information .price-data.sum-discount").text(
                jQuery(".sum-price-discount.discount .price-data").text()
            );

            jQuery(".price-information .price-data.sum-tax").text(
                jQuery(".sum-price-tax.tax .price-data").text()
            );

            jQuery(".price-information .price-data.sum-with-discount").text(
                jQuery(".sum-price-after-discount.after-discount .price-data").text()
            );

            printDiv();
        });

        function printDiv() {
            var divToPrint = document.getElementById('factor');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            console.log('before');
            console.log(divToPrint);
            newWin.document.write('<html><body>' +
                '<head>\n' +
                '    <meta charset="UTF-8">\n' +
                '    <meta name="author" content="Hinza">\n' +
                '    <meta http-equiv="X-UA-Compatible" content="IE=edge">\n' +
                '    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.6, initial-scale=1.0"/>\n' +
                '    <link rel="icon" type="image/png" sizes="32x32" href="/HCMS-assets/img/favicon/logo.png">\n' +
                '    <link rel="icon" type="image/png" sizes="16x16" href="/HCMS-assets/img/favicon/logo.png">\n' +
                '    <link rel="manifest" href="/HCMS-assets/img/favicon/site.webmanifest">\n' +
                '    <link rel="mask-icon" href="/HCMS-assets/img/favicon/safari-pinned-tab.svg" color="#fabe3c">\n' +
                '    <link rel="stylesheet" href="/HCMS-assets/css/vendor-23-12-25.css">\n' +
                '    <link rel="stylesheet" href="/HCMS-assets/css/app-23-12-25.css">\n' +
                '    <script>window.currentPage = "invoice-payment"</script>' +
                '    <style>body{padding-top: 0}</style>' +
                '</head>' +
                '<hr>' +
                '' + divToPrint.innerHTML +
                '</body>' +
                '</html>');

            console.log('here');
            newWin.document.close();

            setTimeout(function () {
                newWin.print();
                /*newWin.close();*/
            }, 500);

        }
    });
}