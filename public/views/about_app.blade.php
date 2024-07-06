@extends('_base_app')

@section('title')
    {{ $web_page->getSeoTitle() }} -
@endsection

@section('main_content')
    <script>window.currentPage = "about"</script>

    <div class="about">

        <section class="about-top-video">
            <video autoplay muted poster="/HCMS-assets/video/poster.jpg" loop
                   hct-content="video_1" hct-content-type="video" hct-title='ویدئو درباره ما'>
                <source src="/HCMS-assets/video/larammrce.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <button type="button" class="btn sound-btn">
                <i class="fas fa-volume-off"></i>
            </button>
        </section>

        <section class="container about-content">
            <div class="row about-row">
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <img src="../HCMS-assets/img/logo-small.png" alt="abzarmoblmahdi logo" class="logo"/>
                    <div class="motto" hct-content="motto" hct-content-type="text" hct-title='شعار'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                    </div>
                    <div class="desc" hct-content="description_1" hct-content-type="rich_text" hct-title='انگیزه اول'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
            </div>
            <div class="row about-row">
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <div class="desc" hct-content="description_2" hct-content-type="rich_text" hct-title='انگیزه دوم'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                    </div>
                </div>
            </div>
            <div class="row about-row">
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <div class="desc" hct-content="description_3" hct-content-type="rich_text" hct-title='انگیزه سوم'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
            </div>
            <div class="row about-row">
                <div class="col-lg-7 col-md-6 col-sm-4 col-xs-12 about-illustration"></div>
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 about-text">
                    <div class="desc" hct-content="description_4" hct-content-type="rich_text" hct-title='انگیزه چهارم'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
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
                                <img src="/HCMS-assets/img/logo2.svg" alt="abzarmoblmahdi">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
                            <div class="desc" hct-content="abzarmoblmahdi_desc" hct-content-type="rich_text"
                                 hct-title='متن تک ابزارمبل مهدی(خواجه لو)'>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
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
                    <source src="/HCMS-assets/video/abzarmoblmahdi.mp4" type="video/mp4">
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
