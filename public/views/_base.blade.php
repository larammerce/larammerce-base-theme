<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=yes">
    <meta name="google-site-verification" content="3d5HFyIlBaepmfw7WpJCjngHOIp73AN1uxx6t_Gj9uo"/>
    <title>@yield('title')ابزار مبل مهدی(خواجه لو)</title>

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="ICBM" content="35.793587, 51.455294">
    <meta name="geo.position" content="35.793587;51.455294">
    <meta name="geo.region" content="iran[-tehran]">
    <meta name="geo.placename" content="Tehran/Tehran">
    <meta name="author" content="HinzaCo, software@hinzaco.com">
    <meta name="owner" content="abzarmoblmahdi">
    <meta name="topic"
          content="لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،">
    <meta name="subject"
          content="لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،">
    <meta name="language" content="fa">
    <meta name="enamad" content="373062"/>
    <meta name="p:domain_verify" content="bf61526dcf8b9cf38cef9ba3cd184fe2"/>

    <link rel="apple-touch-icon" sizes="180x180" href="/HCMS-assets/img/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/HCMS-assets/img/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/HCMS-assets/img/favicon/logo.png">
    <link rel="manifest" href="/HCMS-assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/HCMS-assets/img/favicon/safari-pinned-tab.svg" color="#fabe3c">

    <meta name="msapplication-TileColor" content="#fabe3c">
    <meta name="msapplication-TileImage" content="/HCMS-assets/img/favicon/logo.png">
    <meta name="theme-color" content="#fabe3c">


    @yield('meta_tags')
    <meta property="og:site_name" content="abzarmoblmahdi">
    <meta property="og:locale" content="fa_IR">
    <meta name="generator" content="hinzacms"/>
    <meta name="yn-tag" id="229e5f95-66b3-4969-8fa0-a8e108dc8f31">

    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="16x16" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="32x32" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="48x48" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="62x62" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="192x192" type="image/png">


    <!-- External CSS -->
    <link rel="stylesheet" href="/HCMS-assets/css/vendor-23-11-23.css">
    <link rel="stylesheet" href="/HCMS-assets/css/app-23-11-23.css">

    <script>window.csrfToken = '{{ csrf_token() }}'</script>
    <script>window.siteEnv = {!! get_configurations(true, "SITE") !!}</script>
    <script>window.authUser = {!! get_user() !== false ? json_encode(get_user()) : "null" !!}</script>
    <script>window.userCart = {!! json_encode(get_cart()) !!};</script>
    <script>window.siteUrl = '{{env("APP_URL")}}'</script>
    <script>window.currentServerTime = '{{date("H:i")}}'</script>
    <script>window.directoryLocationEnabled = {{ config("cms.general.site.enable_directory_location") ? "true" : "false" }};</script>

</head>
<body data-direction="rtl">
<header class=" @yield('header_class') ">
    <div class="sticky-banner" hct-gallery="sticky_banner" hct-title="بنر بالای سایت" hct-max-entry="2">
        <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs hidden-xxs" hct-gallery-fields>
            <li hct-gallery-field="main_title" hct-title="عنوان"></li>
            <li hct-gallery-field="link_addr" hct-title="آدرس لینک"></li>
        </ul>

        <div class="item" hct-gallery-item>
            <img hct-attr-src="{%- prop:image_path %}"
                 alt="{%- ex-prop:main_title %}" class="img-fluid"/>
            <a href="#" hct-attr-href="{%- ex-prop:link_addr %}" class="absolute-link"
               title="{%- ex-prop:main_title %}" id="sticky_banner"></a>
        </div>
    </div>

    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <button type="button" class="navbar-toggle hidden-xl hidden-lg">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="btn-text">دسته‌بندی‌ها</span>
                </button>
                <a class="navbar-brand-mobile hidden-xl hidden-lg hidden-md" href="/"
                   title="ابزارمبل مهدی(خواجه لو)">
                    <img  src="/HCMS-assets/img/logo.svg" height="35px" alt="لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،">
                </a>
                <ul class="col">
                    @if(is_customer())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon icon-avatar" aria-hidden="true"></i>
                                <span>سلام، {{get_user()->name}} {{get_user()->family}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('customer.profile.index')}}">پروفایل من</a>
                                </li>
                                <li>
                                    <a href="{{route('customer.profile.show-edit-profile')}}">ویرایش پروفایل</a>
                                </li>
                                <li>
                                    <a href="{{route('customer.wish-list.index')}}">لیست علاقه‌مندی‌ها</a>
                                </li>
                                <li>
                                    <a class="virt-form" href="{{url('/logout')}}"
                                       data-method="post">
                                        <span>خروج از سیستم</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{route('customer.invoice.index')}}" title="سفارشات">سفارشات
                                @if(pending_invoices_count() > 0)
                                    <span class="notifier numerical-data">{{pending_invoices_count()}}</span>
                                @endif
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('customer-auth.show-auth', 'mobile')}}" title="ورود یا ثبت‌نام">
                                <span>ورود یا ثبت‌نام</span>
                            </a>
                        </li>
                    @endif
                    @if(config("cms.general.site.enable_directory_location"))
                        <li class="location-link">
                            <a data-toggle="modal" data-controls-modal="location-modal" data-backdrop="static"
                               data-keyboard="false"
                               data-target="{{ is_customer() ? '#addresses-modal' : '#location-modal' }}">
                                <i class="icon-placeholder"></i>
                                <span class="hidden-sm hidden-xs">{{get_current_customer_location_title()}}</span>
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="support-phone">شماره پشتیبانی: ۷۲۱۱۳-۰۲۱
                    <i class="fa fa-close hidden-xl hidden-lg"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 order-lg-1 order-md-3 order-3 main-navbar">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="main-nav" data-open=".navbar-toggle"
                             data-close=".navbar-collapse .gray-layer, .navbar-toggle , .search-btn">
                            <div class="gray-layer"></div>
                            <ul class="nav navbar-nav">
                                <?php $counter = 1 ?>
                                @foreach(navbar_directories() as $root_directory)
                                    @if($root_directory->content_type === 3 and !str_starts_with($root_directory->url_part, "filter"))
                                        <li class="hidden-md hidden-sm hidden-xs has-productsMenu menu-{{$root_directory->url_part}}">
                                            <a href="{{$root_directory->getLandingUrl()}}" class="">
                                                {{$root_directory->title}}
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </a>
                                            @if(count($root_directory->directories) > 0)
                                                <div class="productsMenu">
                                                    <div class="row">
                                                        @foreach(directory_make_children_groups($root_directory, 5) as $children_group)
                                                            <ul class="col-lg-25 col-md-25 col-sm-12">
                                                                @foreach($children_group as $child)
                                                                    <li class="title"
                                                                        child-count="{{count($child->directories)}}">
                                                                        <a href="{{$child->getLandingUrl()}}">
                                                                            {{$child->title}}
                                                                        </a>
                                                                    </li>
                                                                    @if(count($child->directories) > 0)
                                                                        @foreach($child->directories as $directory)
                                                                            <li>
                                                                                <a href="{{$directory->getLandingUrl()}}">
                                                                                    {{$directory->title}}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </li>
                                        <li class="hidden-xl hidden-lg">
                                            <a href="{{$root_directory->getLandingUrl()}}">{{$root_directory->title}}</a>
                                            <a class="accordion-toggle" data-toggle="collapse"
                                               href="#collapse-{{$root_directory->id}}"
                                               aria-expanded="@if($counter =1 ) true @else false @endif">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </a>
                                            @if(count($root_directory->directories) > 0)
                                                <div id="collapse-{{$root_directory->id}}"
                                                     class="panel-collapse collapse @if($counter =1 ) in @endif"
                                                     aria-expanded="@if($counter =1 ) true @else false @endif"
                                                     data-parent=".header-bottom">
                                                    <ul>
                                                        @foreach(directory_make_children_groups($root_directory, 5) as $children_group)
                                                            @if(sizeof($children_group) > 0)
                                                                @foreach($children_group as $child)
                                                                    @if(count($child->directories) > 0)

                                                                        <li class="dropdown">
                                                                            <a href="{{$child->url_full}}">
                                                                                {{$child->title}}
                                                                            </a>
                                                                            <a href="{{$child->getLandingUrl()}}"
                                                                               class="dropdown-toggle"
                                                                               data-toggle="dropdown" role="button"
                                                                               aria-haspopup="true"
                                                                               aria-expanded="false">
                                                                                <i class="fa fa-angle-down"
                                                                                   aria-hidden="true"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <ul>
                                                                                    @foreach($child->directories as $directory)
                                                                                        <li>
                                                                                            <a href="{{$directory->getLandingUrl()}}">
                                                                                                {{$directory->title}}
                                                                                            </a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <a href="{{$child->getLandingUrl()}}">
                                                                                {{$child->title}}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                    @else
                                        @if(count($root_directory->directories) > 0 and $root_directory->content_type === 3)
                                            <li class="dropdown menu-{{$root_directory->url_part}}">
                                                <a href="{{$root_directory->getLandingUrl()}}"
                                                   class="dropdown-toggle"
                                                   data-toggle="dropdown"
                                                   role="button" aria-haspopup="true"
                                                   aria-expanded="false">
                                                    {{$root_directory->title}}
                                                </a>
                                                <div class="dropdown-menu">
                                                    <ul>
                                                        @foreach($root_directory->directories as $sub_directory)
                                                            <li>
                                                                <a href="{{$sub_directory->getLandingUrl()}}">
                                                                    {{$sub_directory->title}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @else
                                            <li class="menu-{{$root_directory->url_part}} @if($root_directory->url_part === 'blackfriday') offer @endif ">
                                                <a href="{{$root_directory->getFrontUrl()}}">
                                                    {{$root_directory->title}}
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                        <?php $counter = $counter + 1 ?>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 order-lg-1 order-md-0 order-sm-0 order-0">
                    <a href="@if(is_customer()) {{route('customer.cart.show')}} @else
                    {{route('customer.show-local-cart')}} @endif" class="btn cart-btn" title="سبد خرید">
                        <div class="cart-btn-text">
                            <i class="icon icon-shopping-bag" aria-hidden="true"></i>
                            <span>سبد خرید</span>
                        </div>
                        <div class="notifier cart-count @if(customer_cart_count() == 0)  @else numerical-data @endif">
                            @if(customer_cart_count() == 0)
                                <img src="/HCMS-assets/img/basket.svg" alt="basket">
                            @else
                                {{customer_cart_count()}}
                            @endif
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-9 col-xs-9 order-lg-2 order-lg-0 order-md-1 order-sm-1 order-1">
                    <form class="search-form" action="/search" data-open=".search-btn"
                          data-close=".search-btn,.search-container .icon-close">
                        <div class="form-group search-container col-xl-9 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="query" class="form-control" placeholder="جستجو...">
                            <div class="search-result" style="display: none">
                                <div class="title">جستجو در دسته بندی ها</div>
                                <ul class="search-result-categories"></ul>
                                <div class="no-result categories-no-result">متاسفانه نتیجه‌ای یافت نشد.</div>
                                <hr/>
                                <div class="title">جستجو در محصولات</div>
                                <ul class="search-result-product"></ul>
                                <div class="no-result products-no-result">متاسفانه نتیجه‌ای یافت نشد.</div>
                                <div class="loading">در حال جستجو...</div>
                                <a href="#" class="btn more" data-text="بیشتر">
                                    <span class="text">بیشتر</span></a>
                            </div>
                        </div>
                        <button type="submit" class="btn submit"><i class="icon-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-2 col-md-3 hidden-sm hidden-xs brand-wrapper order-lg-3 order-md-2">
                    <a class="navbar-brand" href="/" title="صفحه اصلی">
                        <img style="margin-top: -35px" src="/HCMS-assets/img/logo.svg" class="img-fluid logo-mobile"
                             alt="لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،">
                    </a>
                </div>



            </div>
        </div>
    </div>
</header>

@if(get_cms_setting("top_alert_enable") == "true")
    <div class="top-alert"
         style="background:{{ get_cms_setting('top_alert_color') }}">{!! get_cms_setting("top_alert_text") !!}</div>
@endif


@yield('main_content')


<footer class="@yield('footer_class')">
<img src="../HCMS-assets/img/Screenshot%202023-12-11%20194729.png" class="pattern" height="120px" alt="abzarmoblmahdi pattern">

    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="contact">
                        <p>زمان پاسخگویی:
                            <br/><span>شنبه تا چهار‌شنبه ۸:۴۵ تا ۲۲</span>
                            <br/><span>پنج‌شنبه و جمعه‌ ۸:۴۵ تا ۱۷</span>
                        </p>
                        <p>
                            تلفن:
                            <br/>
                            {{--<span>۰۲۱-۲۲۲۳۵۶۲۳</span>--}}
                            <span>۰۲۱-۷۲۱۱۳</span>
                        </p>
                        <p>
                            ایمیل:
                            <br/><span>info@abzarmoblmahdi.com</span>
                        </p>
                        <ul class="social-networks">
                            <li><a href="https://instagram.com/abzarmoblmahdi/" title="instagram" target="_blank">
                                    <i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.facebook.com/abzarmoblmahdi" title="facebook"
                                   target="_blank">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/abzarmoblmahdi/" title="abzarmoblmahdi" target="_blank">
                                    <i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCRKYfh5uL7VrbWuoMiqeMaA" title="abzarmoblmahdi"
                                   target="_blank">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="https://www.pinterest.com/abzarmoblmahdicom" title="abzarmoblmahdi" target="_blank">
                                    <i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="https://virgool.io/@abzarmoblmahdi" title="abzarmoblmahdi" target="_blank">
                                    <svg width="12px" height="16px" viewBox="0 0 204 304">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #3c3c3a;
                                            }

                                            .st2 {
                                                fill: #fafafa;
                                            }
                                        </style>
                                        <path id="Shape" class="st0" d="M100.2,303.7c-16.2-11.1-32.1-22-48.5-33.2c9.9-13.9,19.7-27.4,29-40.4
                                        c-10.1-4.2-20.5-7.2-29.4-12.7c-35.1-21.5-54-52.6-51-94.4c3.1-43.4,26.3-73.9,66.5-88.4c67.8-24.4,125,23.1,134.4,75.5
                                        c4.1,22.8,1.9,45.2-10.4,65.1c-12.4,20.1-26.2,39.4-39.8,58.7c-15.6,22-31.7,43.7-47.5,65.5C102.6,300.6,101.7,301.8,100.2,303.7z"></path>
                                        <g id="Fill-1"
                                           transform="translate(113.070063, 101.070415) rotate(210.000000) translate(-113.070063, -101.070415) ">
                                            <g class="st1">
                                                <path id="path-2_2_" d="M164.9,183.5c-11,0-21.8,0-32.9,0c0.2-9.5,0.4-49.1,0.6-58c-6,1.2-11.8,3.1-17.6,3.4
                                              c-23,1.2-41.5-7.3-53.3-27.5c-12.3-21-11.2-42.5,2.8-61.8c23.6-32.7,65.1-28.8,85.9-7.6c9.1,9.2,15.2,20.3,15.7,33.4
                                              c0.6,13.2,0.3,26.4,0.1,39.7"></path>
                                            </g>
                                            <g>
                                                <path id="path-2_1_" class="st2" d="M166.6,182.5c-11,0-21.8,0-32.9,0c0.2-9.5,0.4-49.1,0.6-58c-6,1.2-11.8,3.1-17.6,3.4
                                              c-23,1.2-41.5-7.3-53.3-27.5c-12.3-21-11.2-42.5,2.8-61.8c23.6-32.7,65.1-28.8,85.9-7.6c9.1,9.2,15.2,20.3,15.7,33.4
                                              c0.6,13.2,0.3,26.4,0.1,39.7"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li><a href="https://www.aparat.com/abzarmoblmahdi" title="abzarmoblmahdi" target="_blank">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                         xml:space="preserve" width="16px" height="16px">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #3C3C3A;
                                            }
                                        </style>
                                        <g transform="translate(-370 -155.363)">
                                            <path class="st0"
                                                  d="M376.9,155.9l-1.5-0.4c-1.3-0.4-2.7,0.4-3,1.8l-0.4,1.4C373.3,157.2,375,156.2,376.9,155.9z"/>
                                            <path class="st0"
                                                  d="M370.4,164.7l-0.4,1.4c-0.4,1.3,0.4,2.7,1.8,3l1.4,0.4C371.8,168.3,370.7,166.6,370.4,164.7z"/>
                                            <path class="st0"
                                                  d="M384.2,157.9l-1.6-0.4c1.6,1.2,2.7,3.1,2.9,5.1l0.4-1.6C386.3,159.6,385.5,158.2,384.2,157.9z"/>
                                            <path class="st0"
                                                  d="M379.1,171l1.5,0.4c1.3,0.4,2.7-0.4,3-1.8l0,0l0.4-1.6C382.8,169.6,381,170.7,379.1,171z"/>
                                            <path class="st0" d="M378,156.6c-3.8,0-6.9,3.1-6.9,6.9c0,0,0,0,0,0c0,3.8,3.1,6.9,6.9,6.9c0,0,0,0,0,0c3.8,0,6.9-3.1,6.9-6.9
		C384.9,159.7,381.8,156.6,378,156.6L378,156.6 M374.1,160c0.2-1.1,1.2-1.8,2.3-1.6c1.1,0.2,1.8,1.2,1.6,2.3
		c-0.2,1.1-1.2,1.8-2.3,1.6C374.6,162.1,373.9,161.1,374.1,160 M377,166c-0.2,1.1-1.2,1.8-2.3,1.6h0c-1.1-0.2-1.8-1.2-1.6-2.3
		c0.2-1.1,1.2-1.8,2.3-1.6C376.5,163.9,377.2,165,377,166 M377.8,164.4c-0.5-0.1-0.8-0.6-0.7-1c0.1-0.5,0.6-0.8,1-0.7
		c0.5,0.1,0.8,0.6,0.7,1C378.7,164.2,378.3,164.5,377.8,164.4 M381.9,167c-0.2,1.1-1.2,1.8-2.3,1.6c-1.1-0.2-1.8-1.2-1.6-2.3
		c0.2-1.1,1.2-1.8,2.3-1.6C381.4,164.9,382.1,165.9,381.9,167 M380.6,163.3c-1.1-0.2-1.8-1.2-1.6-2.3l0,0c0.2-1.1,1.2-1.8,2.3-1.6
		c1.1,0.2,1.8,1.2,1.6,2.3l0,0C382.7,162.8,381.7,163.5,380.6,163.3C380.6,163.3,380.6,163.3,380.6,163.3"/>
                                        </g>
</svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <ul class="footer-links">
                        @foreach(footer_directories() as $footer_directory)
                            <li>
                                <a href="{{$footer_directory->url_full}}" title="{{$footer_directory->title}}">
                                    {{$footer_directory->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    {{--<div class="newsletter">
                        <div class="title">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،</div>
                        <div class="motto">از تخفیف ها و جدیدترین های ابزارمبل مهدی(خواجه لو) با خبر شوید !</div>
                        <form class="subscribe-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="ایمیل خود را وارد نمایید...">
                            </div>
                            <button type="submit" class="btn btn-icon submit">
                                <i class="fa fa-angle-left"></i>
                            </button>
                        </form>
                    </div>--}}
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="licenses">
                        <a referrerpolicy="origin" target="_blank"
                           href="https://trustseal.enamad.ir/?id=115304&amp;Code=wqO1OrjZI1wNsRJ53BmP"><img
                                    referrerpolicy="origin"
                                    src="https://Trustseal.eNamad.ir/logo.aspx?id=115304&amp;Code=wqO1OrjZI1wNsRJ53BmP"
                                    alt="" style="cursor:pointer" id="wqO1OrjZI1wNsRJ53BmP"></a>
                        <img id="jxlzrgvjrgvjjxlzoeuksizp" style="cursor:pointer"
                             onclick="window.open('https://logo.samandehi.ir/Verify.aspx?id=133189&p=rfthxlaoxlaorfthmcsipfvl',
                                 'Popup','toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30')"
                             alt="logo-samandehi"
                             src="HCMS-assets/img/samandehi_.png"/>
                        <img src="/HCMS-assets/img/ecunion-logo.png" alt=""
                             onclick="window.open('https://ecunion.ir/verify/abzarmoblmahdi.com?token=75449105c7a07823c2b9', 'Popup',
                                 'toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30')"
                             style="cursor:pointer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-nav">
        <nav class="container">
            <ul>
                <?php $product_roots_list = get_products_root_list_with_type(3); ?>
                @foreach($product_roots_list as $key=>$product_root)
                    @if($product_root -> id != 789)
                        <li class="nav-item">
                            <a href="{{ $product_root->getFrontUrl() }}"
                               title="{{ $product_root->title }}">{{ $product_root->title }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="credits hidden-xs">
                <div class="col col-lg-25 col-md-25 col-sm-25">
                    <a class="credit-item" href="/rules" title="ضمانت اصالت کالا" target="_blank">
                        <img src="/HCMS-assets/img/icons/footer-icon1.svg" alt="ضمانت اصالت کالا">

                        <div class="text">ضمانت اصالت کالا</div>
                    </a>
                </div>
                <div class="col col-lg-25 col-md-25 col-sm-25">
                    <a class="credit-item" href="/rules" title="تضمین کیفیت" target="_blank">
                        <img src="/HCMS-assets/img/icons/footer-icon2.svg" alt="تضمین کیفیت">

                        <div class="text">تضمین کیفیت</div>
                    </a>
                </div>
                <div class="col col-lg-25 col-md-25 col-sm-25">
                    <a class="credit-item" href="/shipping-guid" title="تحویل  " target="_blank">
                        <img src="/HCMS-assets/img/icons/footer-icon3.svg" alt="تحویل اکسپرس" class="express">
                        <div class="text">تحویل</div>
                    </a>
                </div>
                <div class="col col-lg-25 col-md-25 col-sm-25">
                    <a class="credit-item" href="/support" title="پشتیبانی سریع" target="_blank">
                        <img src="/HCMS-assets/img/icons/footer-icon4.svg" alt="پشتیبانی سریع">
                        <div class="text">پشتیبانی سریع</div>
                    </a>
                </div>
                <div class="col col-lg-25 col-md-25 col-sm-25">
                    <a class="credit-item" href="/support" title="ضمانت بازگشت کالا" target="_blank">
                        <img src="/HCMS-assets/img/icons/footer-icon5.svg" alt="ضمانت بازگشت کالا">
                        <div class="text">ضمانت بازگشت کالا</div>
                    </a>
                </div>
            </div>

            <div class="copyright">

                ABZARMOBLMAHDI.COM © ALL RIGHTS RESERVED
            </div>
        </div>
    </div>
</footer>

@include('_underscore_templates')
@include('_modals')

<div class="hidden-content" style="display: none;">
    <div class="error-messages">
        @if(isset($errors))
            @foreach($errors->getMessages() as $inputName => $messages)
                <ul input-name="{{$inputName}}">
                    @foreach($messages as $message)
                        <li>{!! $message !!}</li>
                    @endforeach
                </ul>
            @endforeach
        @endif
    </div>
    <div class="system-messages">
        <ul>
            @foreach(get_system_messages() as $message)
                <li data-color="{{ $message->color_code }}" data-type="{{ $message->type }}">{!! $message->text !!}</li>
            @endforeach
        </ul>
    </div>
</div>

<a href="#" class="btn back-to-top @yield('back_to_top_class')" role="button" title="بازگشت به بالای صفحه"
   data-toggle="tooltip" style="display:none">
    <i class="fa fa-angle-up"></i>بازگشت به بالا
</a>


<script data-main="/HCMS-assets/js/all-23-11-23" src="/HCMS-assets/js/lib/require.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121055133-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-121055133-1');
</script>

<!-- Hotjar Tracking Code for https://abzarmoblmahdi.com/ -->
<script>
    (function (h, o, t, j, a, r) {
        h.hj = h.hj || function () {
            (h.hj.q = h.hj.q || []).push(arguments)
        };
        h._hjSettings = {hjid: 1211081, hjsv: 6};
        a = o.getElementsByTagName('head')[0];
        r = o.createElement('script');
        r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>

<!--BEGIN RAYCHAT CODE-->
<script type="text/javascript">!function () {
        function t() {
            var t = document.createElement("script");
            t.type = "text/javascript", t.async = !0, localStorage.getItem("rayToken") ? t.src = "https://app.raychat.io/scripts/js/" + o + "?rid=" + localStorage.getItem("rayToken") + "&href=" + window.location.href : t.src = "https://app.raychat.io/scripts/js/" + o + "?href=" + window.location.href;
            var e = document.getElementsByTagName("script")[0];
            e.parentNode.insertBefore(t, e)
        }

        var e = document, a = window, o = "2b5992e4-6681-47ab-a8f2-c70a9da045ea";
        "complete" == e.readyState ? t() : a.attachEvent ? a.attachEvent("onload", t) : a.addEventListener("load", t, !1)
    }();</script>
<!--END RAYCHAT CODE-->

<script> !function (t, e, n) {
        t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
            t[n].q.push(arguments)
        }, t[n].q = t[n].q || [];
        var a = new Date, r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
            c = e.getElementsByTagName("script")[0], s = e.createElement("script");
        s.id = "ua-script-SF9ZIY6s";
        s.dataset.analyticsobject = n;
        s.async = 1;
        s.type = "text/javascript";
        s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/SF9ZIY6s/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)
    }(window, document, "yektanet"); </script>

@yield('extra_js')

</body>
</html>
