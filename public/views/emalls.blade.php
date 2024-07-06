<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="google-site-verification" content="3d5HFyIlBaepmfw7WpJCjngHOIp73AN1uxx6t_Gj9uo"/>

    <title>لیست محصولات فروشگاه اینترنتی ابزارمبل مهدی(خواجه لو)</title>


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

    <style>
        body {
            direction: rtl;
            padding-top: 30px;
        }

        form {
            background: #fff;
            box-shadow: 0 0 10px rgba(76, 76, 76, 0.15);
            padding:30px;
        }
        h1{
            font-size:26px;
            text-align: center;
            margin:20px 0 50px;
        }
        img{
            width:200px !important;
        }
        table tr th,
        table tr td{
            width:25%;
            text-align: center;
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
<form method="post" action="./product" id="form1" class="container">
    <div class="aspNetHidden">
        <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value=""/>
    </div>

    <div class="aspNetHidden">
        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value=""/>
    </div>
    <h1>لیست محصولات فروشگاه اینترنتی ابزارمبل مهدی(خواجه لو)</h1>
    <?php $product_roots_list = get_products_root_list_with_type(3); // 3 product type
    ?>
    @if($product_roots_list != null)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="title">عنوان</th>
                <th class="img">تصویر</th>
                <th class="price">قیمت (تومان)</th>
                <th class="price">قیمت با تخفیف (تومان)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_roots_list as $product_category)
                @foreach(get_directory_product_leaves($product_category, 10000) as $product)
                    <tr>
                        <td><a href="{{$product->getFrontUrl()}}" target="_blank" title="{{$product->title}}">
                                {{$product->title}}
                            </a></td>
                        <td>
                            <img src="{{ImageService::getImage($product, 'thumb')}}" alt="{{$product->title}}"
                                 class="img-fluid">
                        </td>
                        <td>{{$product->latest_price}}</td>
                        <td>
                            @if($product->has_discount)
                                {{$product->previous_price}}
                            @else
                                {{$product->latest_price}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    @endif

</form>
<a href="#" class="btn back-to-top @yield('back_to_top_class')" role="button" title="بازگشت به بالای صفحه"
   data-toggle="tooltip" style="display:none">
    <i class="fa fa-angle-up"></i>بازگشت به بالا
</a>


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
        var a = new Date,
            r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
            c = e.getElementsByTagName("script")[0], s = e.createElement("script");
        s.id = "ua-script-SF9ZIY6s";
        s.dataset.analyticsobject = n;
        s.async = 1;
        s.type = "text/javascript";
        s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/SF9ZIY6s/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)
    }(window, document, "yektanet"); </script>
</body>
</html>

