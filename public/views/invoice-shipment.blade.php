@extends('_base')

@section('title')
    اطلاعات ارسال سفارش -
@endsection

@section('meta_tags')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta itemprop="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
@endsection

@section('main_content')
    <script>window.currentPage = "invoice-shipment"</script>
    <div class="container invoice-shipment">
        @include('_invoice_process', ['status' => $invoice->status])

        <div class="top-line-content">
            <h3 class="icon-title">
                <i class="fa fa-angle-left" aria-hidden="true"></i><span>انتخاب آدرس </span>
            </h3>

            <form method="post" action="{{route('customer.invoice.save-shipment')}}">
                {{ csrf_field() }}
                @if($errors->any())
                    <p class="bg-danger" style="padding: 10px;margin-top: 10px;">
                        @foreach($errors->getMessages() as $inputName => $messages)
                            @foreach($messages as $message)
                                - {{$message}} <br/>
                            @endforeach
                        @endforeach
                    </p>
                @endif


                @foreach(get_customer_addresses() as $address)
                    <div class="address">
                        <div class="address-header">
                            <div class="address-title">{{$address->name}}</div>
                            <div class="address-button">
                                <a href="{{route('customer.address.edit', $address)}}" title="ویرایش آدرس">
                                    <i class="icon-edit" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="address-body">
                            <div class="address-content">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                        <span>استان :</span>
                                        {{$address->state?->name}}
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                        <span>شهر :</span>
                                        {{$address->city?->name}}</div>
                                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                                        {{$address->superscription}}
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <span>کد پستی :</span>
                                        <span class="numerical-data">{{$address->zipcode}}</span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <span>شماره تماس اضطراری :</span>
                                        <span class="numerical-data">{{$address->phone_number}}</span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <span>نام تحویل گیرنده :</span>
                                        {{$address->transferee_name}}
                                    </div>
                                </div>
                            </div>
                            <div class="address-button">
                                <a class="virt-form" title="پاک کردن آدرس"
                                   data-action="{{route('customer.address.destroy', $address)}}"
                                   data-method="post"
                                   confirm="آیا از پاک کردن این آدرس اطمینان دارید ؟">
                                    <i class="icon-garbage" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <div class="address-footer form-group">
                            <div class="radio">
                                <div class="radio-group">
                                    <input type="radio" name="customer_address_id"
                                           data-state-id="{{$address->state_id}}"
                                           data-city-id="{{$address->city_id}}"
                                           id="customer-address-{{$address->id}}" value="{{$address->id}}"
                                           @if($address->is_main and old('customer_address_id') == null) checked
                                           @endif
                                           @if(old('customer_address_id') == $address->id) checked @endif>
                                    <label for="customer-address-{{$address->id}}" class="radiobtn">به این آدرس ارسال
                                        می‌شود</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="{{route('customer.address.create')}}" title="افزودن آدرس"
                   class="btn btn-icon-reverse add-address" data-text=' افزودن آدرس'>
                    <i class="fa fa-plus" aria-hidden="true"></i><span class="text"> افزودن آدرس</span>
                </a>

                <h3 class="icon-title">
                    <i class="fa fa-angle-left" aria-hidden="true"></i><span>شیوه ارسال</span>
                </h3>
                <div class="shipping">
                    <div class=" shipping-radio form-group">
                        <div class="radio">
                            <div class="radio-group">
                                <input type="radio" name="shipment_method" id="shipment_express" value="0" checked="">
                                <label for="shipment_express" class="radiobtn"></label>
                            </div>
                        </div>
                    </div>
                    <div class="shipping-content">
                        <h4>تحویل ابزارمبل مهدی(خواجه لو)</h4>
                        <div class="desc">(برای بالای
                            <span
                                    class="price-data">{{get_minimum_purchase_free_shipment()/10}}</span>
                            تومان رایگان است.)
                        </div>
                    </div>
                    <div class="shipping-value">
                        <div class="ttl">هزینه ارسال</div>
                        @if($invoice->shipment_cost != 0)
                            <span class="price-data">{{$invoice->shipment_cost/10}}</span> تومان
                        @else
                            رایگان
                        @endif
                    </div>
                </div>


                <h3 class="icon-title">
                    <i class="fa fa-angle-left" aria-hidden="true"></i><span>زمان ارسال</span>
                </h3>
                <div class="shipping-text"></div>
                <div class="shipping-time" id="logistics-container">
                    <input type="hidden" name="logistics_enabled" value="0">
                    <ul class="nav nav-tabs" role="tablist">
                        <?php $counter = 1;?>
                        @foreach(get_logistics_schedule() as $day_index => $day)
                            <li class="nav-item" role="presentation">
                                <div class="nav-link @if($counter==1) active @endif" id="tab-{{$counter}}"
                                     data-toggle="tab"
                                     href="#content{{$counter}}" role="tab" aria-controls="content{{$counter}}"
                                     aria-selected="@if($counter==1) true @else false @endif">{{day_of_week($day_index)}}</div>
                            </li>
                            <?php $counter = $counter + 1 ?>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        <?php $counter2 = 1 ?>
                        @foreach(get_logistics_schedule() as $day_index => $day)
                            <div class="tab-pane fade @if($counter2==1) show active @endif" id="content{{$counter2}}"
                                 role="tabpanel"
                                 aria-labelledby="tab-{{$counter2}}">
                                <ul class="time-list">
                                    @foreach($day as $period_index => $period)
                                        <li class="form-group">
                                            <div class="radio">
                                                <div class="radio-group">
                                                    <input type="radio" name="delivery_period"
                                                           id="period{{$day_index.'-'.$period['column']}}"
                                                           value="{{$period['id']}}"
                                                           @if(!$period["is_enabled"]) disabled @endif>
                                                    <label for="period{{$day_index.'-'.$period['column']}}"
                                                           class="radiobtn">
                                                        @if($period["is_enabled"])
                                                            <span>{{$period['start_hour']}}</span>
                                                            <span>تا</span>
                                                            <span>{{$period['finish_hour']}}</span>
                                                        @else
                                                            <span>تکمیل ظرفیت</span>
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <?php $counter2 = $counter2 + 1 ?>
                        @endforeach
                    </div>
                </div>


                <div class="legal-invoice visible open-nav">
                    <h3 class="icon-title">
                        <i class="fa fa-angle-left" aria-hidden="true"></i><span>اطلاعات فاکتور</span>
                    </h3>
                    <div class="form-group">
                        <div class="radio">
                            <div class="radio-group">
                                <input id="is_not_legal" type="radio" name="is_legal" value="0"
                                       @if(old("is_legal") !== "1") checked @endif>
                                <label for="is_not_legal" class="radiobtn">
                                    <span>صدور فاکتور برای شخص حقیقی ({{ get_user()->full_name }})</span>
                                </label>
                            </div>
                            @if(get_customer_user()->is_legal_person)
                                <div class="radio-group">
                                    <input id="is_legal" type="radio" name="is_legal" value="1"
                                           @if(old("is_legal") === "1") checked @endif>
                                    <label for="is_legal" class="radiobtn">
                                        <span>صدور فاکتور برای شخص حقوقی ({{ get_customer_legal_info()->company_name }})</span>
                                    </label>
                                </div>
                            @else
                                <div class="alert">
                                    * در صورتی که تمایل دارید فاکتور این سفارش به نام شخص حقوقی، ثبت شود، کافی است
                                    اطلاعات
                                    حقوقی خود را
                                    <a class="edit-profile-link" title="ویرایش پروفایل"
                                       href="{{route('customer.profile.show-edit-profile')}}">تکمیل/ویرایش </a>
                                    کنید.
                                </div>
                            @endif

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
                <div class="button-wrapper">
                    <a href="{{route('customer.cart.show')}}" class="btn btn-icon-reverse back col-xs-12"
                       data-text='بازگشت به سبد خرید' title="بازگشت به سبد خرید">
                        <i class="fa fa-angle-right" aria-hidden="true"></i><span class="text">بازگشت به سبد خرید</span>
                    </a>
                    <button type="submit" class="btn btn-icon next col-xs-12" data-text='ادامه ثبت سفارش'>
                        <span class="text">ادامه ثبت سفارش</span><i class="fa fa-angle-left" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
