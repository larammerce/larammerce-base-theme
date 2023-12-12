@extends('_base')

@section('title')
    ثبت ‌نام یا ورود -
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

    <script>window.currentPage = "auth-email-auth"</script>
    <div class="container mobile-auth">
        <div class="icon-title">
            <i class="icon-login" aria-hidden="true"></i><span>ورود‌ یا ثبت ‌نام</span>
        </div>
        <div class="extra-link-container">
            <a href="{{route('customer-auth.show-auth', 'mobile')}}" class="extra-link pull-left" title="ورود یا ثبت‌نام از طریق تلفن همراه">
                ورود یا ثبت‌نام از طریق تلفن همراه
            </a>
        </div>
        <div class="top-line-content">
            <form class="" action="{{route("customer-auth.do-email-auth")}}" method="post">
                {{ csrf_field() }}
                @if($errors->has('g-recaptcha-response'))
                    <p class="bg-warning" style="padding: 10px;">
                        لطفا دوباره تلاش کنید.
                    </p>
                @endif
                <div class="form-group">
                    <label for="email">
                        برای ورود‌ یا ثبت‌نام
                        <b>ایمیل</b>
                        خود را وارد کنید.
                        <span class="required">*</span>
                    </label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                @if(recaptcha_enabled()) @captcha('fa') @endif
                <button type="submit" class="btn submit">تایید</button>
            </form>
        </div>
    </div>
@endsection

