@extends('_base')

@section('title')
    {{ $web_page->getSeoTitle() }} -
@endsection

@section('meta_tags')
    @include('_meta_tags', ['obj' => $web_page])
    <meta property="og:type" content="website">
@endsection


@section('main_content')
    <script>window.currentPage="faq"</script>
    <div class="container faq">
        <h1 class="icon-title">
            <i class="fa fa-question" aria-hidden="true"></i>
            <span hct-content="title" hct-content-type="text" hct-title='عنوان'>پرسش های متداول</span>
        </h1>
        <div class="top-line-content" hct-gallery="faqs" hct-title='پرسش وپاسخ ها' hct-max-entry="7" hct-random-select>
            <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs" hct-gallery-fields>
                <li hct-gallery-field="question" hct-title="سوال"></li>
                <li hct-gallery-field="description" hct-title="جواب"></li>
            </ul>
            <div class="desc" hct-gallery-item>
                <strong class="question">
                    <i class="fa fa-angle-left"></i>
                    {%- ex-prop:question %}
                </strong>
                <div class="answer">
                    {%- ex-prop:description %}
                </div>
            </div>
            <hr/>
            <div class="desc" >
                <strong class="question">دفتر مرکزی:</strong>
                <p class="number" hct-content="center_office_phone_number" hct-content-type="text" hct-title='تلفن دفتر مرکزی'>۰۲۱-۲۲۶۹۴۹۹۹</p>
                <strong class="question">مرکز امور مشتریان:</strong>
                <p class="number" hct-content="customers_office_phone_number" hct-content-type="text" hct-title='تلفن مرکز امور مشتریان'>۰۲۱-۷۲۱۱۳</p>
                <strong class="question">زمان پاسخگویی:</strong>
                <p hct-content="opening_time" hct-content-type="text" hct-title='زمان پاسخگویی:'>
                    شنبه تا چهارشنبه ۸:۳۰ تا ۲۲  <br>پنجشنبه ها۸:۳۰ تا ۱۸:۳۰
                </p>
            </div>
        </div>
    </div>
@endsection
