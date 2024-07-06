@extends('_mail_base')

@section('title')
    کد یکبار مصرف در ابزارمبل مهدی(خواجه لو)
@endsection

@section('subject')
    کد یکبار مصرف
@endsection

@section('content')
    <p style="font-size: 22px; line-height: 22px; margin: 0; padding: 0;">
        مشترک محترم
    </p>

    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            کد یکبار مصرف شما:
        </p>
        <h1 style="text-align: center">
            {{ $oneTimeCode }}
        </h1>
        <p style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            برای ادامه‌ی روال احراز هویت از لینک زیر استفاده کنید،
            در صورتی که عملکرد دکمه احراز هویت با مشکل مواجه است از لینک
            جایگزین برای نهایی کردن احراز هویت خود استفاده کنید.
        </p>
    </div>

    <p style="font-size: 20px; line-height: 22px; margin: 0; padding: 0;">
        <a href="{{ route('customer-auth.show-check', ['email', email_encode($email)]) }}"
           style="margin-top: 40px; color: #ffffff; text-decoration: none; display: inline-block; font-size: 20px; line-height: 46px; text-align: center; -webkit-text-size-adjust: none; font-weight: bold; white-space: nowrap; text-transform: uppercase; background-color: #fabe3c; padding: 5px 50px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;overflow: hidden;-webkit-box-shadow: #dadada 3px 5px 20px 0px;-moz-box-shadow: #dadada 3px 5px 20px 0px;box-shadow: #dadada 3px 5px 20px 0px;">
            احراز هویت
        </a>
    </p>

    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: right ;font-size: 12px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            لینک جایگزین را کپی و در نوار آدرس مرورگر خود بازنشانی کنید :
        </p>
        <p style="direction: ltr; text-align: left;font-size: 12px; line-height: 20px; margin: 20px 0 0; padding: 0;" align="left">
            {{ route('customer-auth.show-check', ['email', email_encode($email)]) }}
        </p>
    </div>
@endsection