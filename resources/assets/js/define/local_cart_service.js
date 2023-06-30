define('local_cart_service', ['jquery', 'jq_cookie', 'tools', 'template', 'underscore'],
    function (jQuery, cookie, tools, template, _) {
        jQuery.cookie.json = true;

        const cartCountEl = jQuery('.cart-count');
        const productSelector = '[product-box]';
        const cartCookie = window.siteEnv.SITE_LOCAL_CART_COOKIE_NAME;
        const cartCountLimit = window.siteEnv.SITE_LOCAL_CART_COUNT_LIMIT;
        const knownRows = {};
        let cartData = jQuery.cookie(cartCookie) || {};
        let extraDiscountAmount = 0;
        let couponAmount = 0;

        let LocalCartService = null;
        return LocalCartService = {
            init: function () {
                if (window.authUser !== null) {
                    let serverSideCart = {};
                    window.userCart.forEach(function (iterRow) {
                        serverSideCart[`${iterRow.product_id}`] = {count: iterRow.count};
                        knownRows[`${iterRow.product_id}`] = iterRow;
                    });

                    let concurrentProcesses = 0;
                    let countOfNewProducts = 0;

                    function reloadPage() {
                        concurrentProcesses--;

                        if (concurrentProcesses === 0 && countOfNewProducts > 0) {
                            location.reload();
                        }
                    }

                    _.each(cartData, function (data, productId) {
                        if (productId in serverSideCart) {
                            if (data.count !== serverSideCart[productId].count) {
                                concurrentProcesses++;
                                LocalCartService.updateCartCount(productId, data.count, function () {
                                    reloadPage();
                                });
                            }
                        } else {
                            concurrentProcesses++;
                            LocalCartService.addToCart(productId, function () {
                                countOfNewProducts++;
                                if (data.count > 1) {
                                    concurrentProcesses++;
                                    LocalCartService.updateCartCount(productId, data.count, function () {
                                        reloadPage();
                                    });
                                }
                                reloadPage();
                            });
                        }
                    });

                    cartData = {...serverSideCart, ...cartData};
                    jQuery.cookie(cartCookie, cartData, {path: '/'});
                }

                jQuery(productSelector).each(function () {
                    LocalCartService.initProductElement(jQuery(this));
                });

                LocalCartService.calculateInvoice();
            },

            initProductElement: function (productElement) {
                const productId = parseInt(productElement.data('product-id'));
                const addToCartButton = productElement.find(".add-basket");
                const counterBox = productElement.find('div[class^="counter-box-"]')
                const countInput = productElement.find('.count-group input.count-control-local');
                const increaseButton = productElement.find('.count-group .count-increase');
                const decreaseButton = productElement.find('.count-group .count-decrease');
                countInput.minVal = countInput.attr('data-min') ? parseInt(countInput.data('min')) : 1;
                countInput.maxVal = countInput.attr('data-max') ? parseInt(countInput.data('max')) : 2;

                function showAddButton() {
                    if (addToCartButton.length > 0) {
                        counterBox.addClass("d-none");
                        addToCartButton.removeClass("d-none");
                    }
                }

                function hideAddButton() {
                    if (addToCartButton.length > 0) {
                        counterBox.removeClass("d-none");
                        addToCartButton.addClass("d-none");
                    }
                }

                increaseButton.on('click', function (event) {
                    event.preventDefault();
                    let thisCount = countInput.val();
                    thisCount = tools.dropNonDigits(thisCount);
                    thisCount = tools.convertNumberToEnglish(thisCount);
                    thisCount = parseInt(thisCount);
                    thisCount += 1;
                    countInput.val(thisCount.toString());
                    countInput.trigger('change');

                    return false;
                });

                decreaseButton.on('click', function (event) {
                    event.preventDefault();
                    let thisCount = countInput.val();
                    thisCount = tools.dropNonDigits(thisCount);
                    thisCount = tools.convertNumberToEnglish(thisCount);
                    thisCount = parseInt(thisCount);
                    thisCount -= 1;
                    countInput.val(thisCount.toString());
                    countInput.trigger('change');

                    return false;
                });


                addToCartButton.on('click', function (_event) {
                    _event.stopPropagation();
                    _event.preventDefault();
                    countInput.val("1");
                    countInput.trigger('change');
                    hideAddButton();
                    return false;
                });

                productElement.find("div.delete > a.del-product").on('click', function (_event) {
                    _event.stopPropagation();
                    _event.preventDefault();
                    LocalCartService.delFromCart(productId, function () {
                        showAddButton();
                        LocalCartService.calculateInvoice();
                    });
                    return false;
                });

                countInput.on('change keyup', function (event) {
                    event.preventDefault();

                    window.cartRowCountUpdateTimeouts = window.cartRowCountUpdateTimeouts || {};
                    clearTimeout(window.cartRowCountUpdateTimeouts[productId]);

                    let thisCount = countInput.val();
                    thisCount = tools.dropNonDigits(thisCount);
                    countInput.val(tools.convertNumberToPersian(`${thisCount}`));
                    thisCount = parseInt(tools.convertNumberToEnglish(thisCount));

                    if (`${productId}` in cartData && cartData[`${productId}`].count === thisCount)
                        return;

                    function update(count) {
                        if (`${productId}` in cartData) {
                            LocalCartService.updateCartCount(productId, thisCount);
                        } else {
                            LocalCartService.addToCart(productId, function () {
                                if (count > countInput.maxVal) {
                                    window.customAlert("حد اکثر تعداد مجاز خرید این محصول " + tools.convertNumberToPersian(newRowObj.countControl.maxVal.toString()) + " عدد میباشد.");
                                    thisCount = countInput.maxVal;
                                }
                                if (thisCount > 1)
                                    LocalCartService.updateCartCount(productId, thisCount);
                            });
                        }
                    }

                    window.cartRowCountUpdateTimeouts[productId] = setTimeout(function () {
                        if (thisCount < countInput.minVal || thisCount === 0) {
                            LocalCartService.delFromCart(productId, function () {
                                showAddButton();
                            }, function () {
                                thisCount = countInput.minVal === 0 ? 1 : countInput.minVal;
                                countInput.val(tools.convertNumberToPersian(`${thisCount}`));
                                update(thisCount);
                            });
                        } else {
                            update(thisCount);
                        }
                        LocalCartService.calculateInvoice();
                    }, 500);

                    return false;
                });

                if (LocalCartService.isInCart(productId)) {
                    countInput.val(cartData[productId].count);
                    hideAddButton();
                } else {
                    showAddButton();
                }

                countInput.trigger('change');
            },

            addToCart: function (productId, callback = null) {
                cartData[`${productId}`] = {count: 1};
                let errorText;

                function localAdd() {
                    jQuery.cookie(cartCookie, cartData, {expires: 10, path: '/'});
                    LocalCartService.updateCartCountBadge();

                    if (typeof callback === "function")
                        callback();
                }

                function showModal(message) {
                    let modalEl = jQuery("#added-to-cart-modal");
                    modalEl.find('p.question').html(message);
                    modalEl.modal('show');
                }

                if (Object.keys(cartData).length <= cartCountLimit) {
                    if (window.authUser === null) {
                        localAdd();
                    } else {
                        jQuery.ajax({
                            type: "GET", url: `/customer/cart/attach-product/${productId}`,
                        }).done(function (_result) {
                            localAdd();
                        }).fail(function (_result) {
                            console.error(_result);
                            if (_result.responseJSON.transmission.messages[0]) {
                                showModal("این محصول قبلا به سبد خرید شما اضافه شده است.");
                            }
                        });
                    }
                } else {
                    errorText = template.localCartTypeLimitError({count_limit_basket: cartCountLimit});
                    showModal(errorText);
                }
            },

            delFromCart: function (productId, accept = null, deny = null) {
                if (!(productId in cartData))
                    return false;

                function localDel() {
                    delete cartData[`${productId}`];
                    jQuery.cookie(cartCookie, cartData, {expires: 10, path: '/'});

                    LocalCartService.updateCartCountBadge();

                    if (typeof accept === "function")
                        accept();

                    if (window.currentPage === "cart") jQuery('[data-product-id=' + productId + ']').remove();
                }

                window.customConfirm("آیا از پاک کردن این محصول از سبد خرید خود اطمینان دارید ؟", function () {
                    if (window.authUser !== null) {
                        jQuery.ajax({
                            type: "GET", url: `/customer/cart/detach-product/${productId}`,
                        }).done(function (_result) {
                            localDel();
                        }).fail(function (_result) {
                            console.error(_result);
                        });
                    } else {
                        localDel();
                    }
                }, function () {
                    if (typeof deny === "function")
                        deny();
                });
            },

            isInCart: function (productId) {
                return `${productId}` in cartData;
            },

            getRow: function (productId) {
                return cartData[`${productId}`];
            },

            updateCartCount: function (productId, count, callback = null) {

                function localUpdate() {
                    cartData[`${productId}`] = {count: count};
                    jQuery.cookie(cartCookie, cartData, {expires: 10, path: '/'});

                    if (typeof callback === "function")
                        callback();
                }

                if (window.authUser !== null) {
                    jQuery.ajax({
                        type: 'GET',
                        url: `/customer/cart/update-count/${productId}`,
                        data: {
                            count: count
                        }
                    }).done(function (_result) {
                        localUpdate();
                    }).fail(function (_error) {
                        console.log(_error);
                    });
                } else {
                    localUpdate();
                }
            },

            updateCartCountBadge: function () {
                cartCountEl.removeClass("hidden");
                cartCountEl.html(Object.keys(cartData).length);
                cartCountEl.numericalData();
            },

            calculateInvoice: function () {
                setTimeout(function () {
                    LocalCartService.directCalculateInvoice()
                }, 50);
            },

            directCalculateInvoice: function () {
                let finalPriceBeforeDiscount = 0;
                let finalPriceAfterDiscount = 0;
                let loadedIds = [];

                jQuery(productSelector).each(function () {
                    const thisEl = jQuery(this);
                    const pId = thisEl.data('product-id');
                    const discountContainerEl = thisEl.find(".discount-container");
                    let priceWithoutDiscount = parseInt(thisEl.attr('product-price'));
                    let count = jQuery('[data-product-id=' + pId + '] .counter-box-' + pId + ' .count-control').val();
                    count = tools.convertNumberToEnglish(count);

                    const discountGroup = thisEl.data("discount-group");
                    let isDiscountPercentage = false;
                    let discount = 0;
                    const specialDiscount = discountContainerEl.find(".price-data.discount-value.special");
                    if (specialDiscount.length > 0) {
                        discount = specialDiscount.data("amount");
                    } else if (discountGroup !== null && typeof discountGroup !== "undefined") {
                        isDiscountPercentage = discountGroup.is_percentage;
                        discount = tools.calculateDiscount(discountGroup, count, priceWithoutDiscount);
                        if (discountContainerEl.hasClass("discount-list")) {
                            discountContainerEl.find("li.active").removeClass("active");
                            discountContainerEl.find(`li[data-discount-value='${discount}']`).addClass("active");
                        } else {
                            discountContainerEl.find(".discount-value").text(tools.convertNumberToPersian(`${discount}`));
                        }
                    }
                    loadedIds.push(`${pId}`);
                    if (count > 0) {
                        let priceAfterDiscount = count * (priceWithoutDiscount - (isDiscountPercentage ? (priceWithoutDiscount * discount / 100) : discount));
                        priceWithoutDiscount = count * priceWithoutDiscount;
                        finalPriceBeforeDiscount += priceWithoutDiscount;
                        finalPriceAfterDiscount += priceAfterDiscount;
                        LocalCartService.updateSumProductPrice(pId, priceAfterDiscount, priceWithoutDiscount);
                    } else {
                        let priceAfterDiscount = priceWithoutDiscount - (isDiscountPercentage ? (priceWithoutDiscount * discount / 100) : discount);
                        LocalCartService.updateSumProductPrice(pId, priceAfterDiscount, priceWithoutDiscount);
                    }

                });

                Object.keys(cartData).filter((iterId) => {
                    return !loadedIds.includes(iterId);
                }).forEach((iterId) => {
                        const iterRow = knownRows[iterId];
                        if (typeof iterRow === "undefined")
                            return;
                        if (iterRow.product.has_discount && iterRow.product.previous_price !== 0) {
                            finalPriceBeforeDiscount += iterRow.count * iterRow.product.previous_price;
                            finalPriceAfterDiscount += iterRow.count * iterRow.product.latest_price;
                        } else {
                            const discount = iterRow.product.discount_group !== null ?
                                tools.calculateDiscount(iterRow.product.discount_group, iterRow.count, iterRow.product.latest_price) : 0;
                            finalPriceAfterDiscount += iterRow.count * (iterRow.product.latest_price -
                                ((iterRow.product.discount_group !== null && iterRow.product.discount_group.is_percentage) ? (iterRow.product.latest_price * discount / 100) : discount));
                            finalPriceBeforeDiscount += iterRow.count * iterRow.product.latest_price;
                        }
                    }
                );

                const beforeDiscountPriceContainer = jQuery('.invoice-sum-container .before-discount .price-data');
                const afterDiscountPriceContainer = jQuery('.invoice-sum-container .after-discount .price-data');
                const taxPriceContainer = jQuery('.invoice-sum-container .tax .price-data');
                const discountPriceContainer = jQuery('.invoice-sum-container .discount .price-data');
                const couponAmountContainer = jQuery('.invoice-sum-container .coupon .price-data');

                if (beforeDiscountPriceContainer.length === 0 || afterDiscountPriceContainer.length === 0) return false;

                beforeDiscountPriceContainer.text(`${finalPriceBeforeDiscount}`);
                taxPriceContainer.text(`${parseInt((finalPriceAfterDiscount - (extraDiscountAmount + couponAmount)) * 0.09)}`);
                if (window.currentPage === "product-list")
                    afterDiscountPriceContainer.text(`${parseInt(finalPriceAfterDiscount - (extraDiscountAmount + couponAmount))}`);
                else
                    afterDiscountPriceContainer.text(`${parseInt((finalPriceAfterDiscount - (extraDiscountAmount + couponAmount)) * 1.09)}`);
                discountPriceContainer.text(`${parseInt(finalPriceBeforeDiscount - finalPriceAfterDiscount + extraDiscountAmount)}`);
                couponAmountContainer.text(`${parseInt(couponAmount)}`);

                if (finalPriceAfterDiscount === finalPriceBeforeDiscount && window.currentPage !== "cart") {
                    beforeDiscountPriceContainer.fadeOut();
                } else {
                    beforeDiscountPriceContainer.fadeIn();
                }

                jQuery('.price-data').formatPrice();
            },

            updateSumProductPrice: function (id, sumPriceRow, sumPriceBefore = 0) {
                const sumPriceContainer = jQuery('[data-product-id=' + id + '] .sum-price .price-data');
                const sumPriceBeforeContainer = jQuery('[data-product-id=' + id + '] .sum-price-before .price-data');
                const taxPriceContainer = jQuery('[data-product-id=' + id + '] .tax-price .price-data');

                if (sumPriceContainer.length > 0) {
                    sumPriceContainer.text(sumPriceRow);
                    sumPriceContainer.formatPrice();

                    taxPriceContainer.text(parseInt(sumPriceRow * 0.09));
                    sumPriceContainer.formatPrice();
                }
                if (sumPriceBeforeContainer.length > 0) {
                    sumPriceBeforeContainer.text(sumPriceBefore);
                    sumPriceBeforeContainer.formatPrice();
                }

                if (sumPriceRow === sumPriceBefore) {
                    sumPriceBeforeContainer.fadeOut();
                } else {
                    sumPriceBeforeContainer.fadeIn();
                }
            },

            setExtraDiscountAmount: function (amount) {
                extraDiscountAmount = amount;
                LocalCartService.calculateInvoice();
            },

            setCouponAmount : function(amount) {
                couponAmount = amount;
                LocalCartService.calculateInvoice();
            }
        };
    });