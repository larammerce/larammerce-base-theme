<script type="text/template" id="template-filter-option-tag">
    <li class="chip-item filter-option-tag">
        <span><%- alias %></span>
        <a data-alias="<%- alias %>" class="remove-filter-option-tag" title="بستن">
            <i class="fa fa-times"></i>
        </a>
    </li>
</script>

<script type="text/template" id="template-product-box">
    <div class="col-xxl-25 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12"
         product-box product-price="<%- product.latest_price %>"
         product-id="<%- product.id %>" data-product-id="<%- product.id %>"
         data-discount-group="<%- JSON.stringify(product.discount_group) %>">
        <% flag = false %>
        <% try { %>
        <% const extP = JSON.parse(product.extra_properties) %>
        <% extP.forEach((step,index) => { %>
        <% if(step.key == "availability_type" ) { %>
            <% flag = true %>
            <% availability_value = step.value %>
        <% } %>
        <% }) %>
        <% } catch { %>
        <% } %>
        <div class="product-item product-box <%- product.status %>">
            <a href="<%- product.url %>" target="_blank" title="<%- product.title %>">
                <div class="product-pic ratio-box" data-ratio="1:1">
                    <img src="<%- product.main_photo %>" alt="<%- product.title %>"
                         class="img-fluid <% if(product.secondary_photo) { %> img-main <% } %> ">
                    <% if(product.secondary_photo) { %>
                    <img src="<%- product.secondary_photo %>" alt="<%- product.title %>"
                         class="img-fluid img-secondary">
                    <% } %>

                    <% if(product.has_discount) { %>
                    <div class="ribbon hidden-xs">ویژه
                        <span class="discount-percentage numerical-data"><%- Math.floor((product.previous_price-product.latest_price)/product.previous_price * 100) %></span>٪
                    </div>
                    <% } %>
                    <% if(product.is_location_limited) { %>
                    <div class="ribbon-delivery">
                        <img src="/HCMS-assets/img/icons/delivery.svg" class="icon">
                        فقط
                        <%- product.location_limitations[0].city.name %>
                    </div>
                    <% } %>
                    <a data-toggle="modal"
                       data-product-status="<%- product.status %>"
                       data-product-title="<%- product.title %>"
                       data-product-id="<%- product.id %>"
                       data-product-isCart="<%- product.is_cart %>"
                       data-cart-row-id="<% if(product.is_cart) { %><%- product.cart_information.rowId %><% } %>"
                       data-value="<% if(product.is_cart) { %><%= product.cart_information.count %><% } %>"
                       data-min="<%- product.minimum_allowed_purchase_count %>"
                       data-max="<%- product.maximum_allowed_purchase_count %>"
                       data-product-code="<%- product.code %>"
                       data-product-price="<%- product.latest_price %>"
                       data-product-add-to-cart="/customer/cart/attach-product/<%- product.id %>"
                       data-product-add-to-need-list="/customer/need-list/attach-product/<%- product.id %>"
                       data-product-url="<%- product.url %>"
                       data-product-extra-properties="<%- product.extra_properties %>"
                       data-product-main-photo="<%- product.main_photo %>"
                       data-product-secondary-photo="<%- product.secondary_photo %>"
                       class="btn quick-view hidden-xs"
                       title="مشاهده سریع" target="_blank">
                        <div class="btn-add-basket-icon">
                            <img src="/HCMS-assets/img/eye.svg" alt="basket"/>
                        </div>
                    </a>
                    <% if(product.is_active) { %>
                    <a class="btn add-basket single-add-btn-<%- product.id %> hidden-xs <%- product.is_cart ? 'd-none' : '' %>"
                       title="افزودن به سبد خرید" target="_blank">
                        <div class="btn-add-basket-text">افزودن به سبدخرید</div>
                        <div class="btn-add-basket-icon">
                            <img src="/HCMS-assets/img/basket.svg" alt="basket"/>
                        </div>
                    </a>
                    <div class="counter-box-<%- product.id %> <%- product.is_cart ? '' : 'd-none' %>">
                        <div class="form-group count-group">
                            <input type="text"
                                   class="form-control count-control count-control-local"
                                   name="count-<%- product.id %>"
                                   placeholder="تعداد"
                                   value="<%= product.is_cart ? product.cart_information.count : 0 %>"
                                   data-min="<%- product.minimum_allowed_purchase_count %>"
                                   data-max="<%- product.maximum_allowed_purchase_count %>">
                            <div class="count-increase">+</div>
                            <div class="count-decrease">-</div>
                        </div>
                    </div>
                    <% } else { %>
                    <% if(product.inaccessibility_type ==1){ %>
                    <% if(!product.is_needed){ %>
                    <a href="/customer/need-list/attach-product/<%- product.id %>" class="btn add-need-list hidden-xs"
                       title="خبرم کن" target="_blank">
                        <div class="btn-add-basket-text">خبرم کن</div>
                        <div class="btn-add-basket-icon">
                            <i class="fa fa-bell-o"></i>
                        </div>
                    </a>
                    <% }%>
                    <% } %>
                    <% if(product.inaccessibility_type == 2){ %>
                        <% if(flag && availability_value != 3){ %>
                            <% if(!product.is_needed){ %>
                                <a href="/customer/need-list/attach-product/<%- product.id %>" class="btn add-need-list hidden-xs"
                                   title="خبرم کن" target="_blank">
                                    <div class="btn-add-basket-text">خبرم کن</div>
                                    <div class="btn-add-basket-icon">
                                        <i class="fa fa-bell-o"></i>
                                    </div>
                                </a>
                            <% }%>
                        <% } %>
                    <% } %>
                    <% } %>
                </div>
                <a href="<%- product.url %>" target="_blank" title="<%- product.title %>">
                    <h3 class="product-title hidden-xs"><%- product.title %></h3>
                </a>
                <div class="product-footer hidden-xs">
                    <% if(product.is_active){ %>
                    <div class="product-price unit-price">
                            <span class="before-discount">
                                <% if(product.has_discount) { %>
                                    <span class="price-data discount"><%- product.previous_price %></span>
                                <% } else if(product.discount_group !== null) { %>
                                <span class="sum-price-before">
                                    <span class="price-data discount"></span>
                                </span>
                                <% } %>
                            </span>
                        <span class="after-discount sum-price">
                                <span class="unit-price price-data"><%- product.latest_price %> </span>
                                تومان
                            </span>
                    </div>
                    <% } else { %>
                    <% if(product.inaccessibility_type == 2){ %>
                    <% if(flag){ %>
                        <% if(availability_value == 1){ %>
                            <span class="call">در حال تامین</span>
                        <% } %>
                        <% if(availability_value == 2){ %>
                            <span class="call">به زودی</span>
                        <% } %>
                        <% if(availability_value == 3){ %>
                    <div class="not-available">توقف تولید</div>
                        <% } %>
                    <% } %>
                    <% if(!flag){ %>
                    <span class="call">تماس بگیرید</span>
                    <% } %>
                    <% } %>
                    <% if(product.inaccessibility_type == 1){ %>
                    <div class="not-available">ناموجود</div>
                    <% } %>
                    <% } %>
                    <div class="rating-value">
                        <i class="fa fa-star-o"></i>
                        <span class="numerical-data price-data"><%- product.average_rating %></span>
                    </div>
                </div>
                <div class="pd-item-md-details hidden-xl hidden-lg hidden-md hidden-sm">
                    <% if(product.has_discount) { %>
                    <div class="ribbon">ویژه
                        <span class="discount-percentage numerical-data"><%- Math.floor((product.previous_price-product.latest_price)/product.previous_price * 100) %></span>٪
                    </div>
                    <% } %>

                    <div class="rating-value">
                        <i class="fa fa-star-o"></i>
                        <span class="numerical-data price-data"><%- product.average_rating %></span>
                    </div>
                    <a href="<%- product.url %>" target="_blank" title="<%- product.title %>">
                        <h4 class="product-title"><%- product.title %></h4></a>
                    <% if(product.is_active){ %>
                    <div class="product-price unit-price">
                            <span class="before-discount">
                                <% if(product.has_discount) { %>
                                    <span class="price-data discount"><%- product.previous_price %></span>
                                <% } else if(product.discount_group !== null) { %>
                                    <span class="price-data discount"></span>
                                <% } %>
                            </span>
                        <span class="after-discount">
                                <span class="unit-price price-data"><%- product.latest_price %> </span>
                                تومان
                            </span>
                    </div>
                    <% } else { %>
                    <% if(product.inaccessibility_type ==2){ %>
                    <% if(flag){ %>
                    <% if(availability_value == 1){ %>
                    <span class="call">در حال تامین</span>
                    <% } %>
                    <% if(availability_value == 2){ %>
                    <span class="call">به زودی</span>
                    <% } %>
                    <% if(availability_value == 3){ %>
                    <div class="not-available">توقف تولید</div>
                    <% } %>
                    <% } %>
                    <% if(!flag){ %>
                    <span class="call">تماس بگیرید</span>
                    <% } %>
                    <% } %>
                    <% if(product.inaccessibility_type ==1){ %>
                    <div class="not-available">ناموجود</div>
                    <% } %>
                    <% } %>
                    <div class="btn-row">
                        <% if(product.is_active){ %>
                        <a href="/customer/cart/attach-product/<%- product.id %>"
                           class="btn add-basket single-add-btn-<%- product.id %> <% if(product.is_cart){ %> d-none <% } %>"
                           title="افزودن به سبد خرید" target="_blank"><i class="fa fa-cart-plus"></i>
                        </a>
                        <% } else { %>
                        <% if(product.inaccessibility_type ==1){ %>
                        <a href="/customer/need-list/attach-product/<%- product.id %>" class="btn add-need-list"
                           title="خبرم کن" target="_blank"><i class="fa fa-bell-o"></i>
                        </a>
                        <% } %>
                        <% if(product.inaccessibility_type ==2){ %>
                        <% if(flag && availability_value != 3){ %>
                        <a href="/customer/need-list/attach-product/<%- product.id %>" class="btn add-need-list"
                           title="خبرم کن" target="_blank"><i class="fa fa-bell-o"></i>
                        </a>
                        <% } %>
                        <% if(!flag){ %>
                        <a href="<%- product.url %>" class="btn btn-call"
                           title="تماس بگیرید" target="_blank"><i class="fa fa-phone"></i>
                        </a>
                        <% } %>
                        <% } %>
                        <% } %>
                    </div>
                </div>
            </a>
        </div>
    </div>
