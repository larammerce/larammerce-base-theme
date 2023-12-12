@extends('_base')

@section('title')
    {{ $web_page->getSeoTitle() }} -
@endsection

@section('meta_tags')
    @include('_meta_tags', ['obj' => $web_page])
    <meta property="og:type" content="website">
@endsection

@section('main_content')
    <script>window.currentPage="privacy"</script>
    <div class="container static-page">
        <h1 class="icon-title">
            <i class="icon-price" aria-hidden="true"></i><span hct-content="title" hct-content-type="text" hct-title='عنوان'>حریم خصوصی</span>
        </h1>
        <div class="top-line-content">
            <div class="desc">
                <div hct-content="description" hct-content-type="rich_text" hct-title='توضیحات'>
                    <p>شما مشتریان محترم لارامرس برای خرید، ارسال نظرات و دستیابی به برخی امکانات دیگر سایت، نیازمند ثبت نام در سایت و ورود اطلاعات خود هستید. لارامرس با احترام به حریم شخصی شما تلاش می‌کند تا خدماتی امن را در اختیار شما بگذارد.</p>
                    <p>اطلاعاتی که مورد نیاز است شامل آدرس، شماره تلفن و آدرس ایمیل شماست. همچنین مطابق با قوانین تجارت الکترونیک و قانون‌هایی که در روند خرید وجود دارد (فاکتور رسمی، گواهی ارزش افزوده و ...)، ثبت اسم و کد ملی برای اشخاص حقیقی و کد اقتصادی و شناسه ملی برای مشتریان حقوقی الزامی است.</p>
                    <p>آدرس، ایمیل و شماره تلفن‌هایی که شما در سایت وارد می‌کنید به منزله تایید از جانب شماست و همه تعاملات لارامرس با شما از طریق آن‌ها صورت خواهد گرفت. در صورتی که این اطلاعات به طور کامل وارد نشده باشد، لارامرس از شما اطلاعات بیشتری می‌خواهد. همچنین شما می‌توانید برای خریدهای خود آدرس و شماره تلفن فرد دیگری را ذکر کنید که بدین ترتیب محصول مورد نظر شما به آن آدرس ارسال می‌گردد.</p>
                    <p>لارامرس ممکن است برای انجام برخی تحقیقات یا ارتباط با مشتریان از این اطلاعات استفاده کند و یا برای در جریان گذاشتن مشتریان از آخرین اخبار و محصولات پیام‌هایی را برای شما ایمیل کند یا از طریق پیام کوتاه پیام بفرستد. در صورتی که تمایلی به دریافت آن‌ها نداشته باشید می‌توانید عضویت در خبرنامه را کنسل کنید.</p>
                    <p>حفظ و نگهداری رمز عبور و نام کاربری برعهده کابر است. در صورتی که هریک از اطلاعات شما نظیر شماره تماس تان تغییر یافت، به پروفایل خود رفته و آن را به روز کنید.</p>
                    <p>اطلاعات شما به هیچ عنوان در اختیار شخص یا سازمان دیگری قرار نخواهد گرفت و به صورت محرمانه حفظ و نگهداری خواهد شد مگر اینکه حکم از جانب مراجع قانونی صادر گردد.</p>
                    <p>ما نیز همانند سایر وب سایت‌ها از جمع آوری IP و کوکی‌ها استفاده می‌کنید، اما پروتکل، سرور و لایه‌های امنیتی لارامرس و روش‌های مناسب مدیریت داده‌ها، اطلاعات کاربران را محافظت و از دسترسی‌های غیر قانونی جلوگیری می‌کند.</p>
                    <p>لارامرس در حفظ حریم شخص شما و نگهداری از اطلاعات شخصی‌تان تمام تلاش خود را خواهد کرد تا شما با اطمینان خرید کنید.</p>
                    <p>در صورت وجود هرگونه سوال لطفا با اطلاعات تماس زیر ارتباط برقرار کنید.</p>
                </div>


                <strong class="question">دفتر مرکزی:</strong>
                <p class="number" hct-content="center_office_phone_number" hct-content-type="text" hct-title='تلفن دفتر مرکزی'>۰۲۱-۰۰۰۰۰۰۰۰</p>
                <strong class="question">مرکز امور مشتریان:</strong>
                <p class="number" hct-content="customers_office_phone_number" hct-content-type="text" hct-title='تلفن مرکز امور مشتریان'>۰۲۱-۰۰۰۰۰</p>
                <strong class="question">زمان پاسخگویی:</strong>
                <p hct-content="opening_time" hct-content-type="text" hct-title='زمان پاسخگویی:'>
                    شنبه تا چهارشنبه ۸:۳۰ تا ۲۲  <br>پنجشنبه ها۸:۳۰ تا ۱۸
                </p>
            </div>
        </div>
    </div>
@endsection
