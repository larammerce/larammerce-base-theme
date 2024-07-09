@extends('_mail_base')
@section('title')
    دریافت سفارش جدید
@endsection
@section('subject')
    دریافت سفارش جدید
@endsection
@section('content')
    <div style="text-align: right;" align="right">
        <p style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 15px 0 15px;; padding: 0;">
            <strong style="font-weight: bold">شماره سفارش  :</strong> {{ isset($data['tracking_code']) ? $data['tracking_code'] : 'بدون موضوع' }}
        </p>
        <hr>
        <section style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 15px 0 15px;; padding: 0;"> ‌<span style="font-weight: bold">از طرف : </span> {{ isset($data['phone_number']) ? $data['phone_number'] : 'ناشناس' }}</section>
        <section style="direction: rtl;text-align: justify ;font-size: 14px; line-height: 20px; margin: 15px 0 15px;; padding: 0;"> ‌<span style="font-weight: bold">مبلغ تراکنش : </span> {{ isset($data['sum']) ? $data['sum'] : 'بدون متن' }}</section>
    </div>
@endsection