</script>



<script type="text/template" id="template-form-input-message">
    <p class="message message-<%- messageColor %>"><%- message %></p>
</script>

<script type="text/template" id="template-form-input">
    <input type="hidden" name="<%- inputName %>" value="<%- inputValue %>"/>
</script>

<script type="text/template" id="template-virtual-form-template">
    <form style="display: none;" action="<%- formAction %>" method="<%- formMethod %>">

    </form>
</script>

<script type="text/template" id="template-rating-stars-container">
    <ul class="rating stars-container">
        <input type="hidden" name="value" value="<%- rateValue %>"/>
    </ul>
</script>

<script type="text/template" id="template-rating-star-empty">
    <li><i class="fa fa-star-o"></i></li>
</script>

<script type="text/template" id="template-rating-star-filled">
    <li><i class="fa fa-star"></i></li>
</script>

<script type="text/template" id="template-rating-star-half">
    <li><i class="fa fa-star-half-o"></i></li>
</script>

<script type="text/template" id="template-search-result-product-box">
    <li>
        <a href="<%- product.url %>" title="<%- product.title %>">
            <div class="pic">
                <img src="<%- product.main_photo %>" alt="<%- product.title %>" class="img-responsive">
            </div>
            <div class="title"><%- product.title %></div>
        </a>
    </li>
