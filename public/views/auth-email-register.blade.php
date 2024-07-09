@extends('_base')

@section('title')
    ثبت‌نام -
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

    <script>window.currentPage = "mobile-register"</script>
    <div class="container mobile-auth">
        <div class="icon-title">
            <i class="fa fa-question" aria-hidden="true"></i><span>ثبت نام در کیت‌لاین</span>
        </div>
        <div class="top-line-content">
            <form class="" action="{{route("customer-auth.do-register", ['email', $value])}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">نام<span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="نام"
                           value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="family">نام خانوادگی<span class="required">*</span></label>
                    <input type="text" class="form-control" name="family" placeholder="نام خانوادگی"
                           value="{{ old('family') }}">
                </div>
                <div class="form-group">
                    <label for="name">شماره موبایل<span class="required">*</span></label>
                    <input type="text" class="form-control number-control" name="main_phone" placeholder="شماره موبایل"
                           value="{{ old('main_phone') }}">
                </div>
                <div class="form-group">
                    <label for="name">ایمیل</label>
                    <input type="email" class="form-control" name="mail" placeholder="ایمیل" disabled
                           value="{{ email_decode($value) }}">
                    <input type="hidden" name="email" value="{{ email_decode($value) }}">

                </div>
                <div class="form-group">
                    <label for="family">کد ملی<span class="required">*</span></label>
                    <input type="text" class="form-control number-control" name="national_code" placeholder="کد ملی"
                           value="{{ old('national_code') }}">
                </div>
                @if(recaptcha_enabled()) @captcha('fa') @endif
                <button type="submit" class="btn submit" data-text="ثبت نام"><span class="text">ثبت نام</span></button>
            </form>
        </div>
    </div>
@endsection

