@extends('_base')

@section('title')
    بازبینی سفارش -
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
    <script>window.currentPage = "invoice-payment";</script>
    <script>window.extraFee = {{$invoice->shipment_cost/10}};</script>
    <div class="container invoice-payment">
        @include('_invoice_process', ['status' => $invoice->status])
        <div class="top-line-content">
            @if($errors->any())
                <p class="bg-danger" style="padding: 10px;margin-top: 10px;">
                    @foreach($errors->getMessages() as $inputName => $messages)
                        @foreach($messages as $message)
                            - {{$message}} <br/>
                        @endforeach
                    @endforeach
                </p>
            @endif

            <div class="product-list">

                <div class="pd-list-body">
                    @foreach($invoice->rows as $row)
                        <div class="pd-list-item" product-box
                             product-price="{{$row->product->has_discount ? $row->product->previous_price : $row->product->latest_price }}"
                             product-id="{{$row->product->id}}" data-product-id="{{$row->product->id}}"
                             data-discount-group="{{json_encode($row->product->discountGroup)}}">
                            <div class="col product-details detail-product">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <img src="{{ImageService::getImage($row->product, 'preview')}}"
                                             class="img-fluid" alt="{{$row->product->title}}">
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                        <h3 class="product-name">{{$row->product->title}}</h3>
                                        <p class="code">KIT:
                                            <span>{{ $row->product->code }}</span></p>
                                        <div class=" price price-single unit-price">
                                            <span>قیمت واحد: </span>
                                            <span class="after-discount">
                                                <span class="price-data">
                                                    {{$row->product->has_discount ? $row->product->previous_price : $row->product->latest_price}}
                                                </span>
                                                <span class="list-price-text hidden-xl hidden-lg">تومان</span>
                                            </span>
                                        </div>
                                        <div class="discount-container">
                                            <span>تخفیف:</span>
                                            @if($row->product->has_discount)
                                                <span class="price-data discount-value special"
                                                      data-amount="{{ $row->product->previous_price - $row->product->latest_price }}">
                                                    {{ $row->product->previous_price - $row->product->latest_price }}
                                                </span>
                                                <span class="list-price-text">تومان</span>
                                            @elseif($row->product->discountGroup !== null)
                                                <span class="price-data discount-value">{{ $row->product->discountGroup->value }}</span>
                                                <span class="list-price-text">{{ $row->product->discountGroup->is_percentage ? "٪" : "تومان" }}</span>
                                            @endif
                                        </div>
                                        <div class="quantity counter-box-{{$row->product->id}} count-group">
                                            <span class="hidden-xl hidden-lg">تعداد: </span>
                                            <input type="text" readonly class="count-control count-control-local"
                                                   value="{{$row->count}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col price unit-price">
                                <div class="d-inline">مجموع قیمت:</div>
                                <div product-id="{{$row->product->id}}" class="d-inline">
                                    <span class="before-discount d-inline">
                                        <span class="sum-price-before before-price digit">
                                            <strike>
                                                <span class="digit price-data">
                                                    {{$row->product->latest_price }}
                                                </span>
                                            </strike>
                                        </span>
                                    </span>
                                    <div class="after-discount sum-price d-inline">
                                        <span class="price-data price-sum">{{$row->product->latest_price}}</span>
                                        <span class="list-price-text">تومان </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="icon-title">
                <i class="fa fa-angle-left" aria-hidden="true"></i><span>خلاصه صورتحساب شما</span>
            </h3>

            <div class="summery invoice-sum-container">
                <div class="row before-discount">
                    <div class="col col-lg-6 col-md-6 ttl">جمع کل خرید شما</div>
                    <div class="col col-lg-6 col-md-6 price">
                        <div class="sum-price-before-discount before-discount">
                            <span class="price-data cart-sum">
                                0
                            </span>
                            <span> تومان</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-6 col-md-6 ttl">هزینه ارسال ، بیمه و بسته بندی</div>
                    <div class="col col-lg-6 col-md-6 price">
                        <span class="price-data">{{$invoice->shipment_cost/10}}</span>
                        <span> تومان</span>
                    </div>
                </div>
                <div class="row" id="discount-row">
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="discount-form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="discount_code" placeholder="کد تخفیف">
                            </div>
                            <a href="#" class="btn submit" data-text="اعمال تخفیف" title="اعمال تخفیف"><span
                                        class="text">اعمال تخفیف</span></a>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 notes discount sum-price-discount">
                        <div class="col ttl">جمع کل تخفیف</div>
                        <div class="col price">
                            <span class="price-data">0</span>
                            <span class="text"> تومان</span>
                        </div>
                    </div>
                </div>
                <div class="sum row" id="invoice-sum">
                    <div class="col col-lg-6 col-md-6 ttl">مبلغ قابل پرداخت</div>
                    <div class="col col-lg-6 col-md-6 price sum-price-after-discount after-discount">
                        <span class="price-data cart-sum">{{$invoice->sum}}</span><span> تومان</span>
                    </div>
                </div>
            </div>

            <div class="icon-title">
                <i class="fa fa-angle-left" aria-hidden="true"></i><span>اطلاعات سفارش</span>
            </div>

            <div class="info">
                <div class="info-row">
                    <div class="icon"><i class="icon-placeholder" aria-hidden="true"></i></div>
                    <div>این سفارش به <strong>{{$invoice->transferee_name}}</strong>
                        به آدرس <strong>{{$invoice->customer_address}}</strong> به شماره
                        <strong>{{$invoice->phone_number}}</strong> تحویل می گردد
                    </div>
                </div>

                @if($invoice->shipment_cost > 0)
                    <div class="info-row">
                        <div class="icon"><i class="icon-accesories" aria-hidden="true"></i></div>
                        <div>این سفارش از طریق تحويل ابزارمبل مهدی(خواجه لو) با مبلغ <span
                                    class="price-data">{{$invoice->shipment_cost / 10}}</span> تومان به شما تحویل داده
                            خواهد
                            شد.(ارسال
                            رايگان
                            سفارش‌های بالاتر از <span class="price-data">{{get_minimum_purchase_free_shipment()/10}}</span>
                            تومان)
                        </div>
                    </div>
                @endif
                @if($invoice->has_paper)
                    <div class="info-row">
                        <div class="icon"><i class="icon-avatar" aria-hidden="true"></i></div>
                        <div>فاکتور این سفارش برای
                            @if($invoice->is_legal)
                                <strong>{{ get_customer_legal_info()->company_name }}</strong>
                            @else
                                <strong>{{ get_customer_user()->user->full_name }}</strong>
                            @endif
                            صادر خواهد شد.
                        </div>
                    </div>
                @endif
            </div>

            <div class="icon-title">
                <i class="fa fa-angle-left" aria-hidden="true"></i><span>انتخاب روش پرداخت</span>
            </div>

            <form action="{{route('customer.invoice.save-payment')}}" method="post" id="main-form">
                {{ csrf_field() }}

                <div class="payment">
                    <div class="payment-row">
                        <div class="icon form-group">
                            <div class="radio">
                                <div class="radio-group">
                                    <input type="radio" name="payment_type" id="payment_online" value="0" checked>
                                    <label for="payment_online" class="radiobtn"></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            پرداخت به صورت آنلاین
                        </div>
                    </div>
                </div>
                @if($invoice->sum >= get_max_transaction_amount())
                    <div class="alert alert-max">
                        <strong>نکته :</strong> مبلغ خرید شما بالای ۱۰۰ میلیون تومان است. لطفا جهت ثبت نهایی سفارش خود با
                        پشتیبانی ابزارمبل مهدی(خواجه لو)
                        به شماره ۷۲۱۱۳-۰۲۱ تماس حاصل فرمایید.
                    </div>
                @endif
                <button href="" role="button" class="btn btn-download"><i class="fa fa-download" aria-hidden="true"></i>
                    دانلود
                    لیست سفارشات
                </button>
                <div class="button-wrapper">
                    <a href="{{route('customer.invoice.show-shipment')}}" class="btn btn-icon-reverse back col-xs-12"
                       data-text='بازگشت' title="بازگشت">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="text">بازگشت</span>
                    </a>
                    <button type="submit" class="btn btn-icon next col-xs-12" id="pay-online"
                            data-text='ادامه ثبت سفارش'>
                        <span class="text">ادامه ثبت سفارش</span>
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </button>
                </div>

            </form>
        </div>


        {{--Pre-invoice PDF design / Start--}}
        @include("_print_invoice")
        {{--Pre-invoice PDF design / End--}}
    </div>
@endsection
