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
    <script>window.currentPage = "register"</script>
    <div class="container register">
        <div class="icon-title">
            <i class="icon-sign-up" aria-hidden="true"></i><span>ثبت نام در ابزارمبل مهدی(خواجه لو)</span>
        </div>
        <div class="top-line-content">
            @if($errors->has('g-recaptcha-response'))
                <p class="bg-warning" style="padding: 10px;">
                    برای ادامه ثبت نام حتما باید قسمت من ربات نیستم را تیک بزنید.
                </p>
            @endif
            <form class="row" action="{{route("customer-auth.do-register")}}" method="post">
                {{ csrf_field() }}
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="name">نام<span class="required">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="نام" value="{{old('name')}}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="fname">نام خانوادگی<span class="required">*</span></label>
                        <input type="text" class="form-control" name="family" placeholder="نام خانوادگی"
                               value="{{old('family')}}">
                    </div>
                </div>
                <div class="col-md-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">ایمیل<span class="required">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="مثال : test@example.com"
                               value="{{old('email')}}" style="direction: ltr;text-align: left;">
                    </div>
                </div>
                <div class="col-md-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="mobile">تلفن همراه<span class="required">*</span></label>
                        <input type="text" class="form-control number-control" name="main_phone"
                               placeholder=""
                               value="{{old('main_phone')}}" style="direction: ltr;text-align: left;">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="pass">رمز عبور<span class="required">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="حداقل ۶ کاراکتر">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="password">تکرار رمز عبور<span class="required">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="حد اقل ۶ کاراکتر">
                    </div>
                </div>

                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label class="checkbox-lb">
                            <input class="form-control" name="rules_agreement" type="checkbox" value="1"
                                   @if(old('rules_agreement')) checked @endif>
                            <a href="#" title=" حریم خصوصی"> حریم خصوصی</a> و
                            <a href="#" title="قوانین و مقررات">قوانین و مقررات</a> استفاده از خدمات را مطالعه کرده و با کلیه موارد آن موافقم.
                            <span class="bg-checked"></span>
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-4 col-sm-12 col-xs-12 captcha">
                    {!! Recaptcha::render() !!}
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn submit" data-text="ثبت نام"><span class="text">ثبت نام</span></button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_class') border-top @endsection