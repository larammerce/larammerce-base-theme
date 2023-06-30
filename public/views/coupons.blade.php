@extends('_base')

@section('title')
    لیست کوپنهای سیستمی
@endsection

@section('main_content')
    <script>window.currentPage = "favorites"</script>
    <div class="container-fluid favorites" id="favorites">

        <div class="section-title">کوپن ها</div>

        <div class="row">
            @foreach($coupons as $coupon)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <h4>{{$coupon->title}}</h4>
                        <p><span class="price-data">{{$coupon->amount}}</span> ریال</p>
                        <p>
                        @if($coupon->is_used)
                            استفاده شده در تاریخ {{JDate::forge($coupon->used_at)->format("%Y/%m/%d")}}
                        @else
                            استفاده نشده، قابل استفاده تا تاریخ {{JDate::forge($coupon->expire_at)->format("%Y/%m/%d")}}
                        @endif
                        </p>
                        <p></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection