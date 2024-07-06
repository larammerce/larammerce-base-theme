@section('title')
    @if(isset($directory))
        {{ $directory->title }}
    @elseif(isset($product_filter))
        {{$product_filter->title}}
    @else
        نتایج جستجو برای
        '{{ $query }}'
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
