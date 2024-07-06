@extends('_base')

@section('title')
    {{ $web_page->getSeoTitle() }} -
@endsection

@section('meta_tags')
    @include('_meta_tags', ['obj' => $web_page])
    <meta property="og:type" content="website">
@endsection

@section('meta_tags')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta itemprop="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
@endsection

@section('main_content')
    <script>window.currentPage = "support"</script>
    <div class="container static-page">
        <div class="icon-title">
            <i class="icon-phone" aria-hidden="true"></i><span hct-content="title" hct-content-type="text"
                                                               hct-title='عنوان'>خدمات پس از فروش</span>
        </div>
        <div class="top-line-content">
            <div class="desc" hct-content="description" hct-content-type="rich_text" hct-title='توضیحات'>
                <p>رضایتمندی مشتریان همواره نخستین هدف ابزارمبل مهدی(خواجه لو) بوده است و در همین راستا تمامی کالاها در انبار مجموعه باز
                    شده و پس از تایید از لحاظ کیفیت و تعداد توسط کارشناسان مجددا با توجه به جنس محصول بسته بندی می گردند
                    لذا از صحت سلامت تمامی محصولات اطمینان حاصل کرده ایم و تمام سعی بر این بوده تا هر سفارش در شرایط
                    مطلوب و مطابق با انتظار به دست مشتری برسد. با این وجود در صورت بروز مشکل قوانینی برای آسودگی خیال
                    مشتریان در نظر گرفته شده است.</p>

                <p>خدمات مشتریان لارمرس آماده هرگونه پاسخگویی در زمینه‌ی پیگیری، شکایات، درخواست برگشت سفارش و
                    راهنمایی مورد نیاز مشتریان است.</p>

                <strong class="question">ساعات کاری</strong>
                <p>شنبه تا چهارشنبه از ساعت ۸:۳۰ الی ۱۷، پنجشنبه ۸:۳۰ الی ۱۳ و در دیگر ساعات ‌پس از گرفتن پیغام شما
                    عزیزان، در اولین ساعات روزکاری آتی با شما تماس می‌گیریم.</p>
                <br/>
                <strong class="question">شرایط بازگرداندن کالا</strong>
                <br/>
                <strong class="question">شرایط استفاده از 3 روز ضمانت بازگشت کالا در ابزارمبل مهدی(خواجه لو)</strong>
                <br/>

                <strong class="question">
                    <i class="fa fa-angle-left"></i>وجود ایراد یا اشکال فنی در کالای خریداری شده:
                </strong>
                <div class="answer">
                    <ul>
                        <li><p>اگر کالایی که از ابزارمبل مهدی(خواجه لو) خریده اید دارای ایراد فنی باشد، شما باید حداکثر تا ۳ روز پس از
                                دریافت کالا، به ابزارمبل مهدی(خواجه لو) اطلاع دهید.</p></li>
                        <li><p>جعبه اصلی کالا، بعد از گذشت ۳ روز باید سالم و بدون پارگی یا مخدوش شدن، نگهداری شده باشد و
                                فقط در صورتی می‌توانید کالا را برگردانید که درون جعبه اصلی خود باشد.</p></li>
                        <li><p>این بخش از خدمات پس از فروش، شامل اشکالات فنی و ظاهری همچون شکستگی، خط و خش و ... که به
                                علت استفاده نادرست کالا ایجاد شده، نمی‌شود. استفاده نادرست به معنای این است که بعد از
                                تحویل کالا، به دلایلی چون حمل و نقل، استفاده غیرمعمول، نگهداری و استفاده‌ از کالا برخلاف
                                موارد ذکر شده در دفترچه راهنمای کالا، ممکن است اشکالاتی در کالای خریداری شده به وجود آید
                                که در این صورت ضمانت برگشت کالا را شامل نمی‌گردد.</p></li>
                    </ul>
                </div>

                <strong class="question">
                    <i class="fa fa-angle-left"></i>مغایرت در مشخصات کالای تحویل داده شده با آنچه در سایت درج شده است:
                </strong>
                <div class="answer">
                    <ul>
                        <li><p>زمانی که کالا تحویل داده شد، اگر از لحاظ مشخصات فنی و ظاهری، با آنچه در سایت درج شده است، متفاوت بود، باید حداکثر تا ۲۴ ساعت طی تماس تلفنی به خدمات پس از فروش ابزارمبل مهدی(خواجه لو) اطلاع داده شود.</p></li>
                        <li><p>اگر این مغایرت در مورد مشخصاتی از کالا باشد که بدون نیاز به باز کردن جعبه بتوان متوجه آن شد ( رنگ، مشخصات روی جعبه و ...)، نباید آن را از حالت اولیه و بسته بندی اصلی خود خارج کرد.</p></li>
                        <li><p>ملاک وجود مغایرت در مشخصات کالا، مشخصات فنی درج شده در سایت است.</p></li>
                        <li><p>در صورتی که امکان تشخیص مغایرت تنها با باز کردن بسته بندی ممکن باشد، لازم است کارتن و جعبه اصلی محصولات نگهداری شود و از دور ریختن آن جداً خودداری شود.</p></li>
                    </ul>
                </div>

                <strong class="question">
                    <i class="fa fa-angle-left"></i>آسیب دیدگی و ایراد فیزیکی و ظاهری در کالای خریداری شده:
                </strong>
                <div class="answer">
                    <ul>
                        <li><p>اگر کالایی که به دستتان رسیده از نظر فیزیکی و ظاهری دارای آسیب دیدگی است، حداکثر تا 24 ساعت پس از دریافت کالا، این موضوع را طی تماس تلفنی به بخش خدمات پس از فروش ابزارمبل مهدی(خواجه لو) اطلاع دهید.</p></li>
                        <li><p>هرگز کارتن و بسته بندی اصلی کالای خریداری شده را دور نیاندازید. هرگونه پارگی، خط و خش، نوشته و ... بر روی جعبه کالا باعث می‌شود شامل ضمانت بازگشت نشود و تنها در صورتی این سرویس برای شما امکان پذیر است که در جعبه اصلی و اولیه خود به صورت کاملا سالم نگهداری شده باشد.</p></li>
                    </ul>
                </div>

                <strong class="question">
                    <i class="fa fa-angle-left"></i>آسیب دیدگی کالا بر اثر حمل و نقل:
                </strong>
                <div class="answer">
                    <ul>
                        <li><p>این مورد نیز  باید حداکثر تا 24 ساعت پس از دریافت کالا توسط مشتری، به خدمات پس از فروش ابزارمبل مهدی(خواجه لو) گزارش شود.</p></li>
                        <li><p>تمامی کالاها با بسته بندی استاندارد و مطمئن، آماده ارسال می‌شوند. تحویل کالا به شرکت‌های حمل و نقل معتبر به انتخاب کاربر به این معناست که در صورتی که هر گونه حادثه‌ای در هنگام حمل و تحویل رخ داد، به عهده شرکت حمل و نقل است و ابزارمبل مهدی(خواجه لو) تنها در صورتی خسارت وارد شده در حین حمل و نقل را متقبل می‌شود که شرکت حمل کننده کالا مورد تاییدش باشد.</p></li>
                        <li><p>در این مورد نیز کالا باید حتما داخل کارتن و جعبه اصلی خودش نگهداری شود تا مشمول ضمانت برگشت کالا گردد. هرگز بسته بندی اولیه کالا را دور نیاندازید و آن را سالم و بدون هرگونه خط و خش و یا پارگی نگهداری کنید.</p></li>
                        <li><p>کالایی که آسیب دیده باید به همراه همه لوازم جانبی و به همان شکل اولیه که تحویل مشتری داده شده است و به همراه فاکتور به بخش خدمات پس از فروش ابزارمبل مهدی(خواجه لو) داده شود.</p></li>
                        <li><p>همچنین اگر در همان موقع تحویل کالا، این آسیب دیدگی رخ دهد، شما می‌توانید از تحویل آن خودداری کنید تا کالا به ابزارمبل مهدی(خواجه لو) برگردانده و پیگیری شود.</p></li>
                    </ul>
                </div>

                <strong class="question">
                   بعد از بازگرداندن کالا به شرکت:
                </strong>
                <p>ابزارمبل مهدی(خواجه لو) کالاهای مرجوعی را بررسی می‌کند، اگر با مقرراتی که در بالا ذکر شده بود همخوانی نداشت و شامل ضمانت بازگشت نمی‌شد، آن کالا را برای مشتری مجددا ارسال می‌کند. اگر مشتری از قبول آن سرباز زد، کالا به مدت یک ماه به صورت امانت نزد ابزارمبل مهدی(خواجه لو) نگه داشته می‌شود و بعد از آن دیگر هیچ مسئولیتی در قبال خسارت و گم شدن کالا نخواهد داشت.</p>

                <strong class="question">
                    چگونه باید کالای مشکل‌دار را برای ابزارمبل مهدی(خواجه لو) ارسال کنید و هزینه ارسال بر عهده کیست؟
                </strong>
                <div class="answer">
                    <ul>
                        <li><p>حتما در صورت مشاهده مشکل و قبل از ارسال کالا با کارشناسان واحد خدمات پس از فروش ابزارمبل مهدی(خواجه لو) با شماره تلفن ۲۶۱۱۰۰۷ تماس بگیرید و از ارسال کالا بدون هماهنگی با آن‌ها خودداری فرمایید.</p></li>
                        <li><p>بعد از هماهنگی با کارشناسان، کالا را با بسته بندی اصلی و به همراه هر آنچه داخل بسته بندی بوده است برای ابزارمبل مهدی(خواجه لو) ارسال کنید.</p></li>
                        <li><p>به هیچ عنوان بر روی جعبه اصلی هیچ چیزی ننوشته و از پارگی و مخدوش کردن آن جلوگیری کنید، چرا که در غیر این صورت شامل ضمانت برگشت نخواهد بود. در صورت بیان توضیحات، حتما آن را در پشت فاکتور یا کاغذی جداگانه ارسال بفرمایید.</p></li>
                        <li><p>اگر کالا را با پست پیشتاز برای ابزارمبل مهدی(خواجه لو) ارسال کردید، حتما عکسی از رسید پستی را به آدرسinfo@abzarmoblmahdi.com ایمیل کنید.</p></li>
                        <li><p>اگر بنابر درخواست شما، فاکتور همراه کالا فرستاده نشده باشد، حتما از پیش فاکتور ایمیل شده پرینت گرفته و یا کد سفارش و مشخصات کالا را روی کاغذ جداگانه‌ای نوشته و همراه کالا ارسال کنید.</p></li>
                        <li><p>اگر ساکن سایر شهرها هستید، حتما با استفاده از پست پیشتاز کالا را برای ابزارمبل مهدی(خواجه لو) ارسال کنید و اگر ساکن تهران هستید برای هماهنگی برای فرستادن پیک جهت تحویل کالا با ابزارمبل مهدی(خواجه لو) تماس حاصل فرمایید.</p></li>
                        <li><p>هزینه برگرداندن کالا در صورتی با ابزارمبل مهدی(خواجه لو) است که با پست پیشتاز انجام گیرد. با ارائه قبض شرکت پست، درصورتی که کالا مشمول خدمات پس از فروش بشود و ایرادات مطرح شده به تایید کارشناسان برسد، هزینه پست به حسابتان واریز می‌شود. حتما عکسی از قبض پست را برای ابزارمبل مهدی(خواجه لو) ایمیل کنید.</p></li>
                        <li><p>در صورتی که از خرید منصرف شده باشید و یا ایرادت مطرح شده توسط ابزارمبل مهدی(خواجه لو) تایید نشود، هزینه ارسال به عهده شما خواهد بود.</p></li>
                    </ul>
                </div>

                <strong class="question"> *کالاهای ارسالی خود را به آدرس زیر پست کنید.</strong>
                <p>استان تهران - شهر تهران -صندوق پستی:1938935886</p>

                <strong class="question">روند رسیدگی به درخواست مشتری و بررسی کالای مرجوعی</strong>
                <p>هنگامی که کالا به ابزارمبل مهدی(خواجه لو) بازگشت، کارشناسان ما کار بررسی و کنترل کالا را شروع می‌کنند. اگر مشکلی که مشتری مطرح کرده بود درست بود، کالا تعویض شده و یا به درخواست مشتری با کالای دیگری جایگزین می‌گردد.</p>
                <p>اگر از کالا در انبار ابزارمبل مهدی(خواجه لو) موجودی نبود، یا کالای دیگری بنابر توافق با مشتری جایگزین می‌شود و یا وجه پرداختی به حساب مشتری واریز می‌گردد. اگر کالای جایگزین ما به التفاوت داشت، قبل از ارسال حتما تسویه می‌شود؛ اگر گران‌تر بود مشتری باید مبلغ مازاد را پرداخت کند و اگر ارزان‌تر بود، ابزارمبل مهدی(خواجه لو) مبلغ تفاوت را به حساب مشتری برمی‌گرداند.</p>
                <p>در صورت نبود موجودی و یا تغییر قیمت کالا در زمان تعویض، ابزارمبل مهدی(خواجه لو) تعهدی ندارد و تنها می‌تواند وجه پرداختی مشتری را برگرداند.</p>
                <p>مدت زمان بررسی کالای مرجوعی توسط کارشناسان ابزارمبل مهدی(خواجه لو) حدود ۴۸ ساعت خواهد بود، چرا که ممکن است نیاز به ارتباط با نمایندگی‌های مجاز باشد. بعد از مشخص شدن و تایید مشکل اگر نیاز به برگشت پول به حساب مشتری بود، ظرف مدت ۴۸ ساعت این مبلغ به حساب مشتری واریز می‌شود.</p>

                <strong class="question">راه‌های درخواست برای خدمات پس از فروش:</strong>
                <p>شما می‌توانید درخواست خود را از یکی از راه‌های زیر مطرح کنید:</p>
                <ul>
                    <li><p>تماس با شماره تلفن 26113007 ، بخش خدمات پس از فروش.</p></li>
                    <li><p>ارتباط از طریق صفحه تماس با ما.</p></li>
                    <li><p>ارسال ایمیل بهinfo@abzarmoblmahdi.com(حتما شماره پیگیری سفارش خود را ذکر کنید).</p></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
