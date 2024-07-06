@extends('_base')

@section('title')
    {{ $directory->title }}
@endsection

@section('header_class') home @endsection

@section('meta_tags')
    @if(isset($directory))
        <link rel="canonical" href="{{ $directory->getFrontUrl() }}"/>
    @endif

    <meta name="description" content="{{ $web_page->getSeoDescription() }}">
    <meta name="keywords" content="{{ $web_page->getSeoKeywords() }}">
    <meta name="category" content="{{ $web_page->getSeoTitle() }}">
    <meta itemprop="name" content="{{ $web_page->getSeoTitle() }}">
    <meta itemprop="description" content="{{ $web_page->getSeoDescription() }}">
    <meta itemprop="image" content="/HCMS-assets/img/logo.svg">
    <meta property="og:url" content="{{ $web_page->getFrontUrl() }}">
    <meta property="og:title" content="{{ $web_page->getSeoTitle() }} - ابزارمبل مهدی(خواجه لو)">
    <meta property="og:image" content="/HCMS-assets/img/logo.svg">
    <meta property="og:description" content="{{ $web_page->getSeoDescription() }}">
    <meta property="og:type" content="website">
@endsection

@section('main_content')
    <script>window.currentPage = "product-landing"</script>

    <div class="container-fluid products-categories-landing">

        <section class="row">
            <div class="col-lg-3 hidden-md hidden-sm hidden-xs">
                <div class="subcategories-list-wrapper">
                    <div class="subcategories-list-pic"
                         style="background-image:url('{{ImageService::getImage($directory)}}');">
                        <h1 class="category-title">{{$directory->title}}</h1>
                    </div>
                    <ul class="subcategories-list">
                        @foreach($directory->directories as $subDirectory)
                            <li class="subcategories-list-item">
                                <a href="{{$subDirectory->getFrontUrl()}}" title="{{$subDirectory->title}}">
                                    <h2 class="text">{{$subDirectory->title}}</h2>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="categories-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" hct-gallery="categories_page_slider"
                             hct-has-mobile hct-unshared="true"
                             hct-title="اسلایدر دسته‌بندی‌ها" hct-max-entry="3">
                            <ul class="hidden" hct-gallery-fields>
                                <li hct-gallery-field="main_title" hct-title="عنوان"></li>
                                <li hct-gallery-field="link_addr" hct-title="آدرس لینک"></li>
                            </ul>

                            <div class="swiper-slide" hct-gallery-item>
                                <img hct-attr-src="{%- prop:image_path %}" alt="{%- ex-prop:main_title %}"
                                     class="img-fluid"/>
                                <a href="#" hct-attr-href="{%- ex-prop:link_addr %}" class="absolute-link" title="{%- ex-prop:main_title %}"></a>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>


        @foreach($directory->directories as $product_category)
            <section class="subcategories-latest-products row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="subcategories-pic"
                         style="background-image:url({{ImageService::getImage($product_category)}});">
                        <a href="{{$product_category->getFrontUrl()}}" class="absolute-link" title="دسته‌بندی"></a>
                    </div>

                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                    <div class="row">
                        @foreach(get_important_product_leaves($product_category, 4) as $product)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                @include("_product-box", ["item" => $product])
                            </div>
                        @endforeach
                    </div>
                    <a href="{{$product_category->getFrontUrl()}}" class="btn btn-more" title="مشاهده محصولات بیشتر این دسته">+ مشاهده محصولات بیشتر این دسته</a>
                </div>
            </section>
        @endforeach

        <section class="row">
            <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-xs-12 categories-description"
                 hct-content="description" hct-unshared="true"
                 hct-content-type="rich_text" hct-title='توضیحات'></div>
            <div class="col-xl-2 col-lg-3 hidden-md hidden-sm hidden-xs">
                <div class="most-visited-articles">
                    <?php $blogList = get_suggested_blog('blog', 12);?>
                    @if(isset($blogList) and count($blogList) > 0)
                        <div class="title-wrapper">
                            <div class="title">مقالات پربازدید</div>
                        </div>
                        @foreach($blogList as $blog)
                            <div class="article-item">
                                <a href=" {{$blog->getFrontUrl()}}" title="{{$blog->title}}">
                                    <h5 class="article-title">
                                        {{$blog->title}}
                                    </h5>
                                </a>
                                <a href="{{$blog->directory->getFrontUrl()}}" class="hidden-lg hidden-md" title="{{$blog->directory->title}}">
                                    <h6 class="article-category">
                                        {{$blog->directory->title}}
                                    </h6>
                                    <div class="article-date">
                                        {{ \App\Utils\Common\TimeService::getCustomFormatFrom($blog->created_at, "j F Y") }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>


    </div>


@endsection

@section('back_to_top_class') back-to-top-product-list @endsection


@section('footer_class') padding-bottom @endsection
