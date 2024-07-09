@extends('_base')

@section('title')
    ثبت‌نام یا ورود -
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

    <script>window.currentPage = "auth-mobile-auth"</script>
    <div class="container mobile-auth">
        <div class="icon-title">
            <i class="icon-login" aria-hidden="true"></i><span>ورود‌ یا ثبت‌نام</span>
        </div>
        <div class="top-line-content">
            <form class="" action="{{route("customer-auth.do-mobile-auth")}}" method="post">
                {{ csrf_field() }}
                @if($errors->has('g-recaptcha-response'))
                    <p class="bg-warning" style="padding: 10px;">
                        لطفا دوباره تلاش کنید.
                    </p>
                @endif
                <div class="form-group">
                    <label for="main_phone">
                        برای ورود‌ یا ثبت‌ نام
                        <b> شماره موبایل </b>
                        خود را وارد کنید.
                        <span class="required">*</span>
                    </label>
                    <input type="text" class="form-control number-control" name="main_phone"
                           placeholder=""
                           value="{{old('main_phone')}}">
                </div>
                @if(recaptcha_enabled()) @captcha('fa') @endif
                <button type="submit" class="btn submit" data-text="تایید"><span class="text">تایید</span></button>
            </form>
        </div>
    </div>
@endsection

