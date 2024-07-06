@extends('_base_app')

@section('title')
    {{ $web_page->getSeoTitle() }} -
@endsection

@section('main_content')
    <script>window.currentPage = "contact"</script>
    <div class="container contact-page p-4">
        <div class="top-line-content">
            <div class="desc" hct-content="description" hct-content-type="rich_text" hct-title="توضیحات">
                <p>لطفا برای تماس با ما و یا <b>ثبت شکایات</b> خود از راه های ارتباطی زیر استفاده کنید.</p>
            </div>
            <form hct-form="contact-form" hct-title="ارتباطات عمومی">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">نام و نام خانوادگی<span class="required">*</span></label>
                            <input hct-form-field type="text" class="form-control" name="name" placeholder="نام"
                                   hct-validation="required" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل<span class="required">*</span></label>
                            <input hct-form-field type="email" class="form-control" name="email" placeholder="مثال : test@example.com"
                                   hct-validation="required"
                                   value="{{old('email')}}" style="direction: ltr;text-align: left;">
                        </div>
                        <div class="form-group">
                            <label for="mobile">تلفن همراه<span class="required">*</span></label>
                            <input hct-form-field type="tel" class="form-control" name="mobile"
                                   hct-validation="required|regex:/0[1-9][0-9]{9}/|max:11"
                                   placeholder=""
                                   value="{{old('main_phone')}}" style="direction: ltr;text-align: left;">
                        </div>

                        <div class="form-group captcha">
                            {!! Recaptcha::render() !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="subject">موضوع<span class="required">*</span></label>
                            <input hct-form-field type="text" class="form-control" name="subject" placeholder="موضوع"
                                   value="{{old('name')}}" hct-validation="required">
                        </div>

                        <div class="form-group">
                            <label for="message">متن پیام<span class="required">*</span></label>
                            <textarea hct-form-field class="form-control" name="message" rows="12"
                                      hct-validation="required" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn submit" data-text="ارسال پیام"><span class="text">ارسال پیام</span></button>
            </form>
            <div id="map"></div>
        </div>
        <div class="contact-info">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="icon">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="desc number" hct-content="phone_number" hct-content-type="text" hct-title='تلفن'>
                        ۰۲۱-۲۲۶۹۴۹۹۹<br/>
                        ۰۲۱-۷۲۱۱۳
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 hidden-xs">
                    <div class="icon">
                        <i class="icon-placeholder"></i>
                    </div>
                    <div class="desc" hct-content="address_1" hct-content-type="text" hct-title='آدرس اول'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،

                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="icon">
                        <i class="icon-mail"></i>
                    </div>
                    <div class="desc" hct-content="email" hct-content-type="text" hct-title='ایمیل'> info@abzarmoblmahdi.com
                    </div>
                </div>
                <div class="col-xs-12 hidden-xl hidden-lg hidden-md hidden-sm">
                    <div class="icon">
                        <i class="icon-placeholder"></i>
                    </div>
                    <div class="desc" hct-content="address_2" hct-content-type="text" hct-title='آدرس دوم'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
