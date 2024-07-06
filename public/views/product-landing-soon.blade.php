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
    <?php $availability_flag = false ?>


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
        <h1 class="page-title">
            @if(isset($directory))
                {{$directory->title}}
            @endif
        </h1>

    </div>
    <div class="container-fluid">
        <div class="pd-list">
            <div class="row pd-list-content">
                <aside class="col col-xl-2 col-lg-3 col-md-4" id="filters-wrapper">
                    <div class="loading-protector-layer"></div>
                    <div class="filters" id="filters-container">
                        <?php print_directories($directories); ?>
                    </div>
                </aside>

                <div class="col col-xl-10 col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="row filter-result-container">
                        @foreach(custom_query_products("all_products") as $product)
                            @if(!$product->is_active)
                                @if($product->inaccessibility_type==2)
                                    @foreach($product->getExtraProperties() as $property)
                                        @if($property->key == "availability_type")
                                                <?php $availability_flag = true ?>
                                                <?php $availability_value = $property->value ?>
                                        @endif
                                    @endforeach
                                    @if($availability_flag)
                                        @if($availability_value == 2)
                                            <div class="col-xxl-25 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                @include("_product-box", ["item" => $product])
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endforeach
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
