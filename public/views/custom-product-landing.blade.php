@extends('_base')

@section('title')
    @if(isset($directory))
        {{ $directory->title }}
    @endif -
@endsection

@section('meta_tags')
    @if(isset($directory))
        <link rel="canonical" href="{{ $directory->getFrontUrl() }}"/>
    @endif
    @if(isset($web_page))
        <meta name="description" content="{{ $web_page->getSeoDescription() }}">
        <meta name="keywords" content="{{ $web_page->getSeoKeywords() }}">
        @if(isset($directory))
            <meta name="category" content="{{ $directory->title }}">
        @endif
        <meta itemprop="name" content="{{ $web_page->getSeoTitle() }} - ابزارمبل مهدی(خواجه لو)">
        <meta itemprop="description" content="{{ $web_page->getSeoDescription() }}">
        <meta itemprop="image" content="/HCMS-assets/img/logo.svg">
        <meta property="og:url" content="{{ $web_page->getFrontUrl() }}">
        <meta property="og:title" content="{{ $web_page->getSeoTitle() }} - ابزارمبل مهدی(خواجه لو)">
        <meta property="og:image" content="/HCMS-assets/img/logo.svg">
        <meta property="og:description" content="{{ $web_page->getSeoDescription() }}">
        <meta property="og:type" content="website">
    @else
        @if(isset($directory))
            <meta name="description" content="{{ $directory->description }}">
            <meta name="keywords" content="">
            <meta name="category" content="{{ $directory->title }}">
            <meta itemprop="name" content="{{ $directory->title }} - abzarmoblmahdi">
            <meta itemprop="description" content="{{ $directory->description }}">
            <meta itemprop="image" content="/HCMS-assets/img/logo.svg">
            <meta property="og:url" content="{{ $directory->getFrontUrl() }}">
            <meta property="og:title" content="{{ $directory->title }} - abzarmoblmahdi">
            <meta property="og:image" content="/HCMS-assets/img/logo.svg">
            <meta property="og:description" content="{{ $directory->description }}">
            <meta property="og:type" content="website">
        @endif
    @endif
@endsection

