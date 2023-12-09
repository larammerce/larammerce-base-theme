@extends('_base_app')

@section('title')
    {{ $web_page->getSeoTitle() }} -
@endsection


@section('main_content')
    <script>window.currentPage = "buy-guide"</script>

    <div class="container buy-guide p-4">
        <div class="top-line-content">
            <ul>
                <li>
                    <h2 class="title" hct-content="research_title" hct-content-type="text" hct-title='عنوان اول'>جستجو و
                        انتخاب کالا</h2>
                    <div class="short-desc" hct-content="research_short_content_1" hct-content-type="text"
                         hct-title='متن کوتاه'>برای جستجوی کالای مورد نظر خود در سایت، از سه روش می‌توانید استفاده
                        کنید:
                    </div>
                    <div class="desc">
                        <div class="blue-title "> استفاده از ابزار نوار جستجو(در صورتی که مدل یا برند مورد نظر خود را
                            از قبل انتخاب کرده باشید)
                        </div>
                        <p hct-content="research_content" hct-content-type="rich_text" hct-title='متن اول'>در قسمت بالای
                            صفحه‌های سایت یک ابزار جستجو وجود دارد که شما می‌توانید با تایپ نام یا بخشی از نام آن کالا
                            در نوار جستجو، به صورت مستقیم به سراغ محصول مورد نظر خود بروید.</p>
                        <div class="guide-pic">
                            <img src="/HCMS-assets/img/guide1.jpg" alt="راهنمای خرید" class="img-fluid" style="
                        max-width:70%;margin:0 auto"
                                 hct-content="guide_1" hct-title='راهنمای خرید' hct-content-type="image">
                        </div>
                        <div class="blue-title">استفاده از بخش بندی گروه‌های کالا</div>
                        <p hct-content="categorical_research_content" hct-content-type="rich_text" hct-title='متن دوم'>
                            زیر ابزار نوار جستجو، گروه بندی کالا قرار دارد که با قرار دادن نشانگر موس بر روی هر یک از
                            آنها، دسته بندی محصولات مرتبط آن گروه کالا نمایش داده می‌شود.
                            سپس باکلیک کردن بر روی دسته بندی‌های کالا، شما به صفحه‌ی جستجوی پیشرفته منتقل می‌شوید که
                            می‌توانید بر اساس سازنده، نوع یا رنگ جستجوی خود را محدود کنید.
                            در مراحل بعدی، می‌توانید از ابزار جستجوی پیشرفته سایت استفاده کنید و با انتخاب
                            ویژگیهایی که برای شما اهمیت بیشتری دارند در کنار محدود کردن دامنه قیمت کالا، کالای مطلوب
                            خود را راحت‌تر انتخاب کنید.</p>
                        <div class="guide-pic">
                            <img src="/HCMS-assets/img/guide2.jpg" alt="راهنمای خرید" class="img-fluid"
                                 hct-content="guide_2" hct-title='راهنمای خرید' hct-content-type="image">
                        </div>
                    </div>
                </li>
                <li>
                    <h2 class="title" hct-content="add_to_card_title" hct-content-type="text" hct-title='عنوان دوم'>
                        اضافه کردن کالا به سبد خرید</h2>
                    <div class="desc">
                        <p hct-content="add_to_card_short_content" hct-content-type="text" hct-title='متن کوتاه'>پس از
                            انتخاب کالایی که تصمیم نهایی برای خرید آن دارید، با کلیک کردن بر روی گزینه اضافه به سبد
                            خرید، وارد صفحه سبد خرید می‌شوید. اگر قصد خرید کالاهای بیشتری را دارید، آنها را نیز به سبد
                            خرید خود اضافه کنید تا به صورت یک سفارش برای شما پردازش و ارسال شوند.</p>
                        <div class="guide-pic">
                            <img src="/HCMS-assets/img/guide3.jpg" alt="راهنمای خرید" class="img-fluid"
                                 hct-content="guide_3" hct-title='راهنمای خرید' hct-content-type="image">
                        </div>
                        <p hct-content="add_to_card_content" hct-content-type="rich_text" hct-title="متن"></p>
                    </div>
                </li>
                <li>
                    <h2 class="title" hct-content="finalize_buying_title" hct-content-type="text" hct-title='عنوان سوم'>
                        نهایی کردن خرید</h2>
                    <div class="desc">
                        <p hct-content="finalize_buying_short_content" hct-content-type="text" hct-title="متن کوتاه">پس
                            از انتخاب کالاهای موردنظر و اضافه کردن آنها به سبد خرید، باید سفارش خود را طی 4 مرحله زیر
                            تکمیل و نهایی کنید:</p>
                        <div class="guide-pic">
                            <img src="/HCMS-assets/img/guide4.jpg" alt="راهنمای خرید" class="img-fluid"
                                 style="max-width:70%;margin:30px auto"
                                 hct-content="guide_4" hct-title='راهنمای خرید' hct-content-type="image">
                        </div>
                        <p hct-content="finalize_buying_content" hct-content-type="rich_text" hct-title="متن">اگر بدون
                            وارد شدن در سایت کالاهای موردنظرتان را به سبد خرید اضافه کرده باشید، باید در مرحله "ورود"
                            با وارد کردن نام کاربری و رمز عبور خود، وارد سایت ‌شوید. اگر قبلاً حساب کاربری نداشته‌اید
                            می‌توانید به راحتی در چند ثانیه و با وارد کردن ایمیل و مشخصات خود، ابتدا عضو سایت شده و
                            سپس سبد خرید خود را ثبت کنید. سپس با طی مراحل بعدی، سفارش شما ثبت و آماده پردازش خواهد
                            شد.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
