<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="google-site-verification" content="VkI0n0nnp0YN4sYpsHdtUswCT9talDEMO3ASZT7X1FM"/>

    <title>@yield('title')</title>

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="ICBM" content="35.767183, 51.425116">
    <meta name="geo.position" content="35.767183; 51.425116">
    <meta name="geo.region" content="iran[-tehran]">
    <meta name="geo.placename" content="Tehran/Tehran">
    <meta name="author" content="HinzaCo, software@hinzaco.com">
    <meta name="owner" content="Retopi">
    <meta name="topic" content="فروشگاه اینترنتی صنعت تاسیسات و پایپینگ، شیرآلات و اتصالات صنعتی">
    <meta name="subject" content="فروشگاه اینترنتی صنعت تاسیسات و پایپینگ، شیرآلات و اتصالات صنعتی">
    <meta name="language" content="fa">
    <meta name="enamad" content="373062"/>

    <link rel="apple-touch-icon" sizes="180x180" href="/HCMS-assets/img/fav.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/HCMS-assets/img/fav.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/HCMS-assets/img/fav.ico">
    <link rel="manifest" href="">
    <link rel="mask-icon" href="/HCMS-assets/img/fav.ico" color="#59C4C5">
    <meta name="msapplication-TileColor" content="#fabe3c">
    <meta name="msapplication-TileImage" content="/HCMS-assets/img/fav.ico">
    <meta name="theme-color" content="#59C4C5">


    @yield('meta_tags')

    <meta property="og:site_name" content="Retopi">
    <meta property="og:locale" content="fa_IR">
    <meta name="generator" content="hinzacms"/>

    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="16x16" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="32x32" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="48x48" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="62x62" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="192x192" type="image/png">

    <!-- External CSS -->
    <link rel="stylesheet" href="/HCMS-assets/css/vendor-22-06-28.css">
    <link rel="stylesheet" href="/HCMS-assets/css/app-22-06-28.css">
    <script>window.csrfToken = '{{ csrf_token() }}'</script>
    <script>window.siteEnv = {!! get_configurations(true, "SITE") !!}</script>
    <script>window.authUser = {!! get_user() !== false ? json_encode(get_user()) : "null" !!}</script>
    <script>window.userCart = {!! json_encode(get_cart()) !!};</script>
    <script>window.siteUrl = '{{env("APP_URL")}}'</script>
</head>
<body>

<div class="preloader"></div>

