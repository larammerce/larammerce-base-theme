@extends('_base')

@section('title')
    خطای @lang("errors.{$code}.code") -
@endsection

@section('main_content')
    <script>window.currentPage = "error-{{ $code }}"</script>
    <div class="container error" style="padding-top: 30px;">
        <style>
            body{
                background: #fff;
            }
            .page_404 {
                margin-right: 100px;
                padding: 40px 0;
                background: #fff;
            }
            @media (min-width: 200px) and (max-width: 575px) {
                .page_404 {
                    margin-right: 00px;
                    padding: 40px 0;
                    background: #fff;
                }
            }

            .page_404 img {
                width: 100%;
            }

            .four_zero_four_bg {
                background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
                height: 450px;
                background-position: center;
            }

            .four_zero_four_bg h1 {
                font-size: 80px;
            }

            .four_zero_four_bg h3 {
                font-size: 80px;
            }

            .link_404 {
                color: #fff !important;
                padding: 10px 20px;
                background: #e30505;
                margin: 20px 0;
                display: inline-block;
            }
            .contant_box_404 {
                margin-top: -50px;
            }
        </style>

        <section class="page_404">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-sm-10 col-sm-offset-1  text-center">
                            <div class="four_zero_four_bg">
                                <h1 class="text-center ">
                                        @lang("errors.{$code}.code")
                                </h1>


                            </div>

                            <div class="contant_box_404">
                                <h3 class="h2">
                                    @lang("errors.{$code}.message")
                                </h3>

                                <p>برای بازگشت به صفحه اصلی</p>

                                <a href="/" class="link_404">اینجا کلیک کنید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--<h1 style="text-align: center;">
            </h1>--}}
        @if(isset($message))
            <h4 style="text-align: center; margin-bottom: 20px;" class="motto">
                @lang($message)
            </h4>
        @endif



    </div>

@endsection