</script>

<script type="text/template" id="template-search-result-directory-box">
    <a href="<%- directory.url_full %>" title="<%- directory.title %>">
        <li><%- query %> در دسته <span><%- directory.title %></span></li>
    </a>
</script>

<script type="text/template" id="template-cart-table">
    <div class="table table-bordered">
        <div class="thead row mb-hidden">
            <div class="th col-md-5 col-sm-5">شرح محصول</div>
            <div class="th col-md-2 col-sm-2">قیمت واحد <span>(تومان)</span></div>
            <div class="th col-md-2 col-sm-2">تعداد</div>
            <div class="th col-md-2 col-sm-2">قیمت کل<span>(تومان)</span></div>
            <div class="th col-md-1 col-sm-1">&nbsp;</div>
        </div>
        <div class="tbody">
        </div>
        <div class="tfoot">
            <div class="tr total row">
                <div class="th col-md-5 mb-hidden"></div>
                <div class="th col-md-3 col-sm-6 col-xs-6 col-xxs-6 ttl">جمع کل خرید شما</div>
                <div class="th col-md-4 col-sm-6 col-xs-6 col-xxs-6 price">
                    <span class="price-data cart-sum"></span>
                    <span>تومان</span>
                </div>
            </div>
            <div class="tr payment row">
                <div class="th col-md-5 mb-hidden"></div>
                <div class="th ttl col-md-3 col-sm-6 col-xs-6 col-xxs-6">مبلغ قابل پرداخت</div>
                <div class="th price col-md-4 col-sm-6 col-xs-6 col-xxs-6">
                    <span class="price-data cart-sum"></span>
                    <span>تومان</span>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="template-cart-actions">
    <button type="submit" id="cart-submit" class="btn next" data-text="ادامه ثبت سفارش"><span class="text">ادامه ثبت سفارش</span>
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </button>
    <a href="/" class="btn back" data-text="بازگشت به صفحه اصلی" title="بازگشت به صفحه اصلی">
        <i class="fa fa-angle-right" aria-hidden="true"></i><span class="text">بازگشت به صفحه اصلی</span>
    </a>
    <div class="clearfix"></div>
    <hr/>
    <div class="alert">* افزودن کالاها به سبد خرید به معنی رزرو کالا برای شما نیست. برای ثبت سفاش باید مراحل
        بعدی
        خرید
        را تکمیل نمایید.
    </div>
