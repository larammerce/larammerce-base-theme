@extends('_base')

@section('title')
@endsection

@section('meta_tags')
    <link rel="canonical" href="{{ $web_page->getFrontUrl() }}"/>

    <meta name="description" content="{{ $web_page->getSeoDescription() }}">
    <meta name="keywords" content="{{ $web_page->getSeoKeywords() }}">
    <meta name="category" content="">
    <meta itemprop="name" content="{{ $web_page->getSeoTitle() }} - ابزارمبل مهدی(خواجه لو)">
    <meta itemprop="description" content="{{ $web_page->getSeoDescription() }}">

    <meta itemprop="image" content="/HCMS-assets/img/logo.svg">
    <meta property="og:url" content="{{ $web_page->getFrontUrl() }}">
    <meta property="og:title" content="{{ $web_page->getSeoTitle() }} - ابزارمبل مهدی(خواجه لو)">
    <meta property="og:image" content="/HCMS-assets/img/logo.svg">
    <meta property="og:description" content="{{ $web_page->getSeoDescription() }}">
    <meta property="og:type" content="website">
@endsection

@section('header_class')
    home
@endsection

@section('main_content')
    <script>window.currentPage = "index"</script>
    <br>
    <br>
    <section class="container-fluid main-page-top">
        <div class="row">
            <div class="col-lg-3 col-md-3 main-page-banners">
                <div class="main-page-banner-big ratio-box" data-ratio="5:4">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" hct-gallery="discount_slider" hct-title="اسلایدر محصولات تخفیف‌دار"
                             hct-has-mobile hct-max-entry="10">
                            <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs hidden-xxs" hct-gallery-fields>
                                <li hct-gallery-field="main_title" hct-title="عنوان"></li>
                                <li hct-gallery-field="link_addr" hct-title="آدرس لینک"></li>
                            </ul>

                            <div class="swiper-slide" hct-gallery-item>
                                <img hct-attr-src="{%- prop:image_path %}"
                                     alt="{%- ex-prop:main_title %}" class="img-fluid"/>
                                <a href="#" hct-attr-href="{%- ex-prop:link_addr %}" class="absolute-link"
                                   title="{%- ex-prop:main_title %}" id="discount_slider"></a>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="main-page-banner-small">
                    <img alt="ابزارمبل مهدی(خواجه لو)" class="img-fluid" hct-content="banner_slider" hct-content-type="image"
                         hct-title='بنر کنار اسلایدر'/>
                    <a href="" class="absolute-link" id="banner_slider"
                       hct-content="banner_link_slider" hct-content-type="link" hct-title='لینک بنر کنار اسلایدر'>
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="main-page-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" hct-gallery="first_page_slider" hct-has-mobile
                             hct-title="اسلایدر صفحه اول" hct-max-entry="5">
                            <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs hidden-xxs" hct-gallery-fields>
                                <li hct-gallery-field="main_title" hct-title="عنوان"></li>
                                <li hct-gallery-field="link_addr" hct-title="آدرس لینک"></li>
                            </ul>

                            <div class="swiper-slide" hct-gallery-item>
                                <img hct-attr-src="{%- prop:image_path %}"
                                     alt="{%- ex-prop:main_title %}" class="img-fluid"/>
                                <a href="#" hct-attr-href="{%- ex-prop:link_addr %}" class="absolute-link"
                                   title="{%- ex-prop:main_title %}" id="first_page_slider"></a>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php $product_roots_list = get_products_root_list_with_type(3); // 3 product type
    ?>
    <section class="container-fluid main-product-categories">
        @if($product_roots_list != null)
            <div class="main-product-categories-tab">
                <div class="nav nav-pills categoriesTabNav" id="categoriesTabNav1"
                     role="tablist" aria-orientation="horizontal">
                        <?php $first_counter = 1; ?>
                    @foreach($product_roots_list as $key=>$product_category)
                        @if(count(get_important_product_leaves($product_category, 8)) > 0 )
                            @if($product_category -> id != 789)
                                <a class="nav-link @if($first_counter == 1) active @endif"
                                   id="enName{{$first_counter}}-tab"
                                   data-toggle="pill" href="#enName{{$first_counter}}"
                                   @if($first_counter > 1) role="tab" @endif
                                   aria-selected="@if($first_counter > 1) false @else true @endif">
                                    @if($key==0)

                                    @elseif($key==1)

                                    @elseif($key==2)

                                    @elseif($key==3)

                                    @elseif($key==4)

                                    @else

                                    @endif
                                    <h2>{{$product_category->title}}</h2>
                                </a>
                                    <?php $first_counter++; ?>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="tab-content categoriesTab" id="categoriesTab1">
                        <?php $first_sub_counter = 1; ?>
                    @foreach($product_roots_list as $product_category)
                        @if($product_category -> id != 789)
                            @if(count(get_important_product_leaves($product_category, 8)) > 0 )
                                @if($product_category != null)
                                    <div class="tab-pane fade @if($first_sub_counter == 1) show active @endif"
                                         id="enName{{$first_sub_counter}}" role="tabpanel"
                                         aria-labelledby="enName{{$first_sub_counter}}-tab">
                                        <div class="row">
                                            @foreach(get_important_product_leaves($product_category, 8) as $product)
                                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                    @include("_product-box", ["item" => $product])
                                                </div>
                                            @endforeach
                                        </div>
                                        <a href="{{$product_category->getFrontUrl()}}"
                                           title="مشاهده محصولات بیشتر این دسته"
                                           class="btn btn-more">+ مشاهده محصولات بیشتر این دسته</a>
                                    </div>
                                @endif
                                    <?php $first_sub_counter++; ?>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <div class="container-fluid banners-boxed">
        <div class="row">
            <div class="col col-lg-6 banner-full">
                <img alt="بنر اول" class="img-fluid" hct-content="banner_1" hct-content-type="image"
                     src="/HCMS-assets/img/banner5.jpg" hct-title='بنر اول'/>
                <a href="" title="" hct-content="banner_link_1" hct-content-type="link" hct-title='لینک بنر اول'
                   class="absolute-link" id="banner_1"></a>
            </div>
            <div class="col col-lg-6 banner-full">
                <img alt="بنر دوم" class="img-fluid" hct-content="banner_2" hct-content-type="image"
                     src="/HCMS-assets/img/banner6.jpg" hct-title='بنر دوم'/>
                <a href="" title="" hct-content="banner_link_2" hct-content-type="link" hct-title='لینک بنر دوم'
                   class="absolute-link" id="banner_2"></a>
            </div>
            <div class="col col-lg-6 banner-full">
                <img alt="بنر سوم" class="img-fluid" hct-content="banner_3" hct-content-type="image"
                     src="/HCMS-assets/img/banner5.jpg" hct-title='بنر سوم'/>
                <a href="" title="" hct-content="banner_link_3" hct-content-type="link" hct-title='لینک بنر سوم'
                   class="absolute-link" id="banner_3"></a>
            </div>
            <div class="col col-lg-6 banner-full">
                <img alt="بنر چهارم" class="img-fluid" hct-content="banner_4" hct-content-type="image"
                     src="/HCMS-assets/img/banner6.jpg" hct-title='بنر چهارم'/>
                <a href="" title="" hct-content="banner_link_4" hct-content-type="link" hct-title='لینک بنر چهارم'
                   class="absolute-link" id="banner_4"></a>
            </div>
        </div>
    </div>

    <section class="container-fluid">
        <div class="main-top-selling">
            <div class="title-wrapper">
                <div class="title">پرفروش‌ترین محصولات</div>
                <div class="navigator">
                    <div class="swiper-button-next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                </div>
            </div>
            <div class="main-top-selling-content">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach(custom_query_products("home_page_last_views") as $product)
                            <div class="swiper-slide">
                                @include("_product-box", ["item" => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid banners-boxed">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 banner-full">
                <img alt="بنر یک از چهار" class="img-fluid" hct-content="banner_1_4" hct-content-type="image"
                     src="/HCMS-assets/img/banner3.jpg" hct-title='بنر یک از چهار'/>
                <a href="" title="" hct-content="banner_link_1_4" hct-content-type="link"
                   hct-title='لینک بنر یک از چهار' class="absolute-link" id="banner_1_4"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 banner-full">
                <img alt="بنر دو از چهار" class="img-fluid" hct-content="banner_2_4" hct-content-type="image"
                     src="/HCMS-assets/img/banner3.jpg" hct-title='بنر دو از چهار'/>
                <a href="" title="" hct-content="banner_link_2_4" hct-content-type="link"
                   hct-title='لینک بنر دو از چهار' class="absolute-link" id="banner_2_4"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 banner-full">
                <img alt="بنر سه از چهار" class="img-fluid" hct-content="banner_3_4" hct-content-type="image"
                     src="/HCMS-assets/img/banner3.jpg" hct-title='بنر سه از چهار'/>
                <a href="" title="" hct-content="banner_link_3_4" hct-content-type="link"
                   hct-title='لینک بنر سه از چهار' class="absolute-link" id="banner_3_4"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 banner-full">
                <img alt="بنر چهار از چهار" class="img-fluid" hct-content="banner_4_4" hct-content-type="image"
                     src="/HCMS-assets/img/banner3.jpg" hct-title='بنر چهار از چهار'/>
                <a href="" title="" hct-content="banner_link_4_4" hct-content-type="link"
                   hct-title='لینک بنر چهار از چهار' class="absolute-link" id="banner_4_4"></a>
            </div>
        </div>
    </div>

    <section class="container-fluid">
        <div class="main-popular-products">
            <div class="title-wrapper">
                <div class="title">پربازدید‌ترین محصولات</div>
                <div class="navigator">
                    <div class="swiper-button-next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                </div>
            </div>
            <div class="main-top-selling-content">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach(custom_query_products("home_page_popular_products") as $product)
                            <div class="swiper-slide">
                                @include("_product-box", ["item" => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-brands">
        <div class="container-fluid">
            <div class="title-wrapper">
                <div class="title">برندها</div>
            </div>
            <div class="navigator">
                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
            </div>
            <div class="swiper-container" id="brands_slider">
                <div class="swiper-wrapper" hct-gallery="brands_slider" hct-title="اسلایدر برندها" hct-max-entry="100">
                    <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs hidden-xxs" hct-gallery-fields>
                        <li hct-gallery-field="main_title" hct-title="عنوان"></li>
                        <li hct-gallery-field="link_addr" hct-title="آدرس لینک"></li>
                    </ul>

                    <div class="swiper-slide" hct-gallery-item>
                        <img hct-attr-src="{%- prop:image_path %}"
                             alt="{%- ex-prop:main_title %}" class="img-fluid"/>
                        <a href="#" hct-attr-href="{%- ex-prop:link_addr %}" class="absolute-link"
                           title="{%- ex-prop:main_title %}"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid banners-boxed-row">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 banner-full banner-habtoor">
                <img alt="بنر طراحی صنعتی حبتور" class="img-fluid" hct-content="banner_habtoor" hct-content-type="image"
                     src="/HCMS-assets/img/banner3.jpg" hct-title='بنر طراحی صنعتی حبتور'/>
                <a href="" title="" hct-content="banner_link_habtoor" hct-content-type="link"
                   hct-title='لینک بنر طراحی صنعتی حبتور' class="absolute-link" id="banner_habtoor"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 banner-full">
                <img alt="بنر تامین کننده" class="img-fluid" hct-content="banner_supplier" hct-content-type="image"
                     src="/HCMS-assets/img/banner3.jpg" hct-title='بنر تامین کننده'/>
                <a href="" title="" hct-content="banner_link_supplier" hct-content-type="link"
                   hct-title='لینک بنر تامین کننده' class="absolute-link" id="banner_supplier"></a>
            </div>
        </div>
    </div>

    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                <div class="banner-full banner-supplier">
                    <video autoplay muted poster="../HCMS-assets/video/poster3.jpg" loop
                           hct-content="video_1" hct-content-type="video" hct-title='کاربرد ابزارها'>
                        <source data-src="https://abzarmoblmahdi.com/uploads/not_categorized/1605941622.1537rZvOnYsLDS/avc_Sequence-01.mp4"
                                type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <a href="" title="" hct-content="usage_link" hct-content-type="link"
                       hct-title='لینک ویدیو کاربرد ابزار'
                       class="absolute-link" id="video_1"></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                <div class="main-articles">
                    <div class="title-wrapper">
                        <div class="title">آخرین مطالب مجله</div>
                    </div>
                    <div class="latest-articles">
                        @foreach(get_latest_blog('blog', 1) as $blog)
                            <div class="article-item">
                                <div class="pic">
                                    <a href="{{$blog->getFrontUrl()}}" title="{{ $blog->title }}">
                                        <img data-src="{{ImageService::getImage($blog, 'main')}}" src=""
                                             alt="{{ $blog->title }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="details">
                                    <a href="{{$blog->getFrontUrl()}}" title="{{ $blog->title }}">
                                        <h5 class="article-title">{{ $blog->title }}</h5>
                                    </a>
                                    <div class="row">
                                        <div class="col article-category hidden-md">
                                            {{$blog->directory->title}}
                                        </div>
                                        <div class="col article-date">
                                            {{ \App\Utils\Common\TimeService::getCustomFormatFrom($blog->created_at, "j F y") }}
                                        </div>
                                    </div>
                                    <div class="desc hidden-lg">
                                        {{ strip_tags($blog->short_content) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="https://abzarmoblmahdi.com/mag/" class="btn btn-more">مشاهده همه مطالب</a>
                </div>
            </div>
        </div>
    </section>
@endsection
