@extends('_base')

@section('title')
    پروفایل - ویرایش -
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

    <?php $edit_allowed = customer_can_edit_profile(); ?>
    <script>window.currentPage = "profile-edit"</script>
    <div class="container profile-edit" id="address-module">
        <div class="icon-title">
            <i class="icon-login" aria-hidden="true"></i><span>ویرایش پروفایل</span>
        </div>

        <div class="top-line-content">
            <form action="{{route('customer.profile.update')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control" name="name" placeholder="نام"
                                   value="{{old('name',  $user->name)}}" {{$edit_allowed ? "" : "readonly"}}>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="family">نام خانوادگی</label>
                            <input type="text" class="form-control" name="family" placeholder="نام خانوادگی"
                                   value="{{old('family', $user->family)}}" {{$edit_allowed ? "" : "readonly"}}>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="email">پست الکترونیک</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="پست الکترونیک"
                                   value="{{old('email', $user->email)}}" @if($user->hasEmail()) disabled @endif>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="national_code">کدملی<span class="required">*</span></label>
                            <input type="text" class="form-control number-control" name="national_code"
                                   id="national_code" placeholder="کد ملی خود را بنویسید"
                                   {{$edit_allowed ? "" : "readonly"}}
                                   value="{{old('national_code', $customer->national_code)}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="phone">تلفن همراه</label>
                            <input type="text" class="form-control number-control" id="phone" name="phone"
                                   placeholder="این فیلد قابل تغییر نمی‌باشد"
                                   value="{{$customer->main_phone}}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            @if($user->birthday_str != null)
                                <?php $birthday = explode('/', $user->birthday_str); ?>
                            @endif
                            <label for="secondary_phone">تاریخ تولد</label>
                            <div class="birth-date">
                                <select class="form-control" name="birthday_day">
                                    <option>روز</option>
                                    @for($i=1; $i<=31; $i++)
                                        <option
                                                value="{{$i}}"
                                                @if(($user->getBirthdayDay() == $i) or (old('birthday_day') == $i)) selected @endif>
                                            {{$i}}
                                        </option>
                                    @endfor
                                </select>
                                <select class="form-control" name="birthday_month">
                                    <option>ماه</option>
                                    @foreach(get_months() as $key => $month)
                                        <option
                                                value="{{$key+1}}"
                                                @if(($user->getBirthdayMonth() == $key+1) or (old('birthday_month') == $key+1)) selected @endif>
                                            {{$month}}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="birthday_year">
                                    <option>سال</option>
                                    @foreach(get_years() as $year)
                                        <option
                                                value="{{$year}}"
                                                @if(($user->getBirthdayYear() == $year) or (old('birthday_year') == $year)) selected @endif>
                                            {{$year}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>جنسیت</label>
                            <div class="radio">
                                <div class="radio-group">
                                    <input type="radio" name="gender" id="gender_male" value="{{Gender::MALE}}"
                                           @if($user->gender == Gender::MALE) checked @endif>
                                    <label for="gender_male" class="radiobtn">
                                        <span>@lang('general.gender.'.Gender::MALE)</span>
                                    </label>
                                </div>
                                <div class="radio-group">
                                    <input type="radio" name="gender" id="gender_female" value="{{Gender::FEMALE}}"
                                           @if($user->gender == Gender::FEMALE) checked @endif>
                                    <label for="gender_female" class="radiobtn">
                                        <span>@lang('general.gender.'.Gender::FEMALE)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>اشتراک در خبرنامه ابزارمبل مهدی(خواجه لو)</label>
                            <div class="radio">
                                <div class="radio-group">
                                    <input type="radio" name="newsletter" id="yes" value="بله">
                                    <label for="yes" class="radiobtn"><span>بله</span></label>
                                </div>
                                <div class="radio-group">
                                    <input type="radio" name="newsletter" id="no" value="خیر">
                                    <label for="no" class="radiobtn"><span>خیر</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="bank_account_card_number">شماره کارت بانکی</label>
                            <input type="text" class="form-control number-control" id="bank_account_card_number"
                                   name="bank_account_card_number"
                                   value="{{old('bank_account_card_number') ?: $customer->bank_account_card_number}}">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="bank_account_uuid">شماره شبا بانکی</label>
                            <input type="text" class="form-control number-control" id="bank_account_uuid"
                                   name="bank_account_uuid"
                                   value="{{old('bank_account_uuid') ?: $customer->bank_account_uuid}}">
                        </div>
                    </div>
                </div>
                <?php $is_legal_person_checked = session()->has("is_legal_person") ?
                    session()->get("is_legal_person") : 0;?>
                @if(!$customer->is_legal_person and !$is_legal_person_checked)
                    <button type="submit" class="btn submit" data-text="ذخیره اطلاعات"><span
                                class="text">ذخیره اطلاعات</span></button>
                @endif
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 space">
                        <hr/>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="checkbox-lb filled">
                                <input class="form-control virt-form" name="set_legal_person" type="checkbox" value="1"
                                       data-action="{{route('customer.profile.set-legal-person')}}"
                                       data-method="POST"
                                       @if($customer->is_legal_person or $is_legal_person_checked) checked @endif>
                                مایل به تکمیل اطلاعات حقوقی برای خرید سازمانی هستم.
                                <span class="bg-checked"></span>
                            </label>
                        </div>
                    </div>

                    @if($customer->is_legal_person or $is_legal_person_checked)
                        <?php $legalInfo = $customer->legalInfo; ?>

                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="company_name">نام شرکت</label>
                                <input type="text" class="form-control" id="company_name" placeholder="نام شرکت"
                                       name="company_name"
                                       @if($customer->is_legal_person) value="{{old('company_name', $legalInfo->company_name)}}"
                                       @else value="{{old('company_name')}}" @endif>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="economical_code">کد اقتصادی</label>
                                <input type="text" class="form-control number-control"
                                       id="economical_code" placeholder=""
                                       name="economical_code"
                                       @if($customer->is_legal_person) value="{{old('economical_code', $legalInfo->economical_code)}}"
                                       @else value="{{old('economical_code')}}" @endif>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="national_id">شناسه ملی</label>
                                <input type="text" class="form-control number-control"
                                       id="national_id" placeholder=""
                                       name="national_id"
                                       @if($customer->is_legal_person) value="{{old('national_id', $legalInfo->national_id)}}"
                                       @else value="{{old('national_id')}}" @endif>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="registration_code">شماره ثبت</label>
                                <input type="text" class="form-control number-control"
                                       id="registration_code" placeholder=""
                                       name="registration_code"
                                       @if($customer->is_legal_person) value="{{old('registration_code', $legalInfo->registration_code)}}"
                                       @else value="{{old('registration_code')}}" @endif>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="company_phone">تلفن ثابت</label>
                                <input type="text" class="form-control number-control" id="company_phone"
                                       placeholder="کد شهر الزامی است" name="company_phone"
                                       @if($customer->is_legal_person) value="{{old('company_phone', $legalInfo->company_phone)}}"
                                       @else value="{{old('company_phone')}}" @endif>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="secondary_phone">محل شرکت</label>
                                <div class="office-location">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="state_id" placeholder="استان"
                                               @if($customer->is_legal_person) value="{{old('state_id', $legalInfo->state_id)}}"
                                               @else value="{{old('state_id')}}" @endif
                                               id="state-selector"
                                               data-url="{{route('api.v1.location.get-states')}}"
                                               @if($customer->is_legal_person )
                                               data-initial-value='{{get_state_json_by_id(old('state_id', $legalInfo->state_id))}}'
                                               @else data-initial-value="{{get_state_json_by_id(old('state_id'))}}" @endif >

                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city_id" placeholder="شهر"
                                               @if($customer->is_legal_person) value="{{old('city_id', $legalInfo->city_id)}}"
                                               @else value="{{old('city_id')}}" @endif
                                               id="city-selector"
                                               data-url-base="{{route('api.v1.location.get-cities')}}"
                                               @if($customer->is_legal_person)
                                               data-initial-value='{{get_city_json_by_id(old('city_id', $legalInfo->city_id))}}'
                                               @else data-initial-value="{{get_city_json_by_id(old('city_id'))}}" @endif >
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @if($customer->is_legal_person or $is_legal_person_checked)
                    <button type="submit" class="btn submit" data-text="ذخیره اطلاعات">
                        <span class="text">ذخیره اطلاعات</span></button>
                @endif
            </form>
        </div>
    </div>
@endsection