</script>

{{--<script type="text/template" id="local-cart-type-limit-error">--}}
{{--    <p class="title-count-limit">سقف محدودیت خرید <%- count_limit_basket %> نوع کالا است.</p><br><p><i--}}
{{--                class="fa fa-warning" style="color: #ff8226"></i> در صورت تمایل به ثبت کالای بیشتر لطفا پس تکمیل این--}}
{{--        خرید سفارش جدید ایجاد نمایید.</p>--}}
{{--</script>--}}
<script type="text/template" id="local-cart-type-limit-error">
    <p class="title-count-limit"><%- count_limit_basket %></p>
</script>

<script type="text/template" id="printable-invoice-row">
    <div class="row m-0 product-box pd-list-item">
        <div class="col col-lg-1 col-md-1 col-sm-1 col-1 p-0">
            <div class="percent persian-digit counter-row"><%- row_id %></div>
        </div>
        <div class="col col-lg-1 col-md-1 col-sm-1 col-1 p-0">
            <img src="<%- image.src %>" alt="<%- image.alt %>"
                 class="img-fluid">
        </div>
        <div class="col col-lg-4 p-0 detail-product">
            <div class="product-name">
                <%- title %>
            </div>
        </div>
        <div class="col col-lg-2 col-md-2 col-sm-2 col-2 p-0">
            <div class="unit-price">
                <div class="after-discount">
                    <span class="price-data"><%- latest_price %></span>
                </div>
            </div>
        </div>
        <div class="col col-lg-1 col-md-1 col-sm-1 col-1 p-0">
            <div class="percent persian-digit"><%- count %></div>
        </div>
        <div class="col col-lg-1 col-md-1 col-sm-1 col-1 p-0">
            <div class="persian-digit"><%- discount %></div>
        </div>
        <div class="col col-lg-2 col-md-2 col-sm-2 col-2 p-0">
            <strike><span class="price-data persian-digit sum-row-price">
                <%- before_discount %>
            </span></strike>
            <span class="price-data persian-digit sum-row-price">
                <%- after_discount %> تومان
            </span>
        </div>
    </div>
</script>

