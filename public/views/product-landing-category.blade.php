@extends('_base')

@section('title')
    {{ $directory->title }}
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
    <script>window.currentPage = "product-landing-category"</script>

    <section class="container-fluid main-page-top">
        <div class="main-page-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img alt="تصویر اسلایدر اول" class="img-fluid" hct-content="slider_1" hct-content-type="image"
                             src="" hct-title='تصویر اسلایدر اول'/>
                        <a href="" title="" hct-content="slider_link_1" hct-content-type="link"
                           hct-title='لینک اسلایدر اول' class="absolute-link" id="slider_1"></a>
                    </div>
                    <div class="swiper-slide">
                        <img alt="تصویر اسلایدر دوم" class="img-fluid" hct-content="slider_2" hct-content-type="image"
                             src="" hct-title='تصویر اسلایدر دوم'/>
                        <a href="" title="" hct-content="slider_link_2" hct-content-type="link"
                           hct-title='لینک اسلایدر دوم' class="absolute-link" id="slider_2"></a>
                    </div>
                    <div class="swiper-slide">
                        <img alt="تصویر اسلایدر سوم" class="img-fluid" hct-content="slider_3" hct-content-type="image"
                             src="" hct-title='تصویر اسلایدر سوم'/>
                        <a href="" title="" hct-content="slider_link_3" hct-content-type="link"
                           hct-title='لینک اسلایدر سوم' class="absolute-link" id="slider_3"></a>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    @if(count($directory->directories) > 0)
        <section class="container-fluid landing-products">
            <div class="title-center-wrapper">
                <div class="title">آخرین محصولات</div>
            </div>
            <div class="row">
                @foreach(get_directory_product_leaves($directory, 6,true) as $product)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        @include("_product-box", ["item" => $product])
                    </div>
                @endforeach
            </div>
            {{--<a href="{{$directory->getFrontUrl()}}" class="btn btn-more" title="مشاهده محصولات بیشتر">+ مشاهده محصولات
                بیشتر</a>--}}
        </section>
    @endif

    <section class="container-fluid landing-industries">
        <div class="title-center-wrapper">
            <div class="title" hct-content="title_industries" hct-content-type="text"
                 hct-title='عنوان خرید براساس کسب‌وکار'>خرید براساس کسب‌وکار
            </div>
        </div>
        <div class="industries-row">
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار اول" class="img-fluid" hct-content="industries_1" hct-content-type="image"
                         src="" hct-title='آیکون کسب‌وکار اول'/>
                </div>
                <div class="item-title" hct-content="industries_title_1" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار اول'></div>
                <a href="" title="" hct-content="industries_link_1" hct-content-type="link"
                   hct-title='لینک کسب‌وکار اول' class="absolute-link" id="industries_1"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار دوم" class="img-fluid" hct-content="industries_2" hct-content-type="image"
                         src="" hct-title='آیکون کسب‌وکار دوم'/>
                </div>
                <div class="item-title" hct-content="industries_title_2" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار دوم'></div>
                <a href="" title="" hct-content="industries_link_2" hct-content-type="link"
                   hct-title='لینک کسب‌وکار دوم' class="absolute-link" id="industries_2"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار سوم" class="img-fluid" hct-content="industries_3" hct-content-type="image"
                         src="" hct-title='آیکون کسب‌وکار سوم'/>
                </div>
                <div class="item-title" hct-content="industries_title_3" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار سوم'></div>
                <a href="" title="" hct-content="industries_link_3" hct-content-type="link"
                   hct-title='لینک کسب‌وکار سوم' class="absolute-link" id="industries_3"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار چهارم" class="img-fluid" hct-content="industries_4"
                         hct-content-type="image" src="" hct-title='آیکون کسب‌وکار چهارم'/>
                </div>
                <div class="item-title" hct-content="industries_title_4" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار چهارم'></div>
                <a href="" title="" hct-content="industries_link_4" hct-content-type="link"
                   hct-title='لینک کسب‌وکار چهارم' class="absolute-link" id="industries_4"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار پنجم" class="img-fluid" hct-content="industries_5" hct-content-type="image"
                         src="" hct-title='آیکون کسب‌وکار پنجم'/>
                </div>
                <div class="item-title" hct-content="industries_title_5" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار پنجم'></div>
                <a href="" title="" hct-content="industries_link_5" hct-content-type="link"
                   hct-title='لینک کسب‌وکار پنجم' class="absolute-link" id="industries_5"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار ششم" class="img-fluid" hct-content="industries_6" hct-content-type="image"
                         src="" hct-title='آیکون کسب‌وکار ششم'/>
                </div>
                <div class="item-title" hct-content="industries_title_6" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار ششم'></div>
                <a href="" title="" hct-content="industries_link_6" hct-content-type="link"
                   hct-title='لینک کسب‌وکار ششم' class="absolute-link" id="industries_6"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار هفتم" class="img-fluid" hct-content="industries_7" hct-content-type="image"
                         src="" hct-title='آیکون کسب‌وکار هفتم'/>
                </div>
                <div class="item-title" hct-content="industries_title_7" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار هفتم'></div>
                <a href="" title="" hct-content="industries_link_7" hct-content-type="link"
                   hct-title='لینک کسب‌وکار هفتم' class="absolute-link" id="industries_7"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="آیکون کسب‌وکار هشتم" class="img-fluid" hct-content="industries_8" hct-content-type="image"
                         src="" hct-title='آیکون کسب‌وکار هشتم'/>
                </div>
                <div class="item-title" hct-content="industries_title_8" hct-content-type="text"
                     hct-title='عنوان کسب‌وکار هشتم'></div>
                <a href="" title="" hct-content="industries_link_8" hct-content-type="link"
                   hct-title='لینک کسب‌وکار هشتم' class="absolute-link" id="industries_8"></a>
            </div>
        </div>
    </section>

    <div class="container-fluid banners-boxed">
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-xs-6 banner-full">
                <img alt="بنر اول" class="img-fluid" hct-content="banner_1" hct-content-type="image" src=""
                     hct-title='بنر اول'/>
                <a href="" title="" hct-content="banner_link_1" hct-content-type="link" hct-title='لینک بنر اول'
                   class="absolute-link" id="banner_1"></a>
            </div>
            <div class="col col-lg-6 col-md-6 col-xs-6 banner-full">
                <img alt="بنر دوم" class="img-fluid" hct-content="banner_2" hct-content-type="image" src=""
                     hct-title='بنر دوم'/>
                <a href="" title="" hct-content="banner_link_2" hct-content-type="link" hct-title='لینک بنر دوم'
                   class="absolute-link" id="banner_2"></a>
            </div>
            <div class="col col-lg-6 col-md-6 col-xs-6 banner-full">
                <img alt="بنر سوم" class="img-fluid" hct-content="banner_3" hct-content-type="image" src=""
                     hct-title='بنر سوم'/>
                <a href="" title="" hct-content="banner_link_3" hct-content-type="link" hct-title='لینک بنر سوم'
                   class="absolute-link" id="banner_3"></a>
            </div>
            <div class="col col-lg-6 col-md-6 col-xs-6 banner-full">
                <img alt="بنر چهارم" class="img-fluid" hct-content="banner_4" hct-content-type="image" src=""
                     hct-title='بنر چهارم'/>
                <a href="" title="" hct-content="banner_link_4" hct-content-type="link" hct-title='لینک بنر چهارم'
                   class="absolute-link" id="banner_4"></a>
            </div>
        </div>
    </div>

    <section class="container-fluid landing-custom-categories">
        <div class="title-center-wrapper">
            <div class="title" hct-content="title_categories" hct-content-type="text"
                 hct-title='عنوان خرید براساس دسته‌بندی'>خرید براساس دسته‌بندی
            </div>
        </div>
        <div class="industries-row">
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر دسته‌بندی اول" class="img-fluid" hct-content="categories_1" hct-content-type="image"
                         src="" hct-title='تصویر دسته‌بندی اول'/>
                </div>
                <div class="item-title" hct-content="categories_title_1" hct-content-type="text"
                     hct-title='عنوان دسته‌بندی اول'></div>
                <a href="" title="" hct-content="categories_link_1" hct-content-type="link"
                   hct-title='لینک دسته‌بندی اول' class="absolute-link" id="categories_1"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر دسته‌بندی دوم" class="img-fluid" hct-content="categories_2" hct-content-type="image"
                         src="" hct-title='تصویر دسته‌بندی دوم'/>
                </div>
                <div class="item-title" hct-content="categories_title_2" hct-content-type="text"
                     hct-title='عنوان دسته‌بندی دوم'></div>
                <a href="" title="" hct-content="categories_link_2" hct-content-type="link"
                   hct-title='لینک دسته‌بندی دوم' class="absolute-link" id="categories_2"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر دسته‌بندی سوم" class="img-fluid" hct-content="categories_3" hct-content-type="image"
                         src="" hct-title='تصویر دسته‌بندی سوم'/>
                </div>
                <div class="item-title" hct-content="categories_title_3" hct-content-type="text"
                     hct-title='عنوان دسته‌بندی سوم'></div>
                <a href="" title="" hct-content="categories_link_3" hct-content-type="link"
                   hct-title='لینک دسته‌بندی سوم' class="absolute-link" id="categories_3"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر دسته‌بندی چهارم" class="img-fluid" hct-content="categories_4"
                         hct-content-type="image" src="" hct-title='تصویر دسته‌بندی چهارم'/>
                </div>
                <div class="item-title" hct-content="categories_title_4" hct-content-type="text"
                     hct-title='عنوان دسته‌بندی چهارم'></div>
                <a href="" title="" hct-content="categories_link_4" hct-content-type="link"
                   hct-title='لینک دسته‌بندی چهارم' class="absolute-link" id="categories_4"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر دسته‌بندی پنجم" class="img-fluid" hct-content="categories_5"
                         hct-content-type="image" src="" hct-title='تصویر دسته‌بندی پنجم'/>
                </div>
                <div class="item-title" hct-content="categories_title_5" hct-content-type="text"
                     hct-title='عنوان دسته‌بندی پنجم'></div>
                <a href="" title="" hct-content="categories_link_5" hct-content-type="link"
                   hct-title='لینک دسته‌بندی پنجم' class="absolute-link" id="categories_5"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر دسته‌بندی ششم" class="img-fluid" hct-content="categories_6" hct-content-type="image"
                         src="" hct-title='تصویر دسته‌بندی ششم'/>
                </div>
                <div class="item-title" hct-content="categories_title_6" hct-content-type="text"
                     hct-title='عنوان دسته‌بندی ششم'></div>
                <a href="" title="" hct-content="categories_link_6" hct-content-type="link"
                   hct-title='لینک دسته‌بندی ششم' class="absolute-link" id="categories_6"></a>
            </div>
        </div>
    </section>

    <section class="container-fluid banners-boxed-row">
        <div class="row">
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر یک از هشت" class="img-fluid" hct-content="banner_1_8" hct-content-type="image" src=""
                     hct-title='بنر یک از هشت'/>
                <a href="" title="" hct-content="banner_link_1_8" hct-content-type="link" hct-title='لینک بنر یک از هشت'
                   class="absolute-link" id="banner_1_8"></a>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر دو از هشت" class="img-fluid" hct-content="banner_2_8" hct-content-type="image" src=""
                     hct-title='بنر دو از هشت'/>
                <a href="" title="" hct-content="banner_link_2_8" hct-content-type="link" hct-title='لینک بنر دو از هشت'
                   class="absolute-link" id="banner_2_8"></a>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر سه از هشت" class="img-fluid" hct-content="banner_3_8" hct-content-type="image" src=""
                     hct-title='بنر سه از هشت'/>
                <a href="" title="" hct-content="banner_link_3_8" hct-content-type="link" hct-title='لینک بنر سه از هشت'
                   class="absolute-link" id="banner_3_8"></a>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر چهار از هشت" class="img-fluid" hct-content="banner_4_8" hct-content-type="image" src=""
                     hct-title='بنر چهار از هشت'/>
                <a href="" title="" hct-content="banner_link_4_8" hct-content-type="link"
                   hct-title='لینک بنر چهار از هشت' class="absolute-link" id="banner_4_8"></a>
            </div>
        </div>
    </section>

    <section class="container-fluid landing-brands">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="title-wrapper">
                    <div class="title" hct-content="title_one" hct-content-type="text"
                         hct-title='نام برند اول (برای نمایش محصولات برند باید یک جستار سفارشی با شناساگر landing_brand_one_id بسازید. البته که در شناساگر آی دی صفحه وب را جایگزین کنید.)'>
                        نام برند اول
                    </div>
                </div>
                <div class="row">
                    @foreach(custom_query_products("landing_brand_one_".$web_page->id) as $product)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            @include("_product-box", ["item" => $product])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="title-wrapper">
                    <div class="title" hct-content="title_two" hct-content-type="text"
                         hct-title='نام برند دوم (برای نمایش محصولات برند باید یک جستار سفارشی با شناساگر landing_brand_two_id بسازید. البته که در شناساگر آی دی صفحه وب را جایگزین کنید.)'>
                        نام برند دوم
                    </div>
                </div>
                <div class="row">
                    @foreach(custom_query_products("landing_brand_two_".$web_page->id) as $product)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            @include("_product-box", ["item" => $product])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="title-wrapper">
                    <div class="title" hct-content="title_three" hct-content-type="text"
                         hct-title='نام برند سوم (برای نمایش محصولات برند باید یک جستار سفارشی با شناساگر landing_brand_three_id بسازید. البته که در شناساگر آی دی صفحه وب را جایگزین کنید.)'>
                        نام برند سوم
                    </div>
                </div>
                <div class="row">
                    @foreach(custom_query_products("landing_brand_three_".$web_page->id) as $product)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            @include("_product-box", ["item" => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid banners-boxed-row">
        <div class="row">
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر پنج از هشت" class="img-fluid" hct-content="banner_5_8"
                     hct-content-type="image"
                     src="" hct-title='بنر پنج از هشت'/>
                <a href="" title="" hct-content="banner_link_5_8" hct-content-type="link"
                   hct-title='لینک بنر پنج از هشت' class="absolute-link" id="banner_5_8"></a>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر شش از هشت" class="img-fluid" hct-content="banner_6_8"
                     hct-content-type="image"
                     src="" hct-title='بنر شش از هشت'/>
                <a href="" title="" hct-content="banner_link_6_8" hct-content-type="link"
                   hct-title='لینک بنر شش از هشت' class="absolute-link" id="banner_6_8"></a>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر هفت از هشت" class="img-fluid" hct-content="banner_7_8"
                     hct-content-type="image"
                     src="" hct-title='بنر هفت از هشت'/>
                <a href="" title="" hct-content="banner_link_7_8" hct-content-type="link"
                   hct-title='لینک بنر هفت از هشت' class="absolute-link" id="banner_7_8"></a>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-6 banner-full">
                <img alt="بنر هشت از هشت" class="img-fluid" hct-content="banner_8_8"
                     hct-content-type="image"
                     src="" hct-title='بنر هشت از هشت'/>
                <a href="" title="" hct-content="banner_link_8_8" hct-content-type="link"
                   hct-title='لینک بنر هشت از هشت' class="absolute-link" id="banner_8_8"></a>
            </div>
        </div>
    </section>

    <section class="container-fluid landing-custom-categories">
        <div class="title-center-wrapper">
            <div class="title">خرید براساس قیمت</div>
        </div>
        <div class="industries-row">
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر قیمت اول" class="img-fluid" hct-content="price_1" hct-content-type="image" src=""
                         hct-title='تصویر قیمت اول'/>
                </div>
                <a href="" title="" hct-content="price_link_1" hct-content-type="link" hct-title='لینک قیمت اول'
                   class="absolute-link" id="price_1"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر قیمت دوم" class="img-fluid" hct-content="price_2" hct-content-type="image" src=""
                         hct-title='تصویر قیمت دوم'/>
                </div>
                <a href="" title="" hct-content="price_link_2" hct-content-type="link" hct-title='لینک قیمت دوم'
                   class="absolute-link" id="price_2"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر قیمت سوم" class="img-fluid" hct-content="price_3" hct-content-type="image" src=""
                         hct-title='تصویر قیمت سوم'/>
                </div>
                <a href="" title="" hct-content="price_link_3" hct-content-type="link" hct-title='لینک قیمت سوم'
                   class="absolute-link" id="price_3"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر قیمت چهارم" class="img-fluid" hct-content="price_4" hct-content-type="image" src=""
                         hct-title='تصویر قیمت چهارم'/>
                </div>
                <a href="" title="" hct-content="price_link_4" hct-content-type="link" hct-title='لینک قیمت چهارم'
                   class="absolute-link" id="price_4"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر قیمت پنجم" class="img-fluid" hct-content="price_5" hct-content-type="image" src=""
                         hct-title='تصویر قیمت پنجم'/>
                </div>
                <a href="" title="" hct-content="price_link_5" hct-content-type="link" hct-title='لینک قیمت پنجم'
                   class="absolute-link" id="price_5"></a>
            </div>
            <div class="item">
                <div class="item-pic">
                    <img alt="تصویر قیمت ششم" class="img-fluid" hct-content="price_6" hct-content-type="image" src=""
                         hct-title='تصویر قیمت ششم'/>
                </div>
                <a href="" title="" hct-content="price_link_6" hct-content-type="link" hct-title='لینک قیمت ششم'
                   class="absolute-link" id="price_6"></a>
            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="main-articles landing-articles">
            <div class="title-wrapper">
                <div class="title">آخرین مطالب مجله</div>
            </div>
            <div class="latest-articles row">
                @foreach(get_latest_blog('blog', 4) as $blog)
                    <div class="article-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="pic ratio-box" data-ratio="3:2">
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
            {{--<a href="https://abzarmoblmahdi.com/mag/" class="btn btn-more">مشاهده همه مطالب</a>--}}
        </div>
    </section>

@endsection
