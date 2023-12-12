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
	<?xml version="1.0" encoding="utf-8"?>
            <!-- Generator: Adobe Illustrator 25.4.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 150 52" style="enable-background:new 0 0 150 52;" xml:space="preserve">
<style type="text/css">
    .st0{enable-background:new    ;}
    .st1{fill:#FF2D20;}
</style>
        <g class="st0">
            <path class="st1" d="M0.7,2.5L0.7,2.5c0.7,0,2.5,1.1,5.5,3.2l0.5,1.5l0.2,17.7c0,0.2-1.5,1.3-4.6,3L1.4,28c-0.8,0-1.2-0.5-1.3-1.5
		L0,4.3C0,3.5,0.3,2.9,0.7,2.5z M9.3,24.9c2.9,1.5,4.7,2.6,5.6,3.6V29c-0.6,0.6-2.7,1.9-6.1,3.8H8.6c-0.5,0-2.7-1.3-6.6-3.9v-0.1
		c0.3,0,2.5-1.3,6.7-3.8L9.3,24.9z"/>
            <path class="st1" d="M19.2,7.4c0.6,0,2.5,1,5.4,3l0.1,0.5v17.3c0,1.3-0.7,2.1-2.3,2.6c-1.5,1.1-2.6,1.7-3.4,2
		c-0.7,0-1.1-0.7-1.1-2.1V9.3C17.9,8,18.4,7.4,19.2,7.4z M33.9,2.5c0.7,0,1.2,0.7,1.3,2.1V10L35,10.2c-3.9-2.5-6.1-3.8-6.6-3.8h-0.2
		c-1.2,0.2-1.7,0.8-1.7,1.7v2.2h-0.3c-3.7-2.5-5.8-3.7-6.3-3.7V6.5c3.7-2.5,5.8-3.8,6.3-3.8c0.2,0,1.5,0.7,3.7,2.3H30
		C30.1,4.9,31.4,4.2,33.9,2.5z M28.1,7.3c0.5,0,2.4,1.1,5.5,3.2l0.1,0.5v11.8c0,1.4-0.8,2.3-2.4,2.8c-1.8,1.3-2.9,1.8-3.4,1.8
		c-0.6,0-1-0.6-1-1.8V9.2C27,7.8,27.3,7.3,28.1,7.3z M35.7,3.2h0.2c4,2.4,6.1,3.7,6.4,4.1c0.2,0,0.3,0.5,0.4,1.7v18.6
		c0,1.4-0.5,2.2-1.4,2.6c-2.7,1.6-4.2,2.4-4.5,2.4c-0.5,0-0.8-0.5-0.9-1.5v-27L35.7,3.2z"/>
        </g>
        <g>
            <path class="st1" d="M3.3,45.1c0-0.1,0-0.1,0-0.2c0-0.1,0-0.2,0-0.3s0-0.2,0-0.3s0-0.2,0-0.2l0,0c-0.2,0.8-0.7,1.2-1.4,1.2
		c-0.2,0-0.3,0-0.5-0.1S1.1,45,1,44.9s-0.2-0.3-0.3-0.5s-0.1-0.5-0.1-0.8c0-0.4,0.1-0.7,0.2-1C0.9,42.3,1,42.1,1.3,42
		c0.2-0.1,0.5-0.2,0.7-0.3c0.3,0,0.5-0.1,0.8-0.1h0.5v-0.3c0-0.5-0.1-0.9-0.3-1.1c-0.2-0.2-0.4-0.3-0.8-0.3c-0.2,0-0.4,0.1-0.6,0.2
		c-0.2,0.1-0.3,0.3-0.5,0.4L0.7,40c0.2-0.3,0.4-0.4,0.7-0.6c0.3-0.1,0.6-0.2,0.9-0.2c0.6,0,1,0.2,1.3,0.6c0.3,0.4,0.4,1,0.4,1.7v2.4
		c0,0.1,0,0.2,0,0.3s0,0.2,0,0.3s0,0.2,0,0.3S4,45,4,45L3.3,45.1L3.3,45.1z M3.2,42.2H2.8c-0.2,0-0.4,0-0.6,0.1
		c-0.2,0-0.4,0.1-0.5,0.2c-0.1,0.1-0.3,0.2-0.4,0.4s-0.1,0.4-0.1,0.7c0,0.4,0.1,0.7,0.3,0.9s0.4,0.3,0.6,0.3s0.4-0.1,0.6-0.2
		s0.3-0.3,0.4-0.5s0.2-0.4,0.2-0.7c0-0.2,0.1-0.5,0.1-0.7v-0.5H3.2z"/>
            <path class="st1" d="M8.6,45.1v-3.7c0-0.2,0-0.4,0-0.5s-0.1-0.3-0.1-0.5c-0.1-0.1-0.2-0.3-0.3-0.4c-0.1-0.1-0.3-0.1-0.5-0.1
		S7.3,40,7.2,40.1c-0.2,0.1-0.3,0.2-0.4,0.4s-0.2,0.4-0.2,0.6c-0.1,0.2-0.1,0.5-0.1,0.7v3.3H5.7v-4.2c0-0.1,0-0.3,0-0.4
		c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4c0-0.1,0-0.2,0-0.3h0.7c0,0.1,0,0.3,0,0.5s0,0.4,0,0.6l0,0c0.1-0.4,0.3-0.7,0.5-0.9
		s0.6-0.4,0.9-0.4c0.3,0,0.6,0.1,0.8,0.2c0.2,0.1,0.3,0.3,0.4,0.5s0.2,0.4,0.2,0.7s0.1,0.5,0.1,0.8v3.7C9.3,45.1,8.6,45.1,8.6,45.1z
		"/>
            <path class="st1" d="M17,42.2c0,0.5,0,0.9-0.1,1.2c-0.1,0.4-0.2,0.7-0.4,1c-0.2,0.3-0.4,0.5-0.6,0.6c-0.3,0.1-0.5,0.2-0.8,0.2
		s-0.6-0.1-0.8-0.2c-0.2-0.1-0.5-0.4-0.6-0.6c-0.2-0.3-0.3-0.6-0.4-1C13,43.1,13,42.7,13,42.2s0-0.9,0.1-1.2s0.2-0.7,0.4-1
		s0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.9-0.2c0.3,0,0.6,0.1,0.8,0.2c0.3,0.1,0.5,0.4,0.6,0.6c0.2,0.3,0.3,0.6,0.4,1S17,41.8,17,42.2z
		 M16.2,42.2c0-0.3,0-0.6-0.1-0.9C16,41,16,40.8,15.9,40.6s-0.2-0.4-0.4-0.5s-0.3-0.2-0.5-0.2s-0.4,0.1-0.6,0.2
		c-0.2,0.1-0.3,0.3-0.4,0.5c-0.1,0.2-0.2,0.5-0.2,0.7c-0.1,0.3-0.1,0.6-0.1,0.9c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7
		c0.1,0.2,0.2,0.4,0.4,0.5s0.3,0.2,0.6,0.2s0.4-0.1,0.6-0.2s0.3-0.3,0.4-0.5c0.1-0.2,0.2-0.5,0.2-0.7S16.2,42.6,16.2,42.2z"/>
            <path class="st1" d="M22.5,42.2c0,0.4,0,0.8-0.1,1.2s-0.2,0.7-0.4,1s-0.3,0.5-0.6,0.6s-0.5,0.2-0.8,0.2c-0.4,0-0.6-0.1-0.9-0.3
		c-0.2-0.2-0.4-0.5-0.5-0.8l0,0v3.7h-0.8v-8.4h0.7v1l0,0c0.1-0.4,0.2-0.6,0.5-0.9c0.2-0.2,0.5-0.3,0.9-0.3c0.3,0,0.5,0.1,0.8,0.2
		c0.2,0.2,0.4,0.4,0.6,0.6c0.2,0.3,0.3,0.6,0.4,1C22.4,41.4,22.5,41.8,22.5,42.2z M21.7,42.2c0-0.3,0-0.6-0.1-0.9s-0.1-0.5-0.2-0.8
		S21.1,40.2,21,40c-0.2-0.1-0.3-0.2-0.5-0.2S20.1,39.9,20,40c-0.2,0.1-0.3,0.3-0.4,0.5s-0.2,0.5-0.2,0.8s-0.1,0.6-0.1,0.9
		c0,0.3,0,0.6,0.1,0.9s0.1,0.5,0.2,0.8s0.2,0.4,0.4,0.5s0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.2-0.1,0.3-0.3,0.4-0.5s0.2-0.5,0.2-0.8
		S21.7,42.6,21.7,42.2z"/>
            <path class="st1" d="M24.3,42.4c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7s0.2,0.3,0.4,0.5c0.2,0.1,0.4,0.2,0.6,0.2
		c0.3,0,0.5-0.1,0.7-0.3s0.3-0.4,0.4-0.6l0.6,0.3c-0.1,0.3-0.3,0.6-0.6,0.9c-0.3,0.2-0.6,0.3-1.1,0.3c-0.6,0-1.2-0.3-1.5-0.8
		s-0.5-1.3-0.5-2.2c0-0.4,0-0.9,0.1-1.2s0.2-0.7,0.4-1c0.2-0.3,0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.8-0.2s0.6,0.1,0.9,0.2
		c0.2,0.1,0.4,0.3,0.6,0.6c0.1,0.3,0.3,0.5,0.3,0.9c0.1,0.3,0.1,0.7,0.1,1.1v0.4h-3.1V42.4z M26.7,41.8c0-0.6-0.1-1-0.3-1.4
		c-0.2-0.3-0.5-0.5-0.8-0.5c-0.2,0-0.4,0.1-0.6,0.2c-0.2,0.1-0.3,0.3-0.4,0.5s-0.2,0.4-0.2,0.6c0,0.2-0.1,0.4-0.1,0.6
		C24.3,41.8,26.7,41.8,26.7,41.8z"/>
            <path class="st1" d="M31.8,45.1v-3.7c0-0.2,0-0.4,0-0.5s-0.1-0.3-0.1-0.5c-0.1-0.1-0.2-0.3-0.3-0.4c-0.1-0.1-0.3-0.1-0.5-0.1
		s-0.4,0.1-0.5,0.2c-0.2,0.1-0.3,0.2-0.4,0.4s-0.2,0.4-0.2,0.6c-0.1,0.2-0.1,0.5-0.1,0.7v3.3h-0.8v-4.2c0-0.1,0-0.3,0-0.4
		c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4c0-0.1,0-0.2,0-0.3h0.7c0,0.1,0,0.3,0,0.5s0,0.4,0,0.6l0,0c0.1-0.4,0.3-0.7,0.5-0.9
		s0.6-0.4,0.9-0.4s0.6,0.1,0.8,0.2c0.2,0.1,0.3,0.3,0.4,0.5s0.2,0.4,0.2,0.7s0.1,0.5,0.1,0.8v3.7C32.5,45.1,31.8,45.1,31.8,45.1z"/>
            <path class="st1" d="M36.6,40.4c-0.1-0.2-0.2-0.3-0.4-0.4c-0.2-0.1-0.4-0.2-0.6-0.2c-0.2,0-0.5,0.1-0.6,0.3
		c-0.2,0.2-0.2,0.4-0.2,0.7s0.1,0.5,0.2,0.7c0.2,0.1,0.4,0.3,0.7,0.4c0.2,0.1,0.3,0.1,0.5,0.2c0.2,0.1,0.3,0.2,0.4,0.3
		s0.2,0.3,0.3,0.5C37,43,37,43.2,37,43.5c0,0.6-0.2,1-0.5,1.3s-0.7,0.5-1.2,0.5c-0.3,0-0.6-0.1-0.9-0.2c-0.3-0.1-0.5-0.3-0.7-0.6
		l0.5-0.5c0.1,0.2,0.3,0.4,0.5,0.5s0.4,0.2,0.6,0.2c0.3,0,0.5-0.1,0.7-0.3s0.3-0.5,0.3-0.8c0-0.2,0-0.3-0.1-0.5s-0.1-0.2-0.2-0.3
		c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1-0.1-0.3-0.1-0.4-0.2c-0.1-0.1-0.3-0.1-0.4-0.2c-0.1-0.1-0.3-0.2-0.4-0.3c-0.1-0.1-0.2-0.3-0.3-0.4
		S34,41.1,34,40.8c0-0.2,0-0.5,0.1-0.7s0.2-0.4,0.3-0.5s0.3-0.3,0.5-0.3c0.2-0.1,0.4-0.1,0.6-0.1c0.3,0,0.6,0.1,0.8,0.2
		s0.4,0.3,0.6,0.5L36.6,40.4z"/>
            <path class="st1" d="M42,42.2c0,0.5,0,0.9-0.1,1.2c-0.1,0.4-0.2,0.7-0.4,1s-0.4,0.5-0.6,0.6c-0.3,0.1-0.5,0.2-0.8,0.2
		s-0.6-0.1-0.8-0.2c-0.2-0.1-0.5-0.4-0.6-0.6c-0.2-0.3-0.3-0.6-0.4-1C38,43.1,38,42.7,38,42.2s0-0.9,0.1-1.2s0.2-0.7,0.4-1
		s0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.9-0.2c0.3,0,0.6,0.1,0.8,0.2c0.3,0.1,0.5,0.4,0.6,0.6c0.2,0.3,0.3,0.6,0.4,1S42,41.8,42,42.2z
		 M41.3,42.2c0-0.3,0-0.6-0.1-0.9c-0.1-0.3-0.1-0.5-0.2-0.7c-0.1-0.2-0.2-0.4-0.4-0.5s-0.3-0.2-0.5-0.2s-0.4,0.1-0.6,0.2
		c-0.2,0.1-0.3,0.3-0.4,0.5c-0.1,0.2-0.2,0.5-0.2,0.7c-0.1,0.3-0.1,0.6-0.1,0.9c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7
		c0.1,0.2,0.2,0.4,0.4,0.5s0.3,0.2,0.6,0.2s0.4-0.1,0.6-0.2s0.3-0.3,0.4-0.5c0.1-0.2,0.2-0.5,0.2-0.7C41.2,42.9,41.3,42.6,41.3,42.2
		z"/>
            <path class="st1" d="M44.2,39.4v3.7c0,0.2,0,0.4,0,0.5c0,0.2,0.1,0.3,0.1,0.5c0.1,0.1,0.2,0.3,0.3,0.4s0.3,0.1,0.5,0.1
		s0.4-0.1,0.5-0.2c0.2-0.1,0.3-0.2,0.4-0.4c0.1-0.2,0.2-0.4,0.2-0.6c0.1-0.2,0.1-0.5,0.1-0.7v-3.3h0.8v4.2c0,0.1,0,0.3,0,0.4
		s0,0.3,0,0.4s0,0.3,0,0.4s0,0.2,0,0.3h-0.7c0-0.1,0-0.3,0-0.5s0-0.4,0-0.6l0,0c-0.1,0.4-0.3,0.7-0.5,0.9s-0.6,0.4-0.9,0.4
		c-0.3,0-0.6-0.1-0.8-0.2c-0.2-0.1-0.3-0.3-0.4-0.5s-0.2-0.4-0.2-0.7s-0.1-0.5-0.1-0.8v-3.7C43.5,39.4,44.2,39.4,44.2,39.4z"/>
            <path class="st1" d="M50.3,39.6c0.2-0.2,0.5-0.3,0.8-0.3c0.1,0,0.1,0,0.1,0v0.8h-0.1H51c-0.2,0-0.4,0.1-0.5,0.2s-0.3,0.3-0.4,0.5
		c-0.1,0.2-0.2,0.4-0.2,0.7c-0.1,0.3-0.1,0.5-0.1,0.8v2.9H49V41c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4
		c0-0.1,0-0.2,0-0.3h0.7c0,0.1,0,0.3,0,0.5s0,0.4,0,0.7l0,0C49.9,40.1,50.1,39.8,50.3,39.6z"/>
            <path class="st1" d="M53.8,45.3c-0.3,0-0.6-0.1-0.9-0.2c-0.2-0.1-0.5-0.4-0.6-0.6s-0.3-0.6-0.4-1s-0.1-0.8-0.1-1.2
		c0-0.5,0-0.9,0.1-1.2s0.2-0.7,0.4-1s0.4-0.5,0.6-0.6c0.2-0.1,0.5-0.2,0.9-0.2c0.3,0,0.6,0.1,0.8,0.2c0.2,0.1,0.4,0.2,0.5,0.4
		l-0.4,0.5c-0.1-0.1-0.2-0.2-0.4-0.3C54.2,40,54,40,53.8,40s-0.4,0.1-0.5,0.2s-0.3,0.3-0.4,0.5s-0.2,0.5-0.2,0.7s-0.1,0.6-0.1,0.9
		c0,0.3,0,0.6,0.1,0.9s0.1,0.5,0.2,0.7s0.2,0.4,0.4,0.5s0.3,0.2,0.6,0.2c0.2,0,0.4,0,0.5-0.1s0.3-0.2,0.4-0.3l0.4,0.6
		C54.8,45.1,54.3,45.3,53.8,45.3z"/>
            <path class="st1" d="M56.5,42.4c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7s0.2,0.3,0.4,0.5c0.2,0.1,0.4,0.2,0.6,0.2
		c0.3,0,0.5-0.1,0.7-0.3s0.3-0.4,0.4-0.6l0.6,0.3c-0.1,0.3-0.3,0.6-0.6,0.9c-0.3,0.2-0.6,0.3-1.1,0.3c-0.6,0-1.2-0.3-1.5-0.8
		s-0.5-1.3-0.5-2.2c0-0.4,0-0.9,0.1-1.2s0.2-0.7,0.4-1s0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.8-0.2s0.6,0.1,0.9,0.2
		c0.2,0.1,0.4,0.3,0.6,0.6c0.1,0.3,0.3,0.5,0.3,0.9c0.1,0.3,0.1,0.7,0.1,1.1v0.4h-3.1V42.4z M58.9,41.8c0-0.6-0.1-1-0.3-1.4
		c-0.2-0.3-0.5-0.5-0.8-0.5c-0.2,0-0.4,0.1-0.6,0.2c-0.2,0.1-0.3,0.3-0.4,0.5c-0.1,0.2-0.2,0.4-0.2,0.6c0,0.2-0.1,0.4-0.1,0.6
		C56.5,41.8,58.9,41.8,58.9,41.8z"/>
            <path class="st1" d="M63.6,42.4c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7s0.2,0.3,0.4,0.5c0.2,0.1,0.4,0.2,0.6,0.2
		c0.3,0,0.5-0.1,0.7-0.3s0.3-0.4,0.4-0.6l0.6,0.3c-0.1,0.3-0.3,0.6-0.6,0.9c-0.3,0.2-0.6,0.3-1.1,0.3c-0.6,0-1.2-0.3-1.5-0.8
		s-0.5-1.3-0.5-2.2c0-0.4,0-0.9,0.1-1.2s0.2-0.7,0.4-1s0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.8-0.2s0.6,0.1,0.9,0.2
		c0.2,0.1,0.4,0.3,0.6,0.6c0.1,0.3,0.3,0.5,0.3,0.9c0.1,0.3,0.1,0.7,0.1,1.1v0.4h-3.1V42.4z M66,41.8c0-0.6-0.1-1-0.3-1.4
		c-0.2-0.3-0.5-0.5-0.8-0.5c-0.2,0-0.4,0.1-0.6,0.2c-0.2,0.1-0.3,0.3-0.4,0.5c-0.1,0.2-0.2,0.4-0.2,0.6c0,0.2-0.1,0.4-0.1,0.6
		C63.6,41.8,66,41.8,66,41.8z"/>
            <path class="st1" d="M67.7,42.4v-0.6h1.8v0.6H67.7z"/>
            <path class="st1" d="M72.4,45.3c-0.3,0-0.6-0.1-0.9-0.2c-0.2-0.1-0.5-0.4-0.6-0.6s-0.3-0.6-0.4-1s-0.1-0.8-0.1-1.2
		c0-0.5,0-0.9,0.1-1.2s0.2-0.7,0.4-1s0.4-0.5,0.6-0.6s0.5-0.2,0.9-0.2c0.3,0,0.6,0.1,0.8,0.2c0.2,0.1,0.4,0.2,0.5,0.4l-0.4,0.5
		c-0.1-0.1-0.2-0.2-0.4-0.3C72.8,40,72.6,40,72.4,40s-0.4,0.1-0.5,0.2s-0.3,0.3-0.4,0.5s-0.2,0.5-0.2,0.7s-0.1,0.6-0.1,0.9
		c0,0.3,0,0.6,0.1,0.9s0.1,0.5,0.2,0.7s0.2,0.4,0.4,0.5c0.2,0.1,0.3,0.2,0.6,0.2c0.2,0,0.4,0,0.5-0.1s0.3-0.2,0.4-0.3l0.4,0.6
		C73.4,45.1,73,45.3,72.4,45.3z"/>
            <path class="st1" d="M78.4,42.2c0,0.5,0,0.9-0.1,1.2c-0.1,0.4-0.2,0.7-0.4,1c-0.2,0.3-0.4,0.5-0.6,0.6c-0.3,0.1-0.5,0.2-0.8,0.2
		s-0.6-0.1-0.8-0.2c-0.2-0.1-0.5-0.4-0.6-0.6c-0.2-0.3-0.3-0.6-0.4-1s-0.1-0.8-0.1-1.2s0-0.9,0.1-1.2s0.2-0.7,0.4-1s0.4-0.5,0.6-0.6
		c0.3-0.1,0.5-0.2,0.9-0.2c0.3,0,0.6,0.1,0.8,0.2c0.3,0.1,0.5,0.4,0.6,0.6s0.3,0.6,0.4,1C78.4,41.4,78.4,41.8,78.4,42.2z M77.6,42.2
		c0-0.3,0-0.6-0.1-0.9c-0.1-0.3-0.1-0.5-0.2-0.7s-0.2-0.4-0.4-0.5c-0.2-0.1-0.3-0.2-0.5-0.2s-0.4,0-0.5,0.1
		c-0.2,0.1-0.3,0.3-0.4,0.5s-0.2,0.5-0.2,0.7c-0.1,0.3-0.1,0.6-0.1,0.9c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7
		s0.2,0.4,0.4,0.5c0.2,0.1,0.3,0.2,0.6,0.2s0.4-0.1,0.6-0.2c0.2-0.1,0.3-0.3,0.4-0.5s0.2-0.5,0.2-0.7C77.6,42.9,77.6,42.6,77.6,42.2
		z"/>
            <path class="st1" d="M81.2,39.6c0.2-0.2,0.6-0.4,1-0.4c0.2,0,0.4,0,0.5,0.1c0.2,0.1,0.3,0.2,0.4,0.3s0.2,0.3,0.2,0.4
		c0.1,0.2,0.1,0.3,0.1,0.5l0,0c0-0.2,0.1-0.3,0.2-0.5s0.2-0.3,0.3-0.4c0.1-0.1,0.3-0.2,0.4-0.3c0.2-0.1,0.4-0.1,0.6-0.1
		c0.3,0,0.6,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5s0.2,0.4,0.2,0.7s0.1,0.5,0.1,0.8v3.7h-0.8v-3.7c0-0.2,0-0.4,0-0.5
		s-0.1-0.3-0.1-0.5c-0.1-0.1-0.2-0.3-0.3-0.4s-0.3-0.1-0.5-0.1s-0.4,0.1-0.5,0.2c-0.2,0.1-0.3,0.2-0.4,0.4s-0.2,0.4-0.2,0.6
		c-0.1,0.2-0.1,0.5-0.1,0.7v3.3h-0.8v-3.7c0-0.2,0-0.4,0-0.5c0-0.2-0.1-0.3-0.1-0.5c-0.1-0.1-0.1-0.3-0.3-0.4
		c-0.1-0.1-0.3-0.1-0.5-0.1s-0.4,0.1-0.5,0.2c-0.1,0.1-0.3,0.2-0.4,0.4s-0.2,0.4-0.2,0.6c-0.1,0.2-0.1,0.5-0.1,0.7v3.3h-0.8v-4.2
		c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4s0-0.3,0-0.4c0-0.1,0-0.2,0-0.3h0.8c0,0.1,0,0.3,0,0.5s0,0.4,0,0.6l0,0
		C80.8,40.1,81,39.8,81.2,39.6z"/>
            <path class="st1" d="M89.6,39.6c0.2-0.2,0.6-0.4,1-0.4c0.2,0,0.4,0,0.5,0.1c0.2,0.1,0.3,0.2,0.4,0.3s0.2,0.3,0.2,0.4
		c0.1,0.2,0.1,0.3,0.1,0.5l0,0c0-0.2,0.1-0.3,0.2-0.5s0.2-0.3,0.3-0.4c0.1-0.1,0.3-0.2,0.4-0.3c0.2-0.1,0.4-0.1,0.6-0.1
		c0.3,0,0.6,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5s0.2,0.4,0.2,0.7s0.1,0.5,0.1,0.8v3.7H94v-3.7c0-0.2,0-0.4,0-0.5s-0.1-0.3-0.1-0.5
		c-0.1-0.1-0.2-0.3-0.3-0.4s-0.3-0.1-0.5-0.1s-0.4,0.1-0.5,0.2c-0.2,0.1-0.3,0.2-0.4,0.4S92,40.9,92,41.1c-0.1,0.2-0.1,0.5-0.1,0.7
		v3.3h-0.8v-3.7c0-0.2,0-0.4,0-0.5c0-0.2-0.1-0.3-0.1-0.5c-0.1-0.1-0.1-0.3-0.3-0.4c-0.1-0.1-0.3-0.1-0.5-0.1s-0.4,0.1-0.5,0.2
		c-0.1,0.1-0.3,0.2-0.4,0.4s-0.2,0.4-0.2,0.6C89,41.3,89,41.6,89,41.8v3.3h-0.8v-4.2c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4
		s0-0.3,0-0.4c0-0.1,0-0.2,0-0.3H89c0,0.1,0,0.3,0,0.5s0,0.4,0,0.6l0,0C89.1,40.1,89.3,39.8,89.6,39.6z"/>
            <path class="st1" d="M97,42.4c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7s0.2,0.3,0.4,0.5c0.2,0.1,0.4,0.2,0.6,0.2
		c0.3,0,0.5-0.1,0.7-0.3s0.3-0.4,0.4-0.6L100,44c-0.1,0.3-0.3,0.6-0.6,0.9s-0.6,0.3-1.1,0.3c-0.6,0-1.2-0.3-1.5-0.8
		s-0.5-1.3-0.5-2.2c0-0.4,0-0.9,0.1-1.2c0.1-0.4,0.2-0.7,0.4-1c0.2-0.3,0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.8-0.2s0.6,0.1,0.9,0.2
		c0.2,0.1,0.4,0.3,0.6,0.6c0.1,0.3,0.3,0.5,0.3,0.9s0.1,0.7,0.1,1.1v0.4H97z M99.4,41.8c0-0.6-0.1-1-0.3-1.4s-0.5-0.5-0.8-0.5
		c-0.2,0-0.4,0.1-0.6,0.2c-0.2,0.1-0.3,0.3-0.4,0.5s-0.2,0.4-0.2,0.6c0,0.2-0.1,0.4-0.1,0.6C97,41.8,99.4,41.8,99.4,41.8z"/>
            <path class="st1" d="M102.9,39.6c0.2-0.2,0.5-0.3,0.8-0.3c0.1,0,0.1,0,0.1,0v0.8h-0.1h-0.1c-0.2,0-0.4,0.1-0.5,0.2
		s-0.3,0.3-0.4,0.5s-0.2,0.4-0.2,0.7c-0.1,0.3-0.1,0.5-0.1,0.8v2.9h-0.8V41c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4s0-0.3,0-0.4
		c0-0.1,0-0.2,0-0.3h0.8c0,0.1,0,0.3,0,0.5s0,0.4,0,0.7l0,0C102.5,40.1,102.6,39.8,102.9,39.6z"/>
            <path class="st1" d="M106.3,45.3c-0.3,0-0.6-0.1-0.9-0.2c-0.2-0.1-0.5-0.4-0.6-0.6s-0.3-0.6-0.4-1s-0.1-0.8-0.1-1.2
		c0-0.5,0-0.9,0.1-1.2s0.2-0.7,0.4-1s0.4-0.5,0.6-0.6s0.5-0.2,0.9-0.2c0.3,0,0.6,0.1,0.8,0.2c0.2,0.1,0.4,0.2,0.5,0.4l-0.4,0.5
		c-0.1-0.1-0.2-0.2-0.4-0.3c-0.1-0.1-0.3-0.1-0.5-0.1s-0.4,0.1-0.5,0.2c-0.2,0.1-0.3,0.3-0.4,0.5s-0.2,0.5-0.2,0.7s-0.1,0.6-0.1,0.9
		c0,0.3,0,0.6,0.1,0.9s0.1,0.5,0.2,0.7s0.2,0.4,0.4,0.5s0.3,0.2,0.6,0.2c0.2,0,0.4,0,0.5-0.1s0.3-0.2,0.4-0.3l0.4,0.6
		C107.3,45.1,106.9,45.3,106.3,45.3z"/>
            <path class="st1" d="M109,42.4c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7s0.2,0.3,0.4,0.5c0.2,0.1,0.4,0.2,0.6,0.2
		c0.3,0,0.5-0.1,0.7-0.3s0.3-0.4,0.4-0.6L112,44c-0.1,0.3-0.3,0.6-0.6,0.9s-0.6,0.3-1.1,0.3c-0.6,0-1.2-0.3-1.5-0.8
		s-0.5-1.3-0.5-2.2c0-0.4,0-0.9,0.1-1.2c0.1-0.4,0.2-0.7,0.4-1c0.2-0.3,0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.8-0.2s0.6,0.1,0.9,0.2
		c0.2,0.1,0.4,0.3,0.6,0.6c0.1,0.3,0.3,0.5,0.3,0.9s0.1,0.7,0.1,1.1v0.4H109z M111.4,41.8c0-0.6-0.1-1-0.3-1.4s-0.5-0.5-0.8-0.5
		c-0.2,0-0.4,0.1-0.6,0.2c-0.2,0.1-0.3,0.3-0.4,0.5s-0.2,0.4-0.2,0.6c0,0.2-0.1,0.4-0.1,0.6C109,41.8,111.4,41.8,111.4,41.8z"/>
            <path class="st1" d="M119.7,42.2c0,0.4,0,0.8-0.1,1.2s-0.2,0.7-0.4,1c-0.2,0.3-0.3,0.5-0.6,0.6s-0.5,0.2-0.8,0.2
		c-0.4,0-0.6-0.1-0.9-0.3c-0.2-0.2-0.4-0.5-0.5-0.8l0,0v3.7h-0.8v-8.4h0.8v1l0,0c0.1-0.4,0.2-0.6,0.5-0.9c0.2-0.2,0.5-0.3,0.9-0.3
		c0.3,0,0.5,0.1,0.8,0.2c0.2,0.2,0.4,0.4,0.6,0.6c0.2,0.3,0.3,0.6,0.4,1S119.7,41.8,119.7,42.2z M118.9,42.2c0-0.3,0-0.6-0.1-0.9
		s-0.1-0.5-0.2-0.8s-0.2-0.4-0.4-0.5s-0.3-0.2-0.5-0.2s-0.4,0.1-0.5,0.2s-0.3,0.3-0.4,0.5s-0.2,0.5-0.2,0.8s-0.1,0.6-0.1,0.9
		c0,0.3,0,0.6,0.1,0.9s0.1,0.5,0.2,0.8c0.1,0.2,0.2,0.4,0.4,0.5s0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2s0.3-0.3,0.4-0.5s0.2-0.5,0.2-0.8
		S118.9,42.6,118.9,42.2z"/>
            <path class="st1" d="M121.2,45.1v-8.7h0.8v8.7H121.2z"/>
            <path class="st1" d="M126.2,45.1c0-0.1,0-0.1,0-0.2c0-0.1,0-0.2,0-0.3s0-0.2,0-0.3s0-0.2,0-0.2l0,0c-0.2,0.8-0.7,1.2-1.4,1.2
		c-0.2,0-0.3,0-0.5-0.1s-0.3-0.2-0.4-0.3s-0.2-0.3-0.3-0.5c-0.1-0.2-0.1-0.5-0.1-0.8c0-0.4,0.1-0.7,0.2-1s0.3-0.5,0.6-0.6
		c0.2-0.1,0.5-0.2,0.7-0.3c0.3,0,0.5-0.1,0.8-0.1h0.5v-0.3c0-0.5-0.1-0.9-0.3-1.1c-0.2-0.2-0.4-0.3-0.8-0.3c-0.2,0-0.4,0.1-0.6,0.2
		c-0.2,0.1-0.3,0.3-0.5,0.4l-0.4-0.5c0.2-0.3,0.4-0.4,0.7-0.6s0.6-0.2,0.9-0.2c0.6,0,1,0.2,1.3,0.6s0.4,1,0.4,1.7v2.4
		c0,0.1,0,0.2,0,0.3s0,0.2,0,0.3s0,0.2,0,0.3s0,0.2,0,0.2L126.2,45.1L126.2,45.1z M126.1,42.2h-0.5c-0.2,0-0.4,0-0.6,0.1
		s-0.4,0.1-0.5,0.2c-0.1,0.1-0.3,0.2-0.4,0.4s-0.1,0.4-0.1,0.7c0,0.4,0.1,0.7,0.3,0.9s0.4,0.3,0.6,0.3s0.4-0.1,0.6-0.2
		s0.3-0.3,0.4-0.5s0.2-0.4,0.2-0.7c0-0.2,0.1-0.5,0.1-0.7L126.1,42.2L126.1,42.2z"/>
            <path class="st1" d="M130.1,45.2c-0.1,0-0.3,0-0.4,0c-0.4,0-0.7-0.1-0.9-0.4c-0.2-0.3-0.3-0.6-0.3-1.1V40h-0.8v-0.6h0.7v-1.6h0.8
		v1.6h1V40h-1v3.6c0,0.3,0.1,0.6,0.2,0.8c0.1,0.2,0.3,0.2,0.5,0.2c0.1,0,0.1,0,0.2,0c0.1,0,0.1,0,0.2-0.1v0.6
		C130.3,45.1,130.2,45.1,130.1,45.2z"/>
            <path class="st1" d="M133.4,36.9c-0.1,0-0.2-0.1-0.3-0.1c-0.2,0-0.3,0-0.4,0.1s-0.2,0.2-0.3,0.3s-0.1,0.3-0.1,0.4
		c0,0.2,0,0.3,0,0.5v1.2h1V40h-1v5.1h-0.8V40h-0.8v-0.6h0.8v-1.2c0-0.6,0.1-1.1,0.4-1.4c0.2-0.4,0.6-0.5,1.1-0.5
		c0.2,0,0.3,0,0.5,0.1L133.4,36.9z"/>
            <path class="st1" d="M137.9,42.2c0,0.5,0,0.9-0.1,1.2c-0.1,0.4-0.2,0.7-0.4,1s-0.4,0.5-0.6,0.6c-0.3,0.1-0.5,0.2-0.8,0.2
		s-0.6-0.1-0.8-0.2c-0.2-0.1-0.5-0.4-0.6-0.6c-0.2-0.3-0.3-0.6-0.4-1c-0.1-0.4-0.1-0.8-0.1-1.2s0-0.9,0.1-1.2s0.2-0.7,0.4-1
		s0.4-0.5,0.6-0.6c0.3-0.1,0.5-0.2,0.9-0.2c0.3,0,0.6,0.1,0.8,0.2c0.3,0.1,0.5,0.4,0.6,0.6s0.3,0.6,0.4,1
		C137.8,41.4,137.9,41.8,137.9,42.2z M137.1,42.2c0-0.3,0-0.6-0.1-0.9c-0.1-0.3-0.1-0.5-0.2-0.7c-0.1-0.2-0.2-0.4-0.4-0.5
		s-0.3-0.2-0.5-0.2s-0.4,0.1-0.6,0.2c-0.2,0.1-0.3,0.3-0.4,0.5c-0.1,0.2-0.2,0.5-0.2,0.7c-0.1,0.3-0.1,0.6-0.1,0.9
		c0,0.3,0,0.6,0.1,0.9c0.1,0.3,0.1,0.5,0.2,0.7c0.1,0.2,0.2,0.4,0.4,0.5s0.3,0.2,0.6,0.2s0.4-0.1,0.6-0.2c0.2-0.1,0.3-0.3,0.4-0.5
		c0.1-0.2,0.2-0.5,0.2-0.7S137.1,42.6,137.1,42.2z"/>
            <path class="st1" d="M140.7,39.6c0.2-0.2,0.5-0.3,0.8-0.3c0.1,0,0.1,0,0.1,0v0.8h-0.1h-0.1c-0.2,0-0.4,0.1-0.5,0.2
		s-0.3,0.3-0.4,0.5s-0.2,0.4-0.2,0.7c-0.1,0.3-0.1,0.5-0.1,0.8v2.9h-0.8V41c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4s0-0.3,0-0.4
		c0-0.1,0-0.2,0-0.3h0.8c0,0.1,0,0.3,0,0.5s0,0.4,0,0.7l0,0C140.3,40.1,140.4,39.8,140.7,39.6z"/>
            <path class="st1" d="M143.9,39.6c0.2-0.2,0.6-0.4,1-0.4c0.2,0,0.4,0,0.5,0.1c0.2,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.2,0.3,0.2,0.4
		c0.1,0.2,0.1,0.3,0.1,0.5l0,0c0-0.2,0.1-0.3,0.2-0.5c0.1-0.2,0.2-0.3,0.3-0.4c0.1-0.1,0.3-0.2,0.4-0.3c0.2-0.1,0.4-0.1,0.6-0.1
		c0.3,0,0.6,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5c0.1,0.2,0.2,0.4,0.2,0.7s0.1,0.5,0.1,0.8v3.7h-0.8v-3.7c0-0.2,0-0.4,0-0.5
		s-0.1-0.3-0.1-0.5c-0.1-0.1-0.2-0.3-0.3-0.4s-0.3-0.1-0.5-0.1s-0.4,0.1-0.5,0.2c-0.2,0.1-0.3,0.2-0.4,0.4c-0.1,0.2-0.2,0.4-0.2,0.6
		c-0.1,0.2-0.1,0.5-0.1,0.7v3.3h-0.8v-3.7c0-0.2,0-0.4,0-0.5c0-0.2-0.1-0.3-0.1-0.5c-0.1-0.1-0.1-0.3-0.3-0.4
		c-0.1-0.1-0.3-0.1-0.5-0.1s-0.4,0.1-0.5,0.2c-0.1,0.1-0.3,0.2-0.4,0.4c-0.1,0.2-0.2,0.4-0.2,0.6c-0.1,0.2-0.1,0.5-0.1,0.7v3.3h-0.8
		v-4.2c0-0.1,0-0.3,0-0.4c0-0.1,0-0.3,0-0.4s0-0.3,0-0.4c0-0.1,0-0.2,0-0.3h0.8c0,0.1,0,0.3,0,0.5s0,0.4,0,0.6l0,0
		C143.5,40.1,143.6,39.8,143.9,39.6z"/>
        </g>
        <g>
            <path class="st1" d="M48.5,8.5h1v17.6h7.3l-0.2,1.4h-8.2V8.5z"/>
            <path class="st1" d="M65.5,24.9c0,1.2,0.1,2.1,0.1,2.6h-0.9c-0.1-0.3-0.1-0.9-0.2-2.1c-0.3,1-1.2,2.4-3.2,2.4c-2.3,0-3.2-2-3.2-4.1
		c0-3,1.7-4.3,4.6-4.3c0.8,0,1.5,0,1.8,0V18c0-1.4-0.3-3.2-2.5-3.2c-2,0-2.3,1.4-2.5,2.5h-1c0.1-1.5,0.8-3.8,3.5-3.8
		c2.2,0,3.5,1.3,3.5,4.3V24.9z M64.6,20.5c-0.4,0-1.3,0-1.9,0c-2.2,0-3.5,0.8-3.5,3.1c0,1.7,0.9,2.9,2.2,2.9c2.8,0,3.2-2.6,3.2-5.5
		V20.5z"/>
            <path class="st1" d="M68.7,17.6c0-2.3,0-3.2,0-3.7h1c0,0.4,0,1.3,0,3c0.6-2,1.8-3.2,3.4-3.3v1.5c-2,0.2-3.4,2.1-3.4,5.3v7h-1V17.6z
		"/>
            <path class="st1" d="M81.3,24.9c0,1.2,0.1,2.1,0.1,2.6h-0.9c-0.1-0.3-0.1-0.9-0.2-2.1c-0.3,1-1.2,2.4-3.2,2.4c-2.3,0-3.2-2-3.2-4.1
		c0-3,1.7-4.3,4.6-4.3c0.8,0,1.5,0,1.8,0V18c0-1.4-0.3-3.2-2.5-3.2c-2,0-2.3,1.4-2.5,2.5h-1c0.1-1.5,0.8-3.8,3.5-3.8
		c2.2,0,3.5,1.3,3.5,4.3V24.9z M80.4,20.5c-0.4,0-1.3,0-1.9,0c-2.2,0-3.5,0.8-3.5,3.1c0,1.7,0.9,2.9,2.2,2.9c2.8,0,3.2-2.6,3.2-5.5
		V20.5z"/>
            <path class="st1" d="M84.6,17.4c0-1.2,0-2.4,0-3.5h1c0,0.5,0.1,1.6,0,2.4c0.4-1.4,1.3-2.7,2.9-2.7c1.4,0,2.4,0.9,2.8,2.7
		c0.5-1.4,1.5-2.7,3.2-2.7c1.5,0,3,1.2,3,4.9v8.9h-1v-8.7c0-1.8-0.5-3.8-2.3-3.8c-1.9,0-2.7,2.1-2.7,4.7v7.8h-1v-8.7
		c0-2-0.4-3.8-2.2-3.8c-1.9,0-2.8,2.3-2.8,5.1v7.4h-1V17.4z"/>
            <path class="st1" d="M100.7,17.4c0-1.2,0-2.4,0-3.5h1c0,0.5,0.1,1.6,0,2.4c0.4-1.4,1.3-2.7,2.9-2.7c1.4,0,2.4,0.9,2.8,2.7
		c0.5-1.4,1.5-2.7,3.2-2.7c1.5,0,3,1.2,3,4.9v8.9h-1v-8.7c0-1.8-0.5-3.8-2.3-3.8c-1.9,0-2.7,2.1-2.7,4.7v7.8h-1v-8.7
		c0-2-0.4-3.8-2.2-3.8c-1.9,0-2.8,2.3-2.8,5.1v7.4h-1V17.4z"/>
            <path class="st1" d="M117,20.8c0,3.5,1.3,5.6,3.1,5.6c1.8,0,2.4-1.4,2.8-2.5h1c-0.4,1.8-1.4,3.8-3.8,3.8c-3,0-4.1-3.5-4.1-7
		c0-3.9,1.4-7.2,4.2-7.2c3,0,3.9,3.6,3.9,6.1c0,0.4,0,0.8,0,1.1H117z M123.1,19.7c0-2.7-1.1-4.8-3-4.8c-2,0-2.9,1.9-3.1,4.8H123.1z"
            />
            <path class="st1" d="M126.5,17.6c0-2.3,0-3.2,0-3.7h1c0,0.4,0,1.3,0,3c0.6-2,1.8-3.2,3.4-3.3v1.5c-2,0.2-3.4,2.1-3.4,5.3v7h-1V17.6
		z"/>
            <path class="st1" d="M139.8,23.5c-0.5,2.4-1.6,4.3-3.8,4.3c-2.4,0-4.2-2.5-4.2-7c0-3.7,1.4-7.1,4.3-7.1c2.5,0,3.5,2.4,3.7,4.3h-1
		c-0.3-1.6-1-3.1-2.7-3.1c-2.1,0-3.2,2.4-3.2,5.8c0,3.2,1.1,5.8,3.1,5.8c1.4,0,2.3-1,2.8-3H139.8z"/>
            <path class="st1" d="M142.4,20.8c0,3.5,1.3,5.6,3.1,5.6c1.8,0,2.4-1.4,2.8-2.5h1c-0.4,1.8-1.4,3.8-3.8,3.8c-3,0-4.1-3.5-4.1-7
		c0-3.9,1.4-7.2,4.2-7.2c3,0,3.9,3.6,3.9,6.1c0,0.4,0,0.8,0,1.1H142.4z M148.5,19.7c0-2.7-1.1-4.8-3-4.8c-2,0-2.9,1.9-3.1,4.8H148.5
		z"/>
        </g>
</svg>

</script>