<script type="text/template" id="filter-no-result">
    <div class="no-result-desc"><span>«</span>نتیجه‌ای یافت نشد<span>»</span></div>
    <svg enable-background="new 0 0 526 391" version="1.1" viewBox="0 0 526 391" xml:space="preserve"
         xmlns="http://www.w3.org/2000/svg" class="no-result">
            <path d="m124.8 108.1-0.6 0.7 5.9 5.2c0.3 0.2 0.6 0.3 0.9 0.2s0.6-0.4 0.6-0.7l3-15.4c0.1-0.3 0-0.7-0.3-0.9s-0.6-0.3-0.9-0.2l-15 5c-0.3 0.1-0.6 0.4-0.6 0.7-0.1 0.3 0 0.7 0.3 0.9l5.9 5.2 0.8-0.7 0.6-0.7-4.7-4.1 11.8-4-2.4 12.2-4.7-4.1-0.6 0.7z"
                  fill="#df0427"/>
        <path d="m152.7 28.1-0.8 0.2 1.9 7c0.1 0.3 0.3 0.5 0.6 0.6s0.6 0 0.8-0.2l10.2-10.4c0.2-0.2 0.3-0.5 0.2-0.8s-0.3-0.5-0.6-0.6l-14-3.6c-0.3-0.1-0.6 0-0.8 0.2s-0.3 0.5-0.2 0.8l1.9 7 1.6-0.4-1.5-5.6 11.2 2.8-4.1 4.1-4 4.1-1.5-5.6-0.9 0.4z"
              fill="#df0427"/>
        <path d="m429.5 126-0.4 0.8-6.5-3.8c-0.3-0.2-0.4-0.5-0.4-0.8s0.2-0.6 0.4-0.8l13-7.4c0.3-0.2 0.6-0.2 0.9 0s0.4 0.5 0.4 0.8v15c0 0.3-0.2 0.6-0.4 0.8-0.3 0.2-0.6 0.2-0.9 0l-6.5-3.7 0.4-0.9 0.4-0.8 5.1 3v-11.8l-5.2 3-5.1 3 5.1 3-0.3 0.6z"
              fill="#df0427"/>
        <path d="m375.8 102.6 0.9 0.6 5.1-7.7c0.2-0.3 0.2-0.7 0.1-1.1-0.2-0.4-0.5-0.6-0.9-0.6l-18.4-1.2c-0.4 0-0.8 0.2-1 0.5s-0.2 0.7-0.1 1.1l8.2 16.4c0.2 0.4 0.5 0.6 0.9 0.6s0.8-0.2 1-0.5l5.1-7.7-0.9-0.4-0.9-0.6-4 6.1-6.4-13 14.6 1-4 6.1 0.7 0.4z"
              fill="#231F20"/>
        <path d="m329 26.2-0.7-1.2c-0.4 0.2-0.7 0.3-1.1 0.3-0.3 0-0.7-0.1-1-0.3s-0.6-0.4-0.8-0.7c-0.2-0.4-0.3-0.7-0.3-1.1 0-0.3 0.1-0.7 0.3-1s0.4-0.6 0.7-0.8c0.4-0.2 0.7-0.3 1.1-0.3s0.7 0.1 1 0.3 0.6 0.4 0.8 0.7c0.2 0.4 0.3 0.7 0.3 1.1s-0.1 0.7-0.3 1-0.4 0.6-0.7 0.8l1.4 2.4c0.7-0.5 1.3-1.1 1.7-1.8s0.6-1.5 0.6-2.3c0-0.9-0.2-1.8-0.8-2.6-0.5-0.7-1.1-1.3-1.8-1.7s-1.5-0.6-2.3-0.6c-0.9 0-1.8 0.2-2.6 0.8-0.7 0.5-1.3 1.1-1.7 1.8s-0.6 1.5-0.6 2.3c0 0.9 0.2 1.8 0.8 2.6 0.5 0.7 1.1 1.3 1.8 1.7s1.5 0.6 2.3 0.6c0.9 0 1.8-0.2 2.6-0.8l-0.7-1.2z"
              fill="#df0427"/>
        <path d="m490.4 154.7-0.7-1.2c-0.3 0.2-0.7 0.3-1.1 0.3-0.3 0-0.7-0.1-1-0.2-0.3-0.2-0.6-0.4-0.8-0.7s-0.3-0.7-0.3-1.1c0-0.3 0.1-0.7 0.2-1 0.2-0.3 0.4-0.6 0.7-0.8s0.7-0.3 1.1-0.3c0.3 0 0.7 0.1 1 0.2 0.3 0.2 0.6 0.4 0.8 0.7s0.3 0.7 0.3 1.1c0 0.3-0.1 0.7-0.2 1-0.2 0.3-0.4 0.6-0.7 0.8l0.7 1.2 0.7 1.1c0.7-0.5 1.3-1.1 1.7-1.8s0.6-1.5 0.6-2.3c0-0.9-0.2-1.8-0.7-2.5-0.4-0.7-1.1-1.3-1.8-1.7s-1.5-0.6-2.3-0.6c-0.9 0-1.7 0.2-2.5 0.7-0.7 0.5-1.3 1.1-1.7 1.8s-0.6 1.5-0.6 2.3c0 0.9 0.2 1.8 0.7 2.5 0.4 0.7 1.1 1.3 1.8 1.7s1.5 0.6 2.3 0.6c0.9 0 1.7-0.2 2.5-0.7l-0.7-1.1z"
              fill="#231F20"/>









        <path d="m514.6 267.9h-495.3c-3.4 0-6.1-2.7-6.1-6.1s2.7-6.1 6.1-6.1h495.3c3.4 0 6.1 2.7 6.1 6.1-0.1 3.4-2.8 6.1-6.1 6.1z"
              fill="#231F20"/>



        <path d="m260.4 192.3c-20 0-36.2-16.2-36.2-36.2v-17.9c0-20 16.2-36.2 36.2-36.2s36.2 16.2 36.2 36.2v17.9c0 20-16.2 36.2-36.2 36.2z"
              fill="#df0427"/>
        <path d="m260.4 192.3v-1.7c-9.5 0-18.1-3.9-24.4-10.1-6.2-6.2-10.1-14.9-10.1-24.4v-17.9c0-9.5 3.9-18.1 10.1-24.4 6.2-6.2 14.9-10.1 24.4-10.1s18.1 3.9 24.4 10.1c6.2 6.2 10.1 14.9 10.1 24.4v17.9c0 9.5-3.9 18.1-10.1 24.4-6.2 6.2-14.9 10.1-24.4 10.1v3.4c20.9 0 37.9-17 37.9-37.9v-17.9c0-20.9-17-37.9-37.9-37.9s-37.9 17-37.9 37.9v17.9c0 20.9 17 37.9 37.9 37.9v-1.7z"
              fill="#231F20"/>
        <path d="m296.6 146.7s1.6-8.8-0.7-16.8c-2.9-10.1-10.9-20.3-24.8-25.9-2.5-1-4.8-1.5-6.1-1.7 0 0-19-3.5-32.6 13 0 0-11.1 10.7-8.1 39.7 4.1 0 7.4-4.2 7.4-9.4 0-3.4 1.8-6.3 4.4-7.1l39.8-11.6c2.5-0.7 5.1 0.7 6.3 3.6l3.2 7.6c2.2 5.4 6.5 8.6 11.2 8.6z"
              fill="#231F20"/>
        <circle cx="271.6" cy="151.8" r="4.2" fill="#231F20"/>
        <circle cx="249.3" cy="151.8" r="4.2" fill="#231F20"/>
        <path d="m248.7 172.6 1.4-0.4c3.4-1.1 6.9-1.6 10.4-1.6 3.9 0 7.9 0.7 11.6 2 1.3 0.5 2.8-0.2 3.3-1.6 0.5-1.3-0.2-2.8-1.6-3.3-4.3-1.5-8.8-2.3-13.3-2.3-4 0-8 0.6-11.9 1.8l-1.4 0.4c-1.3 0.4-2.1 1.9-1.7 3.2 0.4 1.5 1.9 2.2 3.2 1.8z"
              fill="#231F20"/>
        <path class="rotate-5"
              d="m269.4 140.7 8.5 4.8c0.8 0.5 1.9 0.2 2.3-0.6 0.5-0.8 0.2-1.9-0.6-2.3l-8.5-4.8c-0.8-0.5-1.9-0.2-2.3 0.6-0.5 0.8-0.2 1.8 0.6 2.3"
              fill="#231F20"/>
        <path class="rotate-6"
              d="m248.9 138.6-8.5 4.8c-0.8 0.5-1.1 1.5-0.6 2.3s1.5 1.1 2.3 0.6l8.5-4.8c0.8-0.5 1.1-1.5 0.6-2.3s-1.5-1.1-2.3-0.6"
              fill="#231F20"/>
        <path d="m320.1 253.2h-119.3c-6.6 0-11.9-5.3-11.9-11.9v-66.1c0-6.6 5.3-11.9 11.9-11.9h119.3c6.6 0 11.9 5.3 11.9 11.9v66.1c0.1 6.5-5.3 11.9-11.9 11.9z"
              fill="#fff"/>
        <path d="m320.1 253.2v-2.6h-119.3c-2.6 0-4.9-1-6.6-2.7s-2.7-4-2.7-6.6v-66.1c0-2.6 1-4.9 2.7-6.6s4-2.7 6.6-2.7h119.3c2.6 0 4.9 1 6.6 2.7s2.7 4 2.7 6.6v66.1c0 2.6-1 4.9-2.7 6.6s-4 2.7-6.6 2.7v5.2c8 0 14.5-6.5 14.5-14.5v-66.1c0-8-6.5-14.5-14.5-14.5h-119.3c-8 0-14.5 6.5-14.5 14.5v66.1c0 8 6.5 14.5 14.5 14.5h119.3v-2.6z"
              fill="#231F20"/>
            </svg>
</script>