<header class="header @yield('header_class')">
    <div class="top-header">
        <div class="container-fluid">
            <ul class="user-nav">
                <li>
                    <a href="{{url('/')}}" title="home page">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                @if(is_customer())
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon icon-avatar" aria-hidden="true"></i>
                            <span>سلام، {{get_user()->name}} {{get_user()->family}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('customer.profile.index')}}" title="پروفایل من">پروفایل من</a>
                            </li>
                            <li><a href="{{route('customer.invoice.index')}}" title="سفارشات">سفارشات
                                    @if(pending_invoices_count() > 0)
                                        <span class="notifier numerical-data">{{pending_invoices_count()}}</span>
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a href="{{route('customer.wish-list.index')}}" title="لیست علاقه‌مندی‌ها">لیست
                                    علاقه‌مندی‌ها</a>
                            </li>
                            <li>
                                <a href="{{route('customer.coupon.index')}}" title="لیست کوپن ها">لیست
                                    کوپن ها</a>
                            </li>
                            <li>
                                <a class="virt-form" href="{{url('/logout')}}" data-method="post" title="خروج از سیستم">
                                    <span>خروج از سیستم</span> </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{route('customer-auth.show-auth', 'mobile')}}" title=" ورود/ثبت‌نام">
                            <i class="fas fa-user"></i> ورود/ثبت‌نام
                        </a></li>
                @endif
            </ul>
            <div class="tel">
                <div class="tel-title">شماره تماس</div>
                <div class="tel-value"><a href="tel:02172024">۰۲۱-۷۲۰۲۴</a></div>
                <div class="hidden-xs dl-btn">
                    <a href="/products/landing" title="دریافت پیش فاکتور آنلاین">
                        دریافت پیش فاکتور آنلاین</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="middle-header">
            <button class="navbar-toggler" type="button">
                <i class="fas fa-bars"></i>
            </button>
            <a href="@if(is_customer()) {{route('customer.cart.show')}} @else
            {{route('customer.show-local-cart')}} @endif" class="btn-cart cart-btn" title="سبد خرید">
                <img src="/HCMS-assets/img/icons/basket.svg" class="icon" alt="cart icon">
                <span class="number cart-count numerical-data">@if(customer_cart_count() != 0)
                        {{customer_cart_count()}}
                    @endif</span>
                سبد خرید
            </a>
            <a href="/" class="brand" title="فروشگاه اینترنتی صنعت تاسیسات و پایپینگ، شیرآلات و اتصالات صنعتی">
                <img src="/HCMS-assets/img/logo.svg"
                     alt="فروشگاه اینترنتی صنعت تاسیسات و پایپینگ، شیرآلات و اتصالات صنعتی">
            </a>
        </div>
        <div class="bottom-header">
            <div id="mainNavbar" data-open=".navbar-toggler" data-close="#mainNavbar .gray-layer, .navbar-toggler ">
                <div class="gray-layer"></div>
                <ul class="base-ul">
                    @foreach(navbar_directories(["content_type" => 3]) as $root_directory)
                        <li class="hidden-xl hidden-lg">
                            <a href="{{$root_directory->getFrontUrl()}}"
                               title="{{$root_directory->title}}">{{$root_directory->title}}</a>
                        </li>
                        @foreach($root_directory->directories as $heading_l1)
                            <li class="mega-parent">
                                <a href="{{$heading_l1->getFrontUrl()}}" class="hidden-xl hidden-lg"
                                   title="{{$heading_l1->title}}">{{$heading_l1->title}}</a>
                                <a data-toggle="collapse" href="#child{{$heading_l1->id}}" role="button"
                                   aria-expanded="false" class="hidden-md hidden-sm hidden-xs"
                                   aria-controls="child{{$heading_l1->id}}"
                                   title="{{$heading_l1->title}}">{{$heading_l1->title}}</a>
                                <a data-toggle="collapse" href="#mobchild{{$heading_l1->id}}" role="button"
                                   aria-expanded="false" class="hidden-xl hidden-lg mob-collapse-toggle"
                                   aria-controls="child{{$heading_l1->id}}"></a>
                                <div id="mobchild{{$heading_l1->id}}" class="collapse" data-parent="#mainNavbar">
                                    <ul>
                                        @foreach($heading_l1->directories as $heading_l2)
                                            <li><a href="{{$heading_l2->getFrontUrl()}}"
                                                   title="{{$heading_l2->title}}">{{$heading_l2->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                        <li class="hidden-xl hidden-lg">
                            <hr/>
                            <a href="/magazine" target="_blank" title="مجله ریتاپی">مجله ریتاپی</a>
                        </li>
                    @foreach(footer_directories() as $footer_directory)
                        <li class="hidden-xl hidden-lg">
                            <a href="{{$footer_directory->getFrontUrl()}}"
                               title="{{$footer_directory->title}}">{{$footer_directory->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <form class="search-form search-container" action="/search" data-open=".search-btn"
                  data-close=".search-btn,.search-container .icon-close">
                <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <input name="query" class="form-control" type="text" placeholder="جستجو..." aria-label="Search">
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
            </form>
        </div>
    </div>
</header>

<div class="container-fluid" id="childMegaParent">
    @foreach(navbar_directories(["content_type" => 3]) as $root_directory)
        @foreach($root_directory->directories as $heading_l1)
            <div class="collapse menuchild" id="child{{$heading_l1->id}}" data-parent="#childMegaParent">
                <div class="d-flex">
                    <ul class="nav nav-tabs" id="menuTab{{$heading_l1->id}}" role="tablist">
                        @foreach($heading_l1->directories as $heading_l2_index => $heading_l2)
                            <li class="nav-item">
                                <a class="nav-link @if($heading_l2_index == 0) active show @endif"
                                   id="tab{{$heading_l2->id}}"
                                   @if(count($heading_l2->directories) > 0)
                                       data-toggle="tab"
                                   href="#content{{$heading_l2->id}}" role="tab"
                                   aria-controls="content{{$heading_l2->id}}"
                                   aria-selected="@if($heading_l2_index == 0) true @else false @endif"
                                   @else
                                       href="{{$heading_l2->getFrontUrl()}}"
                                   @endif
                                   title="{{$heading_l2->title}}">
                                    {{$heading_l2->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent{{$heading_l1->id}}">
                        @foreach($heading_l1->directories as $heading_l2_index => $heading_l2)
                            <div class="tab-pane fade @if($heading_l2_index == 0) show active @endif"
                                 id="content{{$heading_l2->id}}" role="tabpanel"
                                 aria-labelledby="tab{{$heading_l2->id}}">
                                @foreach($heading_l2->directories as $heading_l3)
                                    <ul>
                                        <a class="parent-title"
                                           href="{{$heading_l3->getFrontUrl()}}"
                                           title="{{$heading_l3->title}}">{{$heading_l3->title}}</a>
                                        @if(count($heading_l3->directories) > 0)
                                            @foreach($heading_l3->directories as $heading_l4)
                                                <li>
                                                    <a href="{{$heading_l4->getFrontUrl()}}"
                                                       title="{{$heading_l4->title}}">{{$heading_l4->title}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>


@yield('main_content')

<footer>
    <div class="container-fluid">
        <div class="footer-top">
            <a href="tel:02172024" class="tel-cta">
                <i class="fa fa-phone-volume icon"></i>
                <div class="text-center">
                    <div>۰۲۱-۷۲۰۲۴</div>
                    <div class="cta-title">با ما تماس بگیرید</div>
                </div>
            </a>
        </div>
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-35 col-md-4 hidden-sm hidden-xs">
                    <div class="footer-title">لینک‌های مرتبط</div>
                    <ul class="links" hct-gallery="related_links"
                        hct-title="لینک‌های مرتبط" hct-max-entry="10">
                        <ul class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs hidden-xxs" hct-gallery-fields>
                            <li hct-gallery-field="main_title" hct-title="عنوان"></li>
                            <li hct-gallery-field="link_addr" hct-title="آدرس لینک"></li>
                        </ul>

                        <li hct-gallery-item><a href="#" hct-attr-href="{%- ex-prop:link_addr %}"
                                                title="{%- ex-prop:main_title %}">{%- ex-prop:main_title %}</a></li>
                    </ul>
                </div>
                <div class="col-lg-35 hidden-md hidden-sm hidden-xs">
                    <h6 class="footer-title">فروشگاه اینترنتی ریتاپی</h6>
                    <div class="footer-about">ریتاپی در تلاش است بستری مناسب جهت اعلام قیمت رقابتی بدون واسطه و بین مصرف
                        کننده نهایی و تولیدکنندگان صنعت تاسیسات و پایپینگ ایجاد نماید تا در شرایط اقتصادی امروز، شرکت‌ها
                        و بنگاه‌های کوچک و بزرگ با خیالی راحت تر اقدام به خرید نمایند.
                    </div>
                </div>
                <div class="col-lg-25 col-md-4 col-sm-12 col-xs-12">
                    <div class="footer-title hidden-sm hidden-xs">شبکه‌های اجتماعی</div>
                    <ul class="socials">
                        <li><a href="" title="facebook"><i class="fab fa-facebook-f"></i> </a></li>
                        <li><a href="https://t.me/+MGp9UMsyK1Y4Yzhk" title="telegram" target="_blank"><i class="fab fa-telegram-plane"></i> </a></li>
                        <li><a href="https://instagram.com/retopishop?igshid=YmMyMTA2M2Y" title="instagram" target="_blank"><i class="fab fa-instagram"></i> </a></li>
                    </ul>
                </div>
                <div class="col-lg-25 col-md-4 col-sm-12 col-xs-12">
                    <ul class="licenses">
                        <li><a target="_blank"
                               href="https://trustseal.enamad.ir/?id=147170&amp;Code=XYgrLYThHz8HjHqvMijQ"><img
                                        src="https://Trustseal.eNamad.ir/logo.aspx?id=147170&amp;Code=XYgrLYThHz8HjHqvMijQ"
                                        alt="" style="cursor:pointer" id="XYgrLYThHz8HjHqvMijQ"></a></li>
                        <li><img referrerpolicy='origin' id='nbqeapfuesgtjxlzjxlzapfu' class="img-fluid"
                                 style='cursor:pointer'
                                 onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=250115&p=uiwkdshwobpdrfthrfthdshw", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                                 alt='logo-samandehi'
                                 src='https://logo.samandehi.ir/logo.aspx?id=250115&p=odrfujynlymanbpdnbpdujyn'/></li>
                        <li>
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQwIiBoZWlnaHQ9IjM2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxwYXRoIGQ9Im0xMjAgMjQzbDk0LTU0IDAtMTA5IC05NCA1NCAwIDEwOSAwIDB6IiBmaWxsPSIjODA4Mjg1Ii8+Cgk8cGF0aCBkPSJtMTIwIDI1NGwtMTAzLTYwIDAtMTE5IDEwMy02MCAxMDMgNjAgMCAxMTkgLTEwMyA2MHoiIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo1O3N0cm9rZTojMDBhZWVmIi8+Cgk8cGF0aCBkPSJtMjE0IDgwbC05NC01NCAtOTQgNTQgOTQgNTQgOTQtNTR6IiBmaWxsPSIjMDBhZWVmIi8+Cgk8cGF0aCBkPSJtMjYgODBsMCAxMDkgOTQgNTQgMC0xMDkgLTk0LTU0IDAgMHoiIGZpbGw9IiM1ODU5NWIiLz4KCTxwYXRoIGQ9Im0xMjAgMTU3bDQ3LTI3IDAtMjMgLTQ3LTI3IC00NyAyNyAwIDU0IDQ3IDI3IDQ3LTI3IiBzdHlsZT0iZmlsbDpub25lO3N0cm9rZS1saW5lY2FwOnJvdW5kO3N0cm9rZS1saW5lam9pbjpyb3VuZDtzdHJva2Utd2lkdGg6MTU7c3Ryb2tlOiNmZmYiLz4KCTx0ZXh0IHg9IjE1IiB5PSIzMDAiIGZvbnQtc2l6ZT0iMjVweCIgZm9udC1mYW1pbHk9IidCIFlla2FuJyIgc3R5bGU9ImZpbGw6IzI5Mjk1Mjtmb250LXdlaWdodDpib2xkIj7Yudi22Ygg2KfYqtit2KfYr9uM2Ycg2qnYtNmI2LHbjDwvdGV4dD4KCTx0ZXh0IHg9IjgiIHk9IjM0MyIgZm9udC1zaXplPSIyNXB4IiBmb250LWZhbWlseT0iJ0IgWWVrYW4nIiBzdHlsZT0iZmlsbDojMjkyOTUyO2ZvbnQtd2VpZ2h0OmJvbGQiPtqp2LPYqCDZiCDaqdin2LHZh9in24wg2YXYrNin2LLbjDwvdGV4dD4KPC9zdmc+ "
                                 alt=""
                                 onclick="window.open('https://ecunion.ir/verify/retopi.com?token=19838046203cfa67e6ad', 'Popup','toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30')"
                                 style="cursor:pointer;"></li>
                        <li><img src="/HCMS-assets/img/logo-anjooman-senfi.png" alt="" class="img-fluid"></li>
                        {{--<li></li>
                        <li></li>
                        <li>--}}{{--<img src="/HCMS-assets/img/" alt="" class="img-fluid">--}}{{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="copyright"><span><a href="https://hinzaco.com/software/services/website-design"
                                                    title=" طراحی سایت" target="_blank"> طراحی سایت</a> توسط <a
                                    href="https://hinzaco.com/" title="هینزا" target="_blank"> هینزا</a>.</span>
                        کلیه حقوق مادی و معنوی این وب‌سایت متعلق به ریتاپی می‌باشد.
                    </div>
                </div>
                <div class="col-md-6 hidden-sm hidden-xs">
                    <ul class="links">
                        @foreach(footer_directories() as $footer_directory)
                            <li><a href="{{ $footer_directory->getFrontUrl() }}"
                                   title="{{ $footer_directory->title }}">{{ $footer_directory->title }}</a></li>
                        @endforeach
                        <li><a href="/magazine/" target="_blank" title="مجله">مجله</a></li>
                    </ul>
                </div>
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

<script data-main="/HCMS-assets/js/all-22-06-28" src="/HCMS-assets/js/lib/require.js"></script>

<script> !function (t, e, n) { t.yektanetAnalyticsObject = n, t[n] = t[n] || function () { t[n].q.push(arguments) }, t[n].q = t[n].q || []; var a = new Date, r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(), c = e.getElementsByTagName("script")[0], s = e.createElement("script"); s.id = "ua-script-QrmlwRHC"; s.dataset.analyticsobject = n; s.async = 1; s.type = "text/javascript"; s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/QrmlwRHC/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c) }(window, document, "yektanet"); </script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EVPQKR7770"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-EVPQKR7770');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N6GX9XDK9H"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-N6GX9XDK9H');
</script>

@yield('extra_js')

</body>
</html>