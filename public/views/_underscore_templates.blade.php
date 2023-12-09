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

<script type="text/template" id="local-cart-type-limit-error">
    <p class="title-count-limit">سقف محدودیت خرید <%- count_limit_basket %> نوع کالا است.</p><br><p><i
                class="fa fa-warning" style="color: #ff8226"></i> در صورت تمایل به ثبت کالای بیشتر لطفا پس تکمیل این
        خرید سفارش جدید ایجاد نمایید.</p>
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
        <path d="m73.2 86.8-0.7-1.2c-0.3 0.2-0.7 0.3-1.1 0.3-0.3 0-0.7-0.1-1-0.2-0.3-0.2-0.6-0.4-0.8-0.7s-0.3-0.7-0.3-1.1c0-0.3 0.1-0.7 0.2-1 0.2-0.3 0.4-0.6 0.7-0.8s0.7-0.3 1.1-0.3c0.3 0 0.7 0.1 1 0.2 0.3 0.2 0.6 0.4 0.8 0.7s0.3 0.7 0.3 1.1c0 0.3-0.1 0.7-0.2 1-0.2 0.3-0.4 0.6-0.7 0.8l0.7 1.2 0.7 1.1c0.7-0.5 1.3-1.1 1.7-1.8s0.6-1.5 0.6-2.3c0-0.9-0.2-1.8-0.7-2.5-0.4-0.7-1.1-1.3-1.8-1.7s-1.5-0.6-2.3-0.6c-0.9 0-1.7 0.2-2.5 0.7-0.7 0.5-1.3 1.1-1.7 1.8s-0.6 1.5-0.6 2.3c0 0.9 0.2 1.8 0.7 2.5 0.4 0.7 1.1 1.3 1.8 1.7s1.5 0.6 2.3 0.6c0.9 0 1.7-0.2 2.5-0.7l-0.7-1.1z"
              fill="#231F20"/>
        <path d="m180.7 89.4-0.7-1.2c-0.3 0.2-0.7 0.3-1.1 0.3-0.3 0-0.7-0.1-1-0.2-0.3-0.2-0.6-0.4-0.8-0.7s-0.3-0.7-0.3-1.1c0-0.3 0.1-0.7 0.2-1 0.2-0.3 0.4-0.6 0.7-0.8s0.7-0.3 1.1-0.3c0.3 0 0.7 0.1 1 0.2 0.3 0.2 0.6 0.4 0.8 0.7s0.3 0.7 0.3 1.1c0 0.3-0.1 0.7-0.2 1-0.2 0.3-0.4 0.6-0.7 0.8l0.7 1.2 0.7 1.1c0.7-0.5 1.3-1.1 1.7-1.8s0.6-1.5 0.6-2.3c0-0.9-0.2-1.8-0.7-2.5-0.4-0.7-1.1-1.3-1.8-1.7s-1.5-0.6-2.3-0.6c-0.9 0-1.7 0.2-2.5 0.7-0.7 0.5-1.3 1.1-1.7 1.8s-0.6 1.5-0.6 2.3c0 0.9 0.2 1.8 0.7 2.5 0.4 0.7 1.1 1.3 1.8 1.7s1.5 0.6 2.3 0.6c0.9 0 1.7-0.2 2.5-0.7l-0.7-1.1z"
              fill="#231F20"/>
        <path d="m391.6 58-0.7-1.2c-0.3 0.2-0.7 0.3-1.1 0.3-0.3 0-0.7-0.1-1-0.2-0.3-0.2-0.6-0.4-0.8-0.7s-0.3-0.7-0.3-1.1c0-0.3 0.1-0.7 0.2-1 0.2-0.3 0.4-0.6 0.7-0.8s0.7-0.3 1.1-0.3c0.3 0 0.7 0.1 1 0.2 0.3 0.2 0.6 0.4 0.8 0.7s0.3 0.7 0.3 1.1c0 0.3-0.1 0.7-0.2 1-0.2 0.3-0.4 0.6-0.7 0.8l0.7 1.2 0.7 1.1c0.7-0.5 1.3-1.1 1.7-1.8s0.6-1.5 0.6-2.3c0-0.9-0.2-1.8-0.7-2.5-0.4-0.7-1.1-1.3-1.8-1.7s-1.5-0.6-2.3-0.6c-0.9 0-1.7 0.2-2.5 0.7-0.7 0.5-1.3 1.1-1.7 1.8s-0.6 1.5-0.6 2.3c0 0.9 0.2 1.8 0.7 2.5s1.1 1.3 1.8 1.7 1.5 0.6 2.3 0.6c0.9 0 1.7-0.2 2.5-0.7l-0.7-1.1z"
              fill="#231F20"/>
        <path d="m58.1 175.8-0.8-1.2c-0.4 0.2-0.8 0.3-1.2 0.3s-0.7-0.1-1-0.3-0.6-0.4-0.8-0.8-0.3-0.8-0.3-1.2 0.1-0.7 0.3-1 0.4-0.6 0.8-0.8 0.8-0.3 1.2-0.3 0.7 0.1 1 0.3 0.6 0.4 0.8 0.8 0.3 0.8 0.3 1.2-0.1 0.7-0.3 1-0.4 0.6-0.8 0.8l1.6 2.4c0.8-0.5 1.4-1.1 1.8-1.9 0.4-0.7 0.6-1.6 0.6-2.4 0-0.9-0.3-1.9-0.8-2.7s-1.1-1.4-1.9-1.8c-0.7-0.4-1.6-0.6-2.4-0.6-0.9 0-1.9 0.3-2.7 0.8s-1.4 1.1-1.8 1.9c-0.4 0.7-0.6 1.6-0.6 2.4 0 0.9 0.3 1.9 0.8 2.7s1.1 1.4 1.9 1.8c0.7 0.4 1.6 0.6 2.4 0.6 0.9 0 1.9-0.3 2.7-0.8l-0.8-1.2z"/>
        <path d="m422.1 204.2c-0.3-0.1-0.4-0.4-0.4-0.7v-16.1c0-0.5 0.4-0.8 0.8-0.8h14.2c0.5 0 0.8 0.4 0.8 0.8v16.1c0 0.3-0.2 0.6-0.4 0.7-0.3 0.1-0.6 0.2-0.8 0-4.1-2.3-9.3-2.3-13.4 0-0.1 0.1-0.3 0.1-0.4 0.1-0.1 0.1-0.3 0-0.4-0.1zm13.8-2v-13.9h-12.5v13.9c2-0.9 4.1-1.3 6.3-1.3 2.1-0.1 4.2 0.4 6.2 1.3z"
              fill="#231F20"/>
        <path d="m440.3 255h-21.3l-3.6-42.6c-0.7-7.8 6.4-14.2 14.2-14.2s14.9 6.4 14.2 14.2l-3.5 42.6z" fill="#fff"/>
        <path d="m418.1 255-3.6-42.6c-0.3-3.7 1-7.2 3.6-10.1 2.9-3.2 7.1-5 11.4-5s8.5 1.8 11.5 5c2.6 2.8 3.9 6.4 3.6 10.1l-3.5 42.6c0 0.4-0.4 0.8-0.8 0.8h-21.3c-0.5 0-0.8-0.3-0.9-0.8zm24.9-42.7c0.3-3.2-0.9-6.3-3.2-8.8-2.6-2.8-6.4-4.5-10.2-4.5s-7.6 1.7-10.2 4.5c-2.3 2.5-3.4 5.6-3.2 8.8l3.5 41.9h19.8l3.5-41.9z"
              fill="#231F20"/>
        <polygon points="416.9 230.1 416.6 226.5 442.6 226.5 442.4 230.1" fill="#df0427"/>
        <path d="m416.1 230.2-0.3-3.6c0-0.2 0.1-0.5 0.2-0.6 0.2-0.2 0.4-0.3 0.6-0.3h26c0.2 0 0.5 0.1 0.6 0.3 0.2 0.2 0.2 0.4 0.2 0.6l-0.3 3.6c0 0.4-0.4 0.8-0.8 0.8h-25.5c-0.3-0.1-0.7-0.4-0.7-0.8zm25.6-2.8h-24.2l0.2 1.9h23.9l0.1-1.9z"
              fill="#231F20"/>
        <rect x="422.5" y="187.5" width="14.2" height="3.6" fill="#231F20"/>
        <path d="m421.7 186.6h15.9v5.2h-15.9v-5.2zm14.2 1.7h-12.5v1.9h12.5v-1.9z" fill="#231F20"/>
        <path d="m361.5 213.8c0.2 0.1 0.3 0.2 0.5 0.2 1.3 0.5 2.9 0 4.6-1.4 0.9-0.7 2.1-1.5 3.1-1.2s1.5 1.7 1.6 2.2c0.1 0.4 0.5 0.6 0.9 0.6 0.4-0.1 0.6-0.5 0.6-0.9 0-0.1-0.6-2.6-2.6-3.3-1.3-0.5-2.9 0-4.6 1.4-0.9 0.7-2.1 1.5-3.1 1.2s-1.5-1.7-1.6-2.2c-0.1-0.4-0.5-0.6-0.9-0.6-0.4 0.1-0.6 0.5-0.6 0.9 0.1 0.1 0.5 2.2 2.1 3.1z"
              fill="#231F20"/>
        <path d="m361.1 219.2c0.8 0.4 1.9 0.9 3.1 0.5 1.3-0.4 2.3-1.7 2.9-3.8 0.3-1.1 0.9-2.5 1.9-2.8 1.2-0.4 2.6 0.9 2.6 0.9 0.3 0.3 0.8 0.2 1-0.1 0.3-0.3 0.2-0.8-0.1-1-0.1-0.1-2-1.8-4-1.2-1.3 0.4-2.3 1.7-2.9 3.8-0.3 1.1-0.9 2.5-1.9 2.8s-2.2-0.5-2.6-0.9c-0.3-0.3-0.8-0.2-1 0.1-0.3 0.3-0.2 0.8 0.1 1 0 0.1 0.3 0.4 0.9 0.7z"
              fill="#df0427"/>
        <path d="m397.9 213.5h-25.8l-6.8 10.2c-0.9 1.4 0.1 3.3 1.7 3.3h35.9c1.7 0 2.6-1.9 1.7-3.3l-6.7-10.2z"
              fill="#df0427"/>
        <path d="m364.6 226.3c-0.5-0.9-0.5-2.1 0.1-3l6.8-10.2c0.1-0.2 0.4-0.3 0.6-0.3h25.8c0.2 0 0.5 0.1 0.6 0.3l6.8 10.2c0.6 0.9 0.6 2 0.1 3-0.5 0.9-1.4 1.5-2.5 1.5h-35.9c-0.5 0-1-0.1-1.4-0.4s-0.8-0.6-1-1.1zm7.9-12-6.5 9.9c-0.3 0.4-0.3 1-0.1 1.4s0.7 0.7 1.2 0.7h35.9c0.5 0 0.9-0.3 1.2-0.7 0.2-0.5 0.2-1-0.1-1.4l-6.5-9.9h-25.1z"
              fill="#231F20"/>
        <path d="m397.9 213.5h-25.8l-6.7-10.2c-0.9-1.4 0.1-3.3 1.7-3.3h35.9c1.7 0 2.6 1.9 1.7 3.3l-6.8 10.2z"
              fill="#fff"/>
        <path d="m371.5 213.9-6.7-10.2c-0.6-0.9-0.6-2-0.1-3 0.5-0.9 1.4-1.5 2.5-1.5h35.9c1 0 2 0.6 2.5 1.5s0.4 2.1-0.1 3l-6.8 10.2c-0.1 0.2-0.4 0.3-0.6 0.3h-25.8c-0.1 0-0.3 0-0.4-0.1-0.3 0-0.4-0.1-0.4-0.2zm32.5-11c0.3-0.4 0.3-1 0.1-1.4s-0.7-0.7-1.2-0.7h-35.9c-0.5 0-0.9 0.3-1.2 0.7-0.2 0.5-0.2 1 0.1 1.4l6.5 9.9h25l6.6-9.9z"
              fill="#231F20"></path>
        <path d="m392 200h-14l-6.7-10.2c-0.9-1.4 0.1-3.3 1.7-3.3h23.9c1.6 0 2.6 1.9 1.7 3.3l-6.6 10.2z" fill="#fff"/>
        <path d="m377.4 200.4-6.7-10.2c-0.6-0.9-0.6-2-0.1-3 0.5-0.9 1.4-1.5 2.4-1.5h23.9c1 0 1.9 0.6 2.4 1.5s0.5 2.1-0.1 3l-6.7 10.2c-0.1 0.2-0.4 0.3-0.6 0.3h-14c-0.1 0-0.3 0-0.4-0.1 0 0-0.1-0.1-0.1-0.2zm20.6-11c0.3-0.4 0.3-1 0.1-1.5-0.2-0.4-0.7-0.7-1.1-0.7h-23.9c-0.5 0-0.9 0.3-1.1 0.7-0.3 0.5-0.2 1 0.1 1.5l6.4 9.9h13.2l6.3-9.9z"
              fill="#231F20"/>
        <path d="m365.9 254.4c-1.1-0.9-1.7-2.1-1.7-3.4v-12c0-0.1 0-0.3 0.1-0.4l8-12c0.1-0.2 0.4-0.3 0.6-0.3h24c0.2 0 0.5 0.1 0.6 0.3l8 12c0.1 0.1 0.1 0.3 0.1 0.4v12c0 1.3-0.6 2.5-1.7 3.4s-2.5 1.3-4 1.3h-30c-1.2 0-2.3-0.3-3.3-0.9-0.2 0-0.4-0.2-0.7-0.4zm30.7-26.6h-23.2l-7.7 11.5v11.8c0 0.8 0.4 1.6 1.2 2.3s1.9 1 3.1 1h30c1.2 0 2.3-0.4 3.1-1s1.2-1.4 1.2-2.3v-11.8l-7.7-11.5z"
              fill="#231F20"/>
        <path d="m399.9 255.1h-30c-2.8 0-5-1.8-5-4v-6l40-6v12c0.1 2.2-2.2 4-5 4z" fill="#df0427"/>
        <path d="m365.9 254.4c-1.1-0.9-1.7-2.1-1.7-3.4v-6c0-0.4 0.3-0.7 0.6-0.7l40-6c0.2 0 0.4 0 0.6 0.2 0.2 0.1 0.3 0.3 0.3 0.6v12c0 1.3-0.6 2.5-1.7 3.4s-2.5 1.3-4 1.3h-30c-1.2 0-2.3-0.3-3.3-0.9-0.3-0.1-0.5-0.3-0.8-0.5zm-0.2-8.7v5.4c0 0.8 0.4 1.6 1.2 2.3s1.9 1 3.1 1h30c1.2 0 2.3-0.4 3.1-1s1.2-1.4 1.2-2.3v-11.1l-38.6 5.7z"
              fill="#231F20"/>
        <path d="m112.9 251.5h22c2 0 3.7-1.6 3.7-3.7v-39.2h-29.3v39.2c-0.1 2 1.5 3.7 3.6 3.7z" fill="#fff"/>
        <path d="m136.7 251.7c-0.6 0.3-1.2 0.4-1.8 0.4h-22c-1.1 0-2.2-0.4-3-1.3-0.8-0.8-1.3-1.9-1.3-3v-39.2c0-0.2 0.1-0.3 0.2-0.4s0.3-0.2 0.4-0.2h29.3c0.3 0 0.6 0.3 0.6 0.6v39.2c0 1.1-0.4 2.2-1.3 3-0.3 0.4-0.7 0.7-1.1 0.9zm-26.9-42.5v38.6c0 1.7 1.4 3.1 3.1 3.1h22c0.8 0 1.6-0.3 2.2-0.9s0.9-1.3 0.9-2.2v-38.6h-28.2z"
              fill="#231F20"/>
        <path d="m109.5 231.1c-0.1 0-0.2 0.1-0.3 0.1-8.4 0-15.3-6.9-15.3-15.3 0-4.1 1.6-7.9 4.5-10.8s6.7-4.5 10.8-4.5c0.3 0 0.6 0.3 0.6 0.6s-0.3 0.6-0.6 0.6c-3.8 0-7.3 1.5-9.9 4.1-2.7 2.7-4.1 6.2-4.1 9.9 0 7.7 6.3 14.1 14 14.1 0.3 0 0.6 0.3 0.6 0.6s-0.1 0.5-0.3 0.6z"
              fill="#231F20"/>
        <path d="m109.5 223.8c-0.1 0-0.2 0.1-0.3 0.1-4.4 0-7.9-3.6-7.9-7.9 0-4.4 3.6-7.9 7.9-7.9 0.3 0 0.6 0.3 0.6 0.6s-0.3 0.6-0.6 0.6c-3.7 0-6.7 3-6.7 6.7s3 6.7 6.7 6.7c0.3 0 0.6 0.3 0.6 0.6 0 0.2-0.1 0.4-0.3 0.5z"
              fill="#231F20"/>
        <rect x="109.2" y="201.2" width="29.3" height="7.3" fill="#df0427"/>
        <path d="m138.8 209.1c-0.1 0-0.2 0.1-0.3 0.1h-29.3c-0.3 0-0.6-0.3-0.6-0.6v-7.3c0-0.2 0.1-0.3 0.2-0.4s0.3-0.2 0.4-0.2h29.3c0.2 0 0.3 0.1 0.4 0.2s0.2 0.3 0.2 0.4v7.3c0 0.2-0.1 0.4-0.3 0.5zm-29-1.1h28.1v-6.1h-28.1v6.1z"
              fill="#231F20"/>
        <path d="m112.9 193.9h25.7c2 0 3.7 1.7 3.7 3.7v3.7h-33v-3.7c-0.1-2 1.6-3.7 3.6-3.7z" fill="#fff"/>
        <path d="m142.5 201.8c-0.1 0-0.2 0.1-0.3 0.1h-33c-0.3 0-0.6-0.3-0.6-0.6v-3.7c0-1.1 0.4-2.2 1.3-3 0.8-0.8 1.9-1.3 3-1.3h25.7c2.4 0 4.3 1.9 4.3 4.3v3.7c0 0.2-0.1 0.3-0.2 0.4-0.1 0-0.2 0.1-0.2 0.1zm-32.7-1.2h31.8v-3.1c0-1.7-1.4-3.1-3.1-3.1h-25.7c-0.8 0-1.6 0.3-2.2 0.9s-0.9 1.3-0.9 2.2l0.1 3.1z"
              fill="#231F20"/>
        <path d="m116.5 255.1h14.7c1 0 1.8-0.8 1.8-1.8v-1.8h-18.3v1.8c0 1 0.8 1.8 1.8 1.8z" fill="#df0427"/>
        <path d="m132.2 255.5c-0.3 0.2-0.7 0.2-1 0.2h-14.7c-0.6 0-1.3-0.3-1.7-0.7s-0.7-1.1-0.7-1.7v-1.8c0-0.3 0.3-0.6 0.6-0.6h18.3c0.2 0 0.3 0.1 0.4 0.2s0.2 0.3 0.2 0.4v1.8c0 1-0.6 1.8-1.4 2.2zm-16.9-3.4v1.2c0 0.7 0.6 1.2 1.2 1.2h14.7c0.7 0 1.2-0.6 1.2-1.2v-1.2h-17.1z"
              fill="#231F20"/>
        <path d="m111.1 190.2h25.7c1 0 1.8-0.8 1.8-1.8s-0.8-1.8-1.8-1.8h-25.7c-1 0-1.8 0.8-1.8 1.8-0.1 1 0.7 1.8 1.8 1.8z"
              fill="#df0427"/>
        <path d="m137.7 190.6c-0.3 0.2-0.7 0.2-1 0.2h-25.7c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4h25.7c1.3 0 2.4 1.1 2.4 2.4 0 1-0.5 1.8-1.4 2.2zm-27.2-3.3c-0.4 0.2-0.7 0.6-0.7 1.1 0 0.3 0.1 0.6 0.4 0.9 0.2 0.2 0.5 0.4 0.9 0.4h25.7c0.7 0 1.2-0.5 1.2-1.2s-0.6-1.2-1.2-1.2h-25.7c-0.2-0.1-0.4-0.1-0.6 0z"
              fill="#231F20"/>
        <path d="m123.9 182.9h3.7c0-2-1.6-3.7-3.7-3.7-2 0-3.7 1.6-3.7 3.7h3.7z" fill="#df0427"/>
        <path d="m127.8 183.5c-0.1 0-0.2 0.1-0.3 0.1h-7.3c-0.3 0-0.6-0.3-0.6-0.6 0-1.1 0.4-2.2 1.3-3 0.8-0.8 1.9-1.3 3-1.2 2.4 0 4.3 1.9 4.3 4.3 0 0.2-0.1 0.3-0.2 0.4-0.1-0.1-0.1-0.1-0.2 0zm-6.9-1.2h6c-0.3-1.4-1.5-2.5-3-2.5-0.8 0-1.6 0.3-2.2 0.9-0.4 0.5-0.7 1-0.8 1.6z"
              fill="#231F20"/>
        <path d="m124.1 216.4c-0.1 0-0.2 0.1-0.3 0.1-0.3 0-0.6-0.3-0.6-0.6v-33c0-0.3 0.3-0.6 0.6-0.6s0.6 0.3 0.6 0.6v33c0.1 0.2-0.1 0.5-0.3 0.5z"
              fill="#231F20"/>
        <path d="m124.9 223.6c-0.3 0.2-0.7 0.2-1 0.2-1.3 0-2.4-1.1-2.4-2.4v-3.7c0-1.3 1.1-2.4 2.4-2.4 0.6 0 1.3 0.3 1.7 0.7 0.5 0.5 0.7 1.1 0.7 1.7v3.7c0 1-0.6 1.8-1.4 2.2zm-1.6-7c-0.4 0.2-0.7 0.6-0.7 1.1v3.7c0 0.7 0.5 1.2 1.2 1.2 0.3 0 0.6-0.1 0.9-0.4 0.2-0.2 0.4-0.5 0.4-0.9v-3.7c0-0.3-0.1-0.6-0.4-0.9-0.2-0.2-0.5-0.4-0.9-0.4-0.1 0.2-0.3 0.2-0.5 0.3z"
              fill="#231F20"/>
        <path d="m514.6 267.9h-495.3c-3.4 0-6.1-2.7-6.1-6.1s2.7-6.1 6.1-6.1h495.3c3.4 0 6.1 2.7 6.1 6.1-0.1 3.4-2.8 6.1-6.1 6.1z"
              fill="#231F20"/>
        <g class="rotate-3">
            <path d="m172.9 259.1c-2.6 0-4.7 2.1-4.7 4.7v34l1.5 1.5h6.4c0.8 0 1.5-0.7 1.5-1.5v-34c0-2.6-2.1-4.7-4.7-4.7z"
                  fill="#fff"/>
            <path d="m192.1 353.7v1.5c0 0.7-0.5 1.2-1.2 1.2h-8.9c-0.7 0-1.2-0.5-1.2-1.2v-1.5c0-0.7 0.5-1.2 1.2-1.2h8.9c0.7 0 1.2 0.5 1.2 1.2zm-1.4 1.3v-1.1h-8.5v1.1h8.5z"
                  fill="#231F20"/>
            <path d="m192.1 348.7v1.5c0 0.7-0.5 1.2-1.2 1.2h-8.9c-0.7 0-1.2-0.5-1.2-1.2v-1.5c0-0.7 0.5-1.2 1.2-1.2h8.9c0.7 0 1.2 0.6 1.2 1.2zm-1.4 1.3v-1.1h-8.5v1.1h8.5z"
                  fill="#231F20"/>
            <path d="m192.1 343.8v1.5c0 0.7-0.5 1.2-1.2 1.2h-8.9c-0.7 0-1.2-0.5-1.2-1.2v-1.5c0-0.7 0.5-1.2 1.2-1.2h8.9c0.7 0 1.2 0.5 1.2 1.2zm-1.4 1.3v-1.1h-8.5v1.1h8.5z"
                  fill="#231F20"/>
            <path d="m192.1 338.8v1.5c0 0.7-0.5 1.2-1.2 1.2h-8.9c-0.7 0-1.2-0.5-1.2-1.2v-1.5c0-0.7 0.5-1.2 1.2-1.2h8.9c0.7 0 1.2 0.6 1.2 1.2zm-1.4 1.3v-1.1h-8.5v1.1h8.5z"
                  fill="#231F20"/>
            <path d="m192.1 333.9v1.5c0 0.7-0.5 1.2-1.2 1.2h-8.9c-0.7 0-1.2-0.5-1.2-1.2v-1.5c0-0.7 0.5-1.2 1.2-1.2h8.9c0.7 0 1.2 0.5 1.2 1.2zm-1.4 1.3v-1.1h-8.5v1.1h8.5z"
                  fill="#231F20"/>
            <path d="m192.1 329v1.5c0 0.7-0.5 1.2-1.2 1.2h-8.9c-0.7 0-1.2-0.5-1.2-1.2v-1.5c0-0.7 0.5-1.2 1.2-1.2h8.9c0.7 0 1.2 0.5 1.2 1.2zm-1.4 1.2v-1.1h-8.5v1.1h8.5z"
                  fill="#231F20"/>
            <path d="m180.3 356.6v-29.2c0-0.8-0.7-1.5-1.5-1.5h-3.5v-26h-4.9v56.7c0 0.8 0.7 1.5 1.5 1.5h6.9c0.8 0 1.5-0.6 1.5-1.5z"
                  fill="#df0427"/>
            <path d="m181 327.5v29.2c0 1.2-1 2.2-2.2 2.2h-6.9c-1.2 0-2.2-1-2.2-2.2v-57.4h6.3v26h2.8c1.2 0 2.2 1 2.2 2.2zm-9.9 29.1c0 0.4 0.4 0.8 0.8 0.8h6.9c0.4 0 0.8-0.4 0.8-0.8v-29.2c0-0.4-0.4-0.8-0.8-0.8h-4.2v-26h-3.5v56z"
                  fill="#231F20"/>
            <path d="m178.5 264.2v33.1c0 1.2-1 2.2-2.2 2.2h-6.9c-1.2 0-2.2-1-2.2-2.2v-33c0-2.7 1.8-5.1 4.4-5.7 3.7-0.7 6.9 2 6.9 5.6zm-9.9 33.1c0 0.4 0.4 0.8 0.8 0.8h6.9c0.4 0 0.8-0.4 0.8-0.8v-33c0-2-1.4-3.9-3.4-4.3-2.7-0.6-5.1 1.5-5.1 4.2v33.1z"
                  fill="#231F20"/>
        </g>
        <g class="rotate-2">
            <path d="m149.5 260c2.6 0 4.7 1.9 4.7 4.3v66.7h-9.5v-66.7c0-2.4 2.2-4.3 4.8-4.3z" fill="#df0427"/>
            <path d="m155.4 264.3v66.7c0 0.7-0.5 1.2-1.2 1.2h-9.5c-0.7 0-1.2-0.5-1.2-1.2v-66.7c0-3 2.7-5.5 5.9-5.5s6 2.5 6 5.5zm-2.4 65.5v-65.6c0-1.7-1.6-3.1-3.5-3.1s-3.5 1.4-3.5 3.1v65.6h7z"
                  fill="#231F20"/>
            <path d="m140 335.8h18.9c2.6 0 4.7 2.1 4.7 4.7v28.4c0 2.6-2.1 4.7-4.7 4.7h-18.9c-2.6 0-4.7-2.1-4.7-4.7v-28.4c0-2.6 2.1-4.7 4.7-4.7z"
                  fill="#fff"/>
            <path d="m164.9 340.5v28.4c0 3.3-2.7 5.9-5.9 5.9h-19c-3.3 0-5.9-2.7-5.9-5.9v-28.4c0-3.3 2.7-5.9 5.9-5.9h18.9c3.3 0 6 2.6 6 5.9zm-6 31.9c2 0 3.5-1.6 3.5-3.5v-28.4c0-2-1.6-3.5-3.5-3.5h-18.9c-2 0-3.5 1.6-3.5 3.5v28.4c0 2 1.6 3.5 3.5 3.5h18.9z"
                  fill="#231F20"/>
            <path d="m149.5 341.5c-0.7 0-1.2 0.5-1.2 1.2v24c0 0.7 0.5 1.2 1.2 1.2s1.2-0.5 1.2-1.2v-24c0-0.7-0.6-1.2-1.2-1.2z"
                  fill="#231F20"/>
            <path d="m156.6 341.5c-0.7 0-1.2 0.5-1.2 1.2v24c0 0.7 0.5 1.2 1.2 1.2s1.2-0.5 1.2-1.2v-24c0-0.7-0.6-1.2-1.2-1.2z"
                  fill="#231F20"/>
            <path d="m142.4 341.5c-0.7 0-1.2 0.5-1.2 1.2v24c0 0.7 0.5 1.2 1.2 1.2s1.2-0.5 1.2-1.2v-24c0-0.7-0.6-1.2-1.2-1.2z"
                  fill="#231F20"/>
            <path d="m153 331v4.7c0 0.7-0.5 1.2-1.2 1.2h-4.7c-0.7 0-1.2-0.5-1.2-1.2v-4.7c0-0.7 0.5-1.2 1.2-1.2h4.7c0.7 0 1.2 0.6 1.2 1.2zm-4.7 3.6h2.4v-2.4h-2.4v2.4z"
                  fill="#231F20"/>
            <path d="m149.5 266.4c1 0 1.9-0.8 1.9-1.9s-0.8-1.9-1.9-1.9c-1 0-1.9 0.8-1.9 1.9s0.8 1.9 1.9 1.9"
                  fill="#231F20"/>
        </g>
        <g class="rotate-1">
            <path d="m352.3 259.9c-2.6 0-4.8 1.9-4.8 4.3v67.5h9.6v-67.5c0-2.3-2.1-4.3-4.8-4.3z" fill="#df0427"/>
            <path d="m358.1 264.2v67.5c0 0.5-0.4 1-1 1h-9.6c-0.5 0-1-0.4-1-1v-67.5c0-2.9 2.6-5.3 5.8-5.3 3.2 0.1 5.8 2.4 5.8 5.3zm-1.9 66.5v-66.5c0-1.8-1.7-3.3-3.8-3.3s-3.8 1.5-3.8 3.3v66.5h7.6z"
                  fill="#231F20"/>
            <path d="m355.7 331.7v4.8c0 0.5-0.4 1-1 1h-4.8c-0.5 0-1-0.4-1-1v-4.8c0-0.5 0.4-1 1-1h4.8c0.6 0 1 0.5 1 1zm-1.9 3.8v-2.8h-2.8v2.8h2.8z"
                  fill="#231F20"/>
            <path d="m352.4 336.5c-7.9 0-14.3 18.5-14.3 25.5s6.4 12.8 14.4 12.8c7.9 0 14.4-5.7 14.3-12.8-0.1-7-6.5-25.5-14.4-25.5z"
                  fill="#fff"/>
            <path d="m367.7 362c0 7.6-6.9 13.8-15.3 13.8-8.5 0-15.3-6.2-15.4-13.7 0-6.6 6.2-26.5 15.3-26.5 9.2-0.1 15.4 19.8 15.4 26.4zm-28.7 0.1c0 6.5 6 11.8 13.4 11.8s13.4-5.3 13.4-11.8c0-6.9-6.4-24.5-13.4-24.5-7-0.1-13.4 17.6-13.4 24.5z"
                  fill="#231F20"/>
            <path d="m352.3 267.1c-1.3 0-2.4-1.1-2.4-2.4s1.1-2.4 2.4-2.4 2.4 1.1 2.4 2.4-1.1 2.4-2.4 2.4"
                  fill="#231F20"/>
        </g>
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
