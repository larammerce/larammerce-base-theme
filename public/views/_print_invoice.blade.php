<div id="factor" class="d-none">
    <div class="container preinvoice factor">
        <div class="row preinovice-header">
            <div class="col-md-5">ابزارمبل مهدی(خواجه لو)</div>
            <div class="col-md-2 p-0">
                <div class="header-factor-title">پیش فاکتور فروش کالا</div>
            </div>
            <div class="col-md-5">
                <img src="../HCMS-assets/img/logo.svg" class="img-fluid"
                     alt="ابزارمبل مهدی(خواجه لو)"
                     style="max-width:135px;">
            </div>

        </div>
        <hr>
        <div class="row date-row">
            <div class="col-md-6 pr-md-0"> تاریخ:&nbsp;&nbsp;&nbsp;
                <span class="date-span persian-digit">{{get_current_date()}}</span></div>
            <div class="col-md-6 numerical-data pl-md-0">abzarmoblmahdi.com &nbsp;&nbsp;&nbsp; 021_72113</div>
            {{--                    <div class="col-md-6pr-md-0"> abzarmoblmahdi.com</div>--}}
        </div>
        <div class="product-list">
            <div class="pd-list-header">
                <div class="col col-lg-1 col-md-1 col-sm-1 col-1">ردیف</div>
                <div class="col col-lg-1 col-md-1 col-sm-1 col-1">تصویر</div>
                <div class="col col-lg-4">شرح کالا</div>
                <div class="col col-lg-2 col-md-2 col-sm-2 col-2">قیمت واحد <span>(تومان)</span></div>
                <div class="col col-lg-1 col-md-1 col-sm-1 col-1">تعداد</div>
                <div class="col col-lg-1 col-md-1 col-sm-1 col-1">تخفیف</div>
                <div class="col col-lg-2 col-md-2 col-sm-2 col-2">قیمت کل <span>(تومان)</span></div>
            </div>
            <div class="product-list pd-list-body mt-1" id="printable-rows-container"></div>
        </div>

        <div class="summery price-information">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 sum-invoice">
                    <div class="">
                        جمع کل خرید شما:
                        <span class="persian-digit value-part ">
                            <span class="price-data sum-without-discount"></span> تومان
                        </span>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 sum-invoice">
                    <div class="persian-digit">
                        سود شما از این خرید:
                        <span class="value-part"><span class="price-data sum-discount"></span> تومان
                        </span>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 sum-invoice">
                    <div class="persian-digit sum-payment">
                        مبلغ قابل پرداخت :
                        <span class="value-part "><span class="price-data sum-with-discount"></span>
                            تومان
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
