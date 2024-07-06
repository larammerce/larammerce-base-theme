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

@section('header_class') home @endsection

@section('main_content')
    <script>window.currentPage = "landing-discounts"</script>

    <div class="container-fluid landing-discount">
        <div class="swiper-container discount-slider">
            <div class="swiper-wrapper" hct-gallery="landing_discount_slider"
                 hct-title="اسلایدر لندینگ محصولات تخفیف‌دار"
                 hct-has-mobile hct-max-entry="10">
                <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs hidden-xxs" hct-gallery-fields>
                    <li hct-gallery-field="main_title" hct-title="عنوان"></li>
                </ul>

                <div class="swiper-slide" hct-gallery-item>
                    <img hct-attr-src="{%- prop:image_path %}"
                         alt="{%- ex-prop:main_title %}" class="img-fluid"/>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="discount-categories">
            <a class="btn cat-item" href="*" title="همه">همه</a>
            <?php $product_roots_list = get_products_root_list_with_type(3); // 3 product type
            ?>
            @foreach($product_roots_list as $key=>$product_category)
                @if(count($product_category->leafProducts()->whereIsActive(true)->mainModels()->has_discount()->get())> 0)
                    <a class="btn cat-item" href=".parent{{$product_category->id}}"
                       title="{{$product_category->title}}">{{$product_category->title}}</a>
                @endif
            @endforeach
        </div>

        <div class="discount-products">
            <div class="row">
                @foreach(custom_query_products("all_discount_products") as $product)
                    <div class="col-lg-25 col-md-3 col-sm-4 col-xs-12 parent{{get_root_directory_per_directory($product->directory)->id}}">
                        @include("_product-box", ["item" => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
