@extends('_base')

@section('title')
    بازبینی سفارش - فروشگاه اینترنتی صنعت تاسیسات و پایپینگ، شیرآلات و اتصالات صنعتی
@endsection

@section('meta_tags')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta itemprop="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta name="yn-tag" id="de161dc7-e552-4640-9d8e-f3da2abef5e4">
@endsection

@section('main_content')
    <script>window.currentPage = "invoice-payment"</script>
    <div class="container-fluid">
        <div class="payment" id="payment">
            @include('_invoice_process', ['status' => $invoice->status])
            @if($errors->any())
                <p class="bg-danger" style="padding: 10px;margin-top: 10px;">
                    @foreach($errors->getMessages() as $inputName => $messages)
                        @foreach($messages as $message)
                            - {{$message}} <br/>
                        @endforeach
                    @endforeach
                </p>
            @endif
            <div class="products-list-summery">
                <div class="product-list-header">
                    <div class="row m-0">
                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-2 col-item"></div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-item">مشخصات کالا</div>
                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs col-xs-2 col-item">قیمت واحد</div>
                        <div class="col-lg-1 col-md-1 hidden-sm hidden-xs col-xs-2 col-item">تخفیف</div>
                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 col-item">تعداد</div>
                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 col-item">مالیات (۹٪)</div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 col-item">جمع</div>
                    </div>
                </div>
                <div class="product-list-body-xxl">
                    @foreach($invoice->rows as $index => $row)
                        <div product-box
                             product-price="{{$row->product->has_discount ? $row->product->previous_price : $row->product->latest_price }}"
                             product-id="{{$row->product->id}}" data-product-id="{{$row->product->id}}"
                             data-discount-group="{{json_encode($row->product->discountGroup)}}"
                             class="row product-row">
                            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-2 col-item">
                                <img src="{{ImageService::getImage($row->product, 'preview')}}"
                                     alt="{{$row->product->title}}" class="img-fluid">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-item product-name">{{$row->product->title}}</div>
                            <div class="col-lg-2 col-md-2 hidden-sm col-item unit-price">
                                <div class="after-discount">
                                    <span class="price-data">
                                        {{$row->product->has_discount ? $row->product->previous_price : $row->product->latest_price}}
                                    </span>
                                    <span class="list-price-text">تومان</span>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 hidden-sm col-item percent">
                                <div class="discount-container">
                                    @if($row->product->has_discount)
                                        <span class="price-data discount-value special"
                                              data-amount="{{ $row->product->previous_price - $row->product->latest_price }}">
                                                    {{ $row->product->previous_price - $row->product->latest_price }}
                                                </span>
                                        <span class="list-price-text">تومان</span>
                                    @elseif($row->product->discountGroup !== null)
                                        <span class="price-data discount-value">{{ $row->product->discountGroup->value }}</span>
                                        <span class="list-price-text">{{ $row->product->discountGroup->is_percentage ? "٪" : "تومان" }}</span>
                                    @else
                                        <span class="price-data discount-value hidden-sm hidden-xs"
                                              style="font-size:13px">بدون تخفیف</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 col-item quantity counter-box-{{$row->product->id}} count-group">
                                <input type="text" readonly class="count-control count-control-local"
                                       value="{{$row->count}}">
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 col-item">
                                <div product-id="{{$row->product->id}}">
                                    <div class="tax-price">
                                        <span class="price-data price-tax">0</span>
                                        <span class="list-price-text">تومان </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 col-item unit-price">
                                <div product-id="{{$row->product->id}}">
                                    <div class="before-discount">
                                        <span class="sum-price-before before-price digit">
                                            <strike>
                                                <span class="digit price-data">
                                                    {{$row->product->latest_price }}
                                                </span>
                                            </strike>
                                        </span>
                                    </div>
                                    <div class="after-discount sum-price">
                                        <span class="price-data price-sum">{{$row->product->latest_price}}</span>
                                        <span class="list-price-text">تومان </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="section-title">خلاصه صورت حساب</div>
            <div class="cart-sum-price invoice-sum-container">
                <div class="sum-price-before-discount before-discount">
                    <span>جمع کل </span>
                    <span class="double-point">: </span>
                    <span class="text"> تومان</span>
                    <span class="price-data">{{$invoice->sum - $invoice->shipment_cost}}</span>
                </div>
                <div class="sum-price-discount" id="discount-row">
                    <div class="discount-form">
                        <input type="text" placeholder="کد تخفیف" class="form-control" name="discount_code">
                        <a href="#" class="btn submit" title="اعمال تخفیف">اعمال تخفیف</a>
                        <div class="notes danger-discount">
                            <div class="ttl"></div>
                        </div>
                    </div>
                    <div class="discount-details discount">
                        <span>سود شما از این خرید </span>
                        <span class="double-point">: </span>
                        <span class="text"> تومان</span>
                        <span class="price-data">0</span>
                    </div>

                </div>
                <div class="sum-price-coupon" id="coupon-row">
                    <div class="coupon-form">
                        <select type="text" class="form-control" name="coupon_id">
                            @foreach(get_not_used_coupons() as $coupon)
                                <option value="{{$coupon->id}}" >
                                    {{$coupon->title}} - (قابل استفاده تا {{JDate::forge($coupon->expire_at)->format("%Y/%m/%d")}})
                                </option>
                            @endforeach
                        </select>
                        <a href="#" class="btn submit" title="اعمال تخفیف">اعمال کوپن</a>
                        <div class="notes danger-discount">
                            <div class="ttl"></div>
                        </div>
                    </div>
                    <div class="coupon-details coupon">
                        <span>مبلغ کاسته شده از سفارش </span>
                        <span class="double-point">: </span>
                        <span class="text"> تومان</span>
                        <span class="price-data">0</span>
                    </div>

                </div>
                <div class="sum-price-tax tax">
                    <span>مالیات و ارزش افزوده </span>
                    <span class="double-point">: </span>
                    <span class="text"> تومان</span>
                    <span class="price-data">0</span>
                </div>
                <div class="sum-price-after-discount after-discount">
                    <span>مبلغ قابل پرداخت </span>
                    <span class="double-point">: </span>
                    <span class="text"> تومان</span>
                    <span class="price-data">{{$invoice->sum}}</span>
                </div>
            </div>
            <div class="section-title">اطلاعات سفارش</div>
            <div class="info">
                <div class="info-row">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div>این سفارش به <strong>{{$invoice->customer_address}}</strong> به آدرس
                        تحویل می گردد
                    </div>
                </div>
                <div class="info-row">
                    <div class="icon"><i class="fas fa-car"></i></div>
                    @if($invoice->shipment_cost != 0)

                        <div>این سفارش از طریق تحويل اکسپرس ریتاپی با مبلغ <span
                                    class="price-data">{{$invoice->shipment_cost}} </span>
                            <small>تومان</small> (هزینه ارسال) به شما تحویل داده خواهد شد.(ارسال
                            رايگان سفارش‌های بالاتر از <span
                                    class="price-data">{{get_minimum_purchase_free_shipment()/10}}</span> تومان)
                        </div>
                    @else
                        <div>این سفارش از طریق تحويل اکسپرس ریتاپی رایگان
                            به شما تحویل داده خواهد شد.
                        </div>
                    @endif
                </div>
                <div class="info-row">
                    <div class="icon"><i class="fas fa-receipt"></i></div>

                    <div>فاکتور این سفارش برای
                        @if($invoice->is_legal)
                            <strong>{{ get_customer_legal_info()->company_name }}</strong>
                        @else
                            <strong>{{ get_customer_user()->user->full_name }}</strong>
                        @endif

                        صادر خواهد شد.
                    </div>
                </div>
            </div>
            <form action="{{route('customer.invoice.save-payment')}}" method="post" id="main-form">
                {{ csrf_field() }}
                <div class="section-title">شیوه پرداخت</div>
                <div class="payment-method-list">
                    <div class="payment-row">
                        <div class="radio">
                            <div class="radio-group">
                                <input type="radio" name="payment_type" id="payment_online" value="0" checked>
                                <label for="payment_online" class="radiobtn">پرداخت به صورت آنلاین</label>
                            </div>
                        </div>
                    </div>
                    {{--<div class="payment-row">
                        <div class="radio">
                            <div class="radio-group">
                                <input type="radio" name="payment" id="payment_2" value="">
                                <label for="payment_2" class="radiobtn">پرداخت به صورت کارت به کارت</label>
                            </div>
                        </div>
                    </div>--}}
                </div>

                <div class="btn-row mt-3">
                    <div class="row">
                        <div class="col-lg-6 col-ms-6 col-sm-6 col-xs-12 back-basket-btn-div">
                            <a href="{{route('customer.invoice.show-shipment')}}" class="btn back" title="بازگشت ">
                                <i class="fa fa-angle-right"></i>بازگشت </a>
                        </div>
                        <div class="col-lg-6 col-ms-6 col-sm-6 col-xs-12 submit-basket-btn-div mt-2 mt-md-0">
                            <button type="submit" class="btn submit" id="pay-online"> ادامه ثبت سفارش <i
                                        class="fa fa-angle-left"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection