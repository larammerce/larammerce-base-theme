@extends('_base_app')

@section('title')
    {{ $web_page->getSeoTitle() }} -
@endsection

@section('main_content')
    <script>window.currentPage = "about"</script>

    <div class="about">

        <section class="about-top-video">
            <video autoplay muted poster="/HCMS-assets/video/poster3.jpg" loop
                   hct-content="video_1" hct-content-type="video" hct-title='ویدئو درباره ما'>
                <source src="/HCMS-assets/video/kitline3.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <button type="button" class="btn sound-btn">
                <i class="fas fa-volume-off"></i>
            </button>
        </section>

        <section class="container about-content">
            <div class="row about-row">
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <img src="/HCMS-assets/img/logo-small.png" alt="kitline logo" class="logo"/>
                    <div class="motto" hct-content="motto" hct-content-type="text" hct-title='شعار'>
                        بشر به انگیزه در زندگی و کار پیش خواهد رفت...
                    </div>
                    <div class="desc" hct-content="description_1" hct-content-type="rich_text" hct-title='انگیزه اول'>
                        انگیزه‌ی پیدایش سایت کیت‌لاین فراهم آوردن آشپزخانه‌ی مجللی است که در دسترس است و هرچه بخواهید
                        دارد. می‌توانید ابزاری را بردارید که سرآشپز گوردن رمضی در دست دارد و چاقوی مخصوص فیله کردن را در
                        گوشت می‌سرانید. از نرمی و ثبات حرکت لذت ببرید.
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
            </div>
            <div class="row about-row">
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <div class="desc" hct-content="description_2" hct-content-type="rich_text" hct-title='انگیزه دوم'>
                        انگیزه کیت‌لاین آن است که چاقو اگر می‌خواهید بخرید. ساعت‌ها پیاده در خیابان‌های دودگرفته و مزدحم
                        پایین شهر و میانه‌ی شهر تهران سرنگردانید و سرانجام گیر چاقویی بیفتید که نه در دست سرآشپزان است و
                        نه اساسا ضمانتی برای اصالتش است.
                    </div>
                </div>
            </div>
            <div class="row about-row">
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <div class="desc" hct-content="description_3" hct-content-type="rich_text" hct-title='انگیزه سوم'>
                        انگیزه کیت‌لاین بخشیدن آسایش خاطر به شماست که قیمت بهترین ابزار کار آشپزی و رستوران داری و هتل
                        داریش منصفانه است ...
                        بخشیدن آسایتش از آن که اگر رستوران دارید، در هر کجای این خاک که باشید ... حال در دورترین نقطه
                        سیستان یا گیلان و یا کردستان،
                        با گردشی راحت در سایت کیت‌لاین هرآنچه بخواهید برمیدارید.
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
            </div>
            <div class="row about-row">
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <div class="desc" hct-content="description_4" hct-content-type="rich_text" hct-title='انگیزه چهارم'>
                        انگیزه کیت‌لاین آن است که اگر در سایت گشتید و وسیله‌ای دیدید که نمیشناختید، یا نمیدانستید که
                        کاربرد درستش چیست، توضیح مختصر و مفیدی راجع به آن در اختیار شما قرار دهد.
                    </div>
                </div>
            </div>
        </section>

        <section class="about-bold-desc">
            <div class="container">
                <div class="desc-wrapper">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-3 col-xs-12">
                            <div class="about-bold-pic">
                                <img src="/HCMS-assets/img/kitchentech.svg" alt="kitchentech">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
                            <div class="desc" hct-content="kitchentech_desc" hct-content-type="rich_text"
                                 hct-title='متن تک آشپزخانه'>
                                سایت کیت‌لاین از دل شرکت رسام تک آشپزخانه Kitchentech با سابقه طولانی در تجهیز و برپایی
                                از پایه تا پایان رستوران‌ها پدید آمده است. ما در این سایت از دانش فنی روز در تامین و
                                معرفی ابزار تخصصی و کارا در صنعت غذا بهره گرفته‌ایم تا در کوتاه‌ترین زمان ممکن نیاز
                                تجهیز رستوران و آشپزخانه‌ها را در کاملترین مجموعه تخصصی آنلاین به دست مدیران و صاحبان
                                رستوران‌ها و هتل‌ها برسانیم.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-bottom-video">
            <div class="container">
                <video poster="/HCMS-assets/video/poster2.png"
                       hct-content="video_2" hct-content-type="video" hct-title='ویدئو درباره ما(پایین) '
                       aria-controls="true" controls>
                    <source src="/HCMS-assets/video/Kitline2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </section>

        <section class="social-posts container-fluid">
            <div class="title-wrapper">
                <div class="title">شبکه‌های اجتماعی</div>
            </div>
            <div class="row"
                 hct-gallery="social_posts" hct-title="پست‌های شبکه‌های اجتماعی" hct-max-entry="6">
                <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs hidden-xxs" hct-gallery-fields>
                    <li hct-gallery-field="main_title" hct-title="عنوان اصلی"></li>
                    <li hct-gallery-field="link_addr" hct-title="آدرس لینک"></li>
                </ul>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-6" hct-gallery-item>
                    <div class="social-post-item">
                        <a href="" title="{%- ex-prop:main_title %}" hct-attr-href="{%- ex-prop:link_addr %}"
                           target="_blank">
                            <img hct-attr-src="{%- prop:image_path %}" class="img-fluid ratio-box" data-ratio="1:1"
                                 alt="{%- ex-prop:main_title %}">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
