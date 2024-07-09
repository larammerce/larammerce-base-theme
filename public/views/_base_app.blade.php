<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">

    <title>@yield('title')abzarmonlmahdi</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/HCMS-assets/img/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/HCMS-assets/img/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/HCMS-assets/img/favicon/logo.png">
    <link rel="manifest" href="/HCMS-assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/HCMS-assets/img/favicon/safari-pinned-tab.svg" color="#fabe3c">
    <meta name="msapplication-TileColor" content="#fabe3c">
    <meta name="msapplication-TileImage" content="/HCMS-assets/img/favicon/logo.png">
    <meta name="theme-color" content="#fabe3c">

    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="16x16" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="32x32" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="48x48" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="62x62" type="image/png">
    <link rel="icon" href="/HCMS-assets/img/fav.ico" sizes="192x192" type="image/png">

    <!-- External CSS -->
    <link rel="stylesheet" href="/HCMS-assets/css/vendor-23-12-25.css">
    <link rel="stylesheet" href="/HCMS-assets/css/app-23-12-25.css">

</head>
<body data-direction="rtl">


@yield('main_content')


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


<script data-main="/HCMS-assets/js/all-23-12-25" src="/HCMS-assets/js/lib/require.js"></script>

@yield('extra_js')

</body>
</html>