@section('main_content')
    <?php
    $product_filter = get_product_filter("custom_product_filter_{$directory->id}");
    extract($product_filter->getFilterData());
    $product_ids = $product_filter->getProductIds();
    function print_directories($directories, $level = 0)
    {
        if (count($directories) === 0)
            return 0;

        if ($level === 0) {
            echo '<div class="panel-group"><div class="panel"><div class="panel-heading">';
            if (count($directories) === 1) {
                $directory = $directories[0];
                echo '<a class="accordion-toggle" title="' . $directory->title .
                    '"><h6 class="panel-title">' . $directory->title . '</h6></a>' .
                    '</div><div id="collapseCategories" class="panel-collapse collapse show"><div class="panel-body">' .
                    '<ul act="filter-control">';
                print_directories($directory->child_nodes, $level + 1);
                echo '</ul></div></div>';
            } else {
                echo '<a class="accordion-toggle" title="دسته‌بندی‌ها"><h6 class="panel-title">دسته‌بندی‌ها</h6></a>' .
                    '</div><div id="collapseCategories" class="panel-collapse collapse show"><div class="panel-body">' .
                    '<ul act="filter-control">';
                print_directories($directories, $level + 1);
                echo '</ul></div></div>';
            }
            echo '</div></div>';
            return 0;
        }

        foreach ($directories as $directory) {
            echo '<li><a href="' . $directory->getFrontUrl() .
                '"title="' . $directory->title . '">' . str_repeat("--", $level - 1) . ' ' . $directory->title . '</a></li>';
            if (count($directory->child_nodes) > 0) {
                print_directories($directory->child_nodes, $level + 1);
            }
        }
        return 0;
    }
    ?>

    <script>window.currentPage = "product-filter"</script>

    <div class="container-fluid background-white">
        <div class="loading-protector-layer"></div>
        <ol class="breadcrumb hidden-md">
            @if(isset($directory))
                @foreach($directory->getParentDirectories() as $parentDirectory)
                    <li>
                        <a href="{{$parentDirectory->getLandingUrl()}}"
                           title="{{$parentDirectory->title}}">
                            <h2>{{$parentDirectory->title}}</h2>
                        </a>
                    </li>
                @endforeach
            @endif
        </ol>

        <div class="brand-info">
            <div class="brand-section-side">
                <div class="outer-logo-box">
                    <div class="logo-box">
                        <img src="{{ImageService::getImage($directory, 'thumb')}}"
                             alt="{{$directory->title}}"></div>
                </div>
                <div class="brand-content">
                    @if($directory->description)
                        <div class="brand-content-element">
                            <div class="brand-content-description-box">
                                <div class="brand-description">
                                    {!! $directory->description !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <h1 class="page-title">
            @if(isset($directory))
                {{$directory->title}}
            @endif
        </h1>


        <div class="applied-filters">
            <ul class="chips filter-option-tag-container"></ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="pd-list">
            <div class="row pd-list-content">
                <aside class="col col-xl-2 col-lg-3 col-md-4" id="filters-wrapper">
                    <div class="loading-protector-layer"></div>
                    <div class="filters" id="filters-container">
                        <?php print_directories($directories); ?>
                        <div class="panel-group price-selector" id="price-filter">
                            <div class="panel">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" title="محدوده قیمت"
                                       href="#collapse-price">
                                        <h6 class="panel-title">محدوده قیمت<span class="unit">(تومان)</span>
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </h6>
                                    </a>
                                </div>
                                <div id="collapse-price" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="price-range">
                                            <div class="value" data-model="filter.price_range">
                                                <span class="range-separator">از</span>
                                                <input class="price-number" act="price" data-key='{"rtl":1, "ltr":0}'
                                                       disabled/>
                                                <span class="range-separator">تا</span>
                                                <input class="price-number" act="price" data-key='{"rtl":0, "ltr":1}'
                                                       disabled/>
                                            </div>
                                        </div>
                                        <div class="price-slider" act="price-range" data-filter-id="price-range"
                                             data-model="filter.price_range"
                                             data-start="{{$price_range['min']}}"
                                             data-end="{{$price_range['max']}}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($colors) > 0)
                            <div class="panel-group" id="colors-filter">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" title="رنگ"
                                           href="#collapse-color">
                                            <h6 class="panel-title">رنگ
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </h6>
                                        </a>
                                    </div>
                                    <div id="collapse-color" class="panel-collapse collapse">
                                        <div class="panel-body" act="filter-body">
                                            <div class="form-group filter-search">
                                                <input type="text" placeholder="جستجو در رنگ‌ها..."
                                                       class="form-control">
                                                <button class="btn" act="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <button class="btn" act="clear" style="display: none">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <ul act="filter-control" data-filter-id="colors"
                                                data-type="multi" data-is-colors="true">
                                                @foreach($colors->sortBy('name') as $color)
                                                    <li act="filter-option"
                                                        data-alias="{{$color->name}}"
                                                        data-value='{{$color->id}}'>
                                                        <label class="checkbox-lb">
                                                            <input type="checkbox" value="{{$color->id}}"/>
                                                            {{$color->name}}
                                                            <span class="bg-checked"></span>
                                                            <i class="color-box"
                                                               style="background: {{$color->hex_code}}"></i>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($keys) > 0)
                            <div class="panel-group" id="attributes-filter">
                                <?php $counter = 0 ?>
                                @foreach($keys as $key)
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" title="{{$key->title}}"
                                               href="#collapse-attribute-{{$counter}}">
                                                <h6 class="panel-title">{{$key->title}}
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </h6>
                                            </a>
                                        </div>
                                        <div id="collapse-attribute-{{$counter}}" class="panel-collapse collapse">
                                            <div class="panel-body" act="filter-body">
                                                <div class="form-group filter-search">
                                                    <input type="text" placeholder="جستجو در {{ $key->title }}..."
                                                           class="form-control">
                                                    <button class="btn" act="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                    <button class="btn" act="clear" style="display: none">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                                <ul act="filter-control" data-filter-id="{{ $key->title }}"
                                                    data-type="multi">
                                                    @foreach($key->values->sortBy('name') as $value)
                                                        <li act="filter-option" data-alias="{{$value->name}}"
                                                            data-value='{{$value->id}}'>
                                                            <label class="checkbox-lb">
                                                                <input type="checkbox" value="{{$value->id}}"/>
                                                                {{$value->name}}
                                                                <span class="filter-en-title">{{$value->en_name}}</span>
                                                                <span class="bg-checked"></span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++ ?>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </aside>
                <div class="col col-xl-10 col-lg-9 col-md-8 col-sm-12 col-xs-12" id="products-wrapper">
                    <div class="row options">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="sort-by">
                                <div class="op-title">مرتب سازی بر اساس</div>
                                <div class="dropdown form-group">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" class="form-control" act="filter-monitor"
                                            data-filter-id="sort">
                                        جدید ترین
                                    </button>
                                    <ul class="dropdown-menu" act="filter-control" data-filter-id="sort"
                                        data-type="single">
                                        <li act="filter-option" data-alias="گرانترین"
                                            data-value='{"field":"latest_price", "method":"DESC"}'>
                                            <a>گرانترین</a>
                                        </li>
                                        <li act="filter-option" data-alias="ارزان ترین"
                                            data-value='{"field":"latest_price", "method":"ASC"}'>
                                            <a>ارزان ترین</a>
                                        </li>
                                        <li act="filter-option" data-alias="جدید ترین"
                                            data-value='{"field":"id", "method":"DESC"}'>
                                            <a>جدید ترین</a>
                                        </li>
                                        <li act="filter-option" data-alias="محبوب‌ترین"
                                            data-value='{"field":"average_rating", "method":"DESC"}'>
                                            <a>محبوبترین</a>
                                        </li>
                                        <li act="filter-option" data-alias="تخفیف‌"
                                            data-value='{"field":"has_discount", "method":"DESC"}'>
                                            <a>تخفیف</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                            <h5 class="product-count">
                                <span class="price-data" id="products-counts">0</span>&nbsp;
                                محصول یافت شده
                            </h5>
                        </div>
                    </div>
                    <div class="row filter-result-container" id="filter-result-container"
                         data-default-products="{{json_encode($product_ids)}}"></div>
                    <div class="row filter-loading-container is-loading" id="filter-loading-container">
                        <div class="filter-loading-layer">
                            @for($i=0; $i<5; $i++)
                                <div class="col-xl-25 col-lg-4 col-md-6 col-sm-6 col-xs-12 @if($i==1) hidden-xs @elseif($i==2)
                                        hidden-xs @elseif($i==3) hidden-sm hidden-xs @endif">
                                    <div class="product-item-loading">
                                        <div class="product-pic"></div>
                                        <div class="product-title"></div>

                                        <div class="product-footer">
                                            <div class="product-price"></div>
                                            <div class="rating-value">
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('back_to_top_class')
    back-to-top-product-list
@endsection


@section('footer_class')
    padding-bottom
@endsection
