<div class="modal fade" id="product-quick-view" tabindex="-1" role="dialog" aria-labelledby="productQuickView"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn cancel" data-dismiss="modal"><i class="fa fa-close"></i></button>
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="swiper-container" id="product-quick-view-slider" dir="rtl">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="" id="product-modal-main-photo" alt="تصویر اصلی" class="img-fluid">
                            </div>
                            <div class="swiper-slide">
                                <img src="" id="product-modal-secondary-photo" alt="تصویر دوم" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div data-product-id="" data-row-id="" class="product-item product-item-modal loaded"
                         style="background: unset;box-shadow: none;border: none;">
                        <div class="header">
                            <div class="pg-title" id="product-modal-title"></div>
                            <div class="product-code">
                                <div class="title">کد کالا:</div>
                                <span id="product-modal-code"></span></div>
                        </div>

                        <div class="product-property-wrapper" id="product-modal-extra-properties">
                        </div>

                        <div class="footer">
                            <div class="price">
                                <div class="price-title">قیمت</div>
                                <div class="product-price value">
                                    {{--TODO:reformat numbers to persian--}}
                                    <span class="unit-price price-data" id="product-modal-price"></span>
                                    <span>تومان</span></div>
                                <div class="not-available">ناموجود</div>
                            </div>

                            {{--@if($product->is_active)--}}
                            <div class="counter-input">
                                <div class="cart-row" data-product-id="">
                                    <div class="counter-box-modal d-none">
                                        <div class="form-group count-group"
                                             data-action="">
                                            <input type="text"
                                                   class="form-control count-control count-control-local"
                                                   name=""
                                                   placeholder="تعداد"
                                                   value="1"
                                                   data-min=""
                                                   data-max="">
                                            <div class="count-increase">+</div>
                                            <div class="count-decrease">-</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="" id="product-modal-add-to-cart" type="button" class="btn add-basket d-none"
                                   title="افزودن به سبدخرید">
                                    <div class="btn-add-basket-text">افزودن به سبدخرید</div>
                                    <div class="btn-add-basket-icon"><img src="/HCMS-assets/img/basket.svg"
                                                                          alt="basket">
                                    </div>
                                </a>
                            </div>

                            {{--@elseif(!$product->is_needed)--}}
                            <a href="" id="product-modal-add-to-need-list" class="btn add-need-list"
                               title="موجود شد خبرم کن">
                                <div class="btn-add-basket-text">موجود شد خبرم کن</div>
                                <div class="btn-add-basket-icon">
                                    <i class="fa fa-bell-o"></i>
                                </div>
                            </a>
                            {{--@endif--}}


                            <a href="" id="product-modal-url" class="btn btn-details" title="مشاهده جزئیات">مشاهده
                                جزئیات<i
                                        class="fa fa-angle-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="confirmLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="question">آیا از این عملیات اطمینان دارید؟</p>
                {{--<p class="description">توضیحات اضافی در مورد عملیات سوال شده...</p>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn cancel" data-dismiss="modal" onclick="window.rejectReq()"
                        data-text="خیر">
                    <span class="text">خیر</span>
                </button>
                <button type="button" class="btn submit" data-dismiss="modal" onclick="window.acceptReq()"
                        data-text="بله">
                    <span class="text">بله</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="alertLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="message">این یک پیام آزمایشی است</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn cancel" data-dismiss="modal" data-text="تایید">
                    <span class="text">تایید</span></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rating-modal" tabindex="-1" role="dialog" aria-labelledby="ratingLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <form method="GET" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <span class="modal-title">ثبت امتیاز</span>
                </div>
                <div class="modal-body">
                    <div class="desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                    </div>
                    <div class="rating-content"></div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" name="comment"
                                  placeholder="نظر خود را در صورت تمایل اینجا بنویسید..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn submit" data-text="ثبت"><span class="text">ثبت</span></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="location-modal" tabindex="-1" role="dialog" aria-labelledby="locationLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{route("customer.location.store")}}">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <span class="modal-title">شهر و استان خود را مشخص کنید</span>
                </div>
                <div class="modal-body" id="address-module">
                    <div class="office-location">
                        <div class="col">
                            <div class="form-group">
                                <label>استان<span class="required">*</span></label>
                                <input type="text" class="form-control required" name="state_id"
                                       value="{{old('state_id')}}" placeholder="نام استان"
                                       id="modal-state-selector"
                                       data-url="{{route('api.v1.location.get-states')}}"
                                       @if(old('state_id') != null )
                                           data-initial-value='{{get_state_json_by_id(old('state_id'))}}'
                                        @endif >
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>شهر<span class="required">*</span></label>
                                <input type="text" class="form-control required" name="city_id"
                                       value="{{old('city_id')}}" placeholder="نام شهر"
                                       id="modal-city-selector"
                                       data-url-base="{{route('api.v1.location.get-cities')}}"
                                       @if(old('city_id') != null )
                                           data-initial-value='{{get_city_json_by_id(old('city_id'))}}'
                                        @endif >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn submit" data-text="تایید شهر و استان"><span class="text">تایید شهر و استان</span></button>
                </div>
            </div>
        </form>
    </div>
</div>

@if(is_customer())
    <div class="modal fade" id="addresses-modal" tabindex="-1" role="dialog" aria-labelledby="addressesLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{route("customer.address.set-main")}}">
                {{csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <span class="modal-title">انتخاب آدرس</span>
                    </div>
                    <div class="modal-body">

                        @foreach(get_customer_addresses() as $address)
                            <div class="address-item">
                                <div class="form-group">
                                    <div class="radio">
                                        <div class="radio-group">
                                            <input type="radio" name="address_id"
                                                   id="customer-address-{{$address->id}}" value="{{$address->id}}"
                                                   @if($address->is_main and old('customer_address_id') == null) checked
                                                   @endif
                                                   @if(old('customer_address_id') == $address->id) checked @endif>
                                            <label for="customer-address-{{$address->id}}" class="radiobtn">
                                                {{$address?->state?->name}}، {{$address?->city?->name}}
                                                ، {{$address->superscription}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <a href="{{route('customer.address.create')}}" title="افزودن آدرس" class="add-address">
                            <i class="fa fa-plus" aria-hidden="true"></i><span class="text"> افزودن آدرس</span>
                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn submit" data-text="ثبت"><span class="text">ثبت</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif

<div class="modal fade" id="added-to-cart-modal" tabindex="-1" role="dialog" aria-labelledby="addedToBasketLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="question"><i class="fa fa-check"></i>
                    محصول مورد نظر شما با موفقیت به سبد خرید افزوده شد.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn cancel" data-dismiss="modal" data-text="بازگشت"><span class="text">بازگشت</span>
                </button>
                <a href="@if(is_customer()) {{route('customer.cart.show')}} @else
                {{route('customer.show-local-cart')}} @endif" class="btn submit" data-text="مشاهده سبد خرید"
                   title="مشاهده سبد خرید">
                    <span class="text">مشاهده سبد خرید</span></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-to-homeScreen-android-modal" tabindex="-1" role="dialog"
     aria-labelledby="addToHomeScreen"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">راهنمای افزودن میانبر وبسایت</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="question">
                    برای افزودن آیکون نسخه موبایل ابزارمبل مهدی(خواجه لو) در مرورگر از نوار بالای صفحه آیکون <i
                            class="fa fa-lg fa-ellipsis-v"></i> انتخاب کرده و از منوی باز
                    شده گزینه add to home screen را انتخاب نمایید.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn submit" data-dismiss="modal" data-text="متوجه شدم"><span class="text">متوجه شدم</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add-to-homeScreen-iphone-modal" tabindex="-1" role="dialog"
     aria-labelledby="addToHomeScreen"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">راهنمای افزودن میانبر وبسایت</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="question">
                    برای افزودن آیکون نسخه موبایل ابزارمبل مهدی(خواجه لو) در مرورگر safary از نوار پایین صفحه، آیکون <img
                            src="https://img.icons8.com/windows/32/000000/share-rounded.png" alt="icon"> انتخاب کرده و
                    از منوی باز
                    شده گزینه add to home screen را انتخاب نمایید.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn submit" data-dismiss="modal" data-text="متوجه شدم"><span class="text">متوجه شدم</span>
                </button>
            </div>
        </div>
    </div>
</div>


