@extends('_mail_base')

@section('title')
    تایید حساب ایمیل در ابزارمبل مهدی(خواجه لو)
@endsection

@section('subject')
    تایید حساب ایمیل
@endsection

@section('content')
    <p style="font-size: 22px; line-height: 22px; margin: 0; padding: 0;">
        سلام {{$user->name}} عزیز</p>

    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            برای تایید ایمیل صحت ایمیل‌تان به ابزارمبل مهدی(خواجه لو) روی دکمه زیر کلیک کنید ،
            در صورتی که عملکرد دکمه تایید با مشکل مواجه است از لینک
            جایگزین برای نهایی کردن تایید خود استفاده کنید.
        </p>
    </div>

    <p style="font-size: 20px; line-height: 22px; margin: 0; padding: 0;">
        <a href="{{env('APP_URL')}}/customer/email-confirmation?token={{$token}}"
           style="margin-top: 40px; color: #ffffff; text-decoration: none; display: inline-block; font-size: 20px; line-height: 46px; text-align: center; -webkit-text-size-adjust: none; font-weight: bold; white-space: nowrap; text-transform: uppercase; background-color: #fabe3c; padding: 5px 50px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;overflow: hidden;-webkit-box-shadow: #dadada 3px 5px 20px 0px;-moz-box-shadow: #dadada 3px 5px 20px 0px;box-shadow: #dadada 3px 5px 20px 0px;">
            تایید
        </a>
    </p>

    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: right ;font-size: 12px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            لینک جایگزین را کپی و در نوار آدرس مرورگر خود بازنشانی کنید :
        </p>
        <p style="direction: ltr; text-align: left;font-size: 12px; line-height: 20px; margin: 20px 0 0; padding: 0;" align="left">
            {{env('APP_URL')}}/customer/email-confirmation?token={{$token}}
        </p>
    </div>
@endsection