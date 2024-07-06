@extends('_mail_base')

@section('title')
    موجود شدن محصول در ابزارمبل مهدی(خواجه لو)
@endsection

@section('subject')
    موجود شدن محصول
@endsection

@section('content')
    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            محصول {{ $productTitle }} از دایرکتوری {{ $productDirectoryTitle }} فعال شد.
        </p>
    </div>

    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: right ;font-size: 12px; line-height: 20px; margin: 20px 0 0; padding: 0;">
            لینک مشاهده در پنل:
        </p>
        <p style="direction: ltr; text-align: left;font-size: 12px; line-height: 20px; margin: 20px 0 0; padding: 0;" align="left">
            {{ $adminUrl }}
        </p>
    </div>
@endsection