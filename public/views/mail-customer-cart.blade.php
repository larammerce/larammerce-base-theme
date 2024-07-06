@extends('_mail_base')

@section('title')
    اطلاع رسانی سبد خرید در ابزارمبل مهدی(خواجه لو)
@endsection

@section('subject')
    اطلاع رسانی سبد
@endsection

@section('content')
    <p style="font-size: 22px; line-height: 22px; margin: 0; padding: 0;">
        سلام {{$customerFullName}} عزیز</p>

    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            محصولات زیر که اخیرا به سبد خرید خود اضافه کرده بودید، در انتظار تایید شماست، قبل از ناموجود شدن به نهایی کردن سبد خرید خود بپردازید.
        </p>
    </div>

    <div class="top-line-content">
        <div class="row">
            @foreach($cartRows as $cartRow)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="product-item">
                        <a href="{{$cartRow->product->getFrontUrl()}}" target="_blank" title="{{$cartRow->product->title}}">
                            <div class="product-pic ratio-box" data-ratio="1:1">
                                <img src="{{ImageService::getImage($cartRow->product, 'thumb')}}"
                                     alt="{{$cartRow->product->title}}"
                                     class="img-fluid @if($cartRow->product->getSecondaryPhoto()) img-main @endif">
                                @if($cartRow->product->has_discount)
                                    <div class="ribbon">ویژه</div>
                                @endif
                            </div>
                            <a href="{{$cartRow->product->getFrontUrl()}}" target="_blank" title="{{$cartRow->product->title}}">
                                <h3 class="product-title">{{$cartRow->product->title}}</h3>
                            </a>
                            <div class="product-footer">
                                <div class="product-price">
                                    @if($cartRow->product->is_active)
                                        @if($cartRow->product->has_discount)
                                            <span class="price-data discount">{{$cartRow->product->previous_price}}</span>
                                        @endif
                                        <span class="price-data">{{$cartRow->product->latest_price}} </span>
                                        تومان
                                    @endif
                                </div>
                                <div class="rating-value">
                                    <span class="numerical-data price-data">{{ $cartRow->product->average_rating }}</span>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <p style="font-size: 20px; line-height: 22px; margin: 0; padding: 0;">
        <a href="{{route('customer.show-local-cart')}}"
           style="margin-top: 40px; color: #ffffff; text-decoration: none; display: inline-block; font-size: 20px; line-height: 46px; text-align: center; -webkit-text-size-adjust: none; font-weight: bold; white-space: nowrap; text-transform: uppercase; background-color: #fabe3c; padding: 5px 50px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;overflow: hidden;-webkit-box-shadow: #dadada 3px 5px 20px 0px;-moz-box-shadow: #dadada 3px 5px 20px 0px;box-shadow: #dadada 3px 5px 20px 0px;">
            سبد خرید
        </a>
    </p>
@endsection
