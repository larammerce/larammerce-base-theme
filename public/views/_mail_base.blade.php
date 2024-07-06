<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.ord/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title')</title>

    <style>
        @font-face {
            font-family: IRANSans;
            font-style: normal;
            font-weight: normal;
            src: url('http://cdn.hinzaco.com/fonts/iransans/eot/IRANSansWeb.eot');
            src: url('http://cdn.hinzaco.com/fonts/iransans/eot/IRANSansWeb.eot?#iefix') format('embedded-opentype'),
                /* IE6-8 */ url('http://cdn.hinzaco.com/fonts/iransans/woff2/IRANSansWeb.woff2') format('woff2'),
                /* FF39+,Chrome36+, Opera24+*/ url('http://cdn.hinzaco.com/fonts/iransans/woff/IRANSansWeb.woff') format('woff'),
                /* FF3.6+, IE9, Chrome6+, Saf5.1+*/ url('http://cdn.hinzaco.com/fonts/iransans/ttf/IRANSansWeb.ttf') format('truetype');
        }

        body * {
            font-family: IRANSans, sans-serif;
            font-weight: lighter;
        }
    </style>
</head>

<body style="color: #2a2a2a; font-family: Arial, sans-serif; font-size: 18px; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; line-height: 18px; margin: 0 0 20px; padding: 0;">
<div style="background-color: #eae9ea;">
    <!--[if mso]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#eae9ea"></v:fill>
    </v:background><![endif]-->
</div>
<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#eae9ea"
       style="border-collapse: collapse; direction: rtl;">
    <tr>
        <td valign="top" align="center" style="border-collapse: collapse;padding-top: 20px;">
            <table width="480" cellspacing="0" cellpadding="0" border="0" class="main"
                   style="border-collapse: collapse; margin-left: 30px; margin-right: 30px;">
                <tr>
                    <td style="font-size:10px;color:#3C3C3A;text-align:right;direction:rtl;">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        بهتر
                    </td>
                    <td style="font-size:10px;color:#3C3C3A;text-align:left;">www.abzarmoblmahdi.com</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" align="center" style="border-collapse: collapse;">
            <table width="480" cellspacing="0" cellpadding="0" border="0" class="main"
                   style="border-collapse: collapse; margin-left: 30px; margin-right: 30px;">
                <tr>
                    <td align="left" class="min_width" style="border-collapse: collapse; width: 480px;">

                        <!-- BODY SECTION -->

                        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff"
                               style="border-collapse: collapse; margin-top: 0;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;overflow: hidden;-webkit-box-shadow: #dadada 3px 5px 20px 0px;-moz-box-shadow: #dadada 3px 5px 20px 0px;box-shadow: #dadada 3px 5px 20px 0px;">
                            <tr style="background:#52524F;padding:30px">
                                <td>
                                    <img src="https://abzarmoblmahdi.com/HCMS-assets/img/logo-single-color.png"
                                         style="display: table;width: 150px;max-width: 150px;margin:40px auto 15px;"
                                         alt="abzarmoblmahdi">
                                    <p style="color: #fff; font-size: 20px; font-weight: bold; text-align: center; margin-bottom:30px; font-weight: lighter;">@yield('subject')</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="border-collapse: collapse;">

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0"
                                           style="border-collapse: collapse;">
                                        <tr style="margin: 0; padding: 0;">
                                            <td align="center"
                                                style="border-collapse: collapse; border-spacing: 0; padding: 50px;">

                                                @yield('content')

                                                <div style="width: 100px; margin: 35px 0px; border: 1px solid #e9e9e9;"></div>

                                                <p style="font-size: 14px; line-height: 22px; margin: 0; padding: 0;">
                                                    با تشکر
                                                </p>

                                                <p style="font-size: 16px; font-weight: bold; line-height: 22px; margin: 10px 0 0; padding: 0;">
                                                    تیم پشتیبان ابزارمبل مهدی(خواجه لو)
                                                </p>


                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>


                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="footer"
                               style="border-collapse: collapse;">
                            <tr>
                                <td align="center" class="footer" style="border-collapse: collapse; padding: 30px;">
                                    <p style="font-size: 13px; font-family: Arial, sans-serif; color: #000001; line-height: 18px; margin: 0; padding: 0;">
                                        <a class="footer-link" target="_blank"
                                           href="{{ env('APP_URL') }}/contact-us"
                                           style="color: #2a2a2a; text-decoration: none;"> تماس با ما </a> |
                                        <a class="footer-link" target="_blank"
                                           href="{{ env('APP_URL') }}/rules"
                                           style="color: #2a2a2a; text-decoration: none;">قوانین و مقررات</a> |
                                        <a class="footer-link" target="_blank"
                                           href="{{ env('APP_URL') }}/privacy"
                                           style="color: #2a2a2a; text-decoration: none;">حریم خصوصی</a> |
                                        <a class="footer-link" target="_blank"
                                           href="{{ env('APP_URL') }}/faq"
                                           style="color: #2a2a2a; text-decoration: none;">سوالات متداول</a>
                                    </p>
                                    <table width="200" cellspacing="0" cellpadding="0" border="0"
                                           style="border-collapse: collapse; margin: 30px 0;">
                                        <tr>
                                            <td align="right" width="30" style="border-collapse: collapse;">
                                                <a href="https://www.facebook.com/abzarmoblmahdi"
                                                   style="color: #000001; text-decoration: none;">
                                                    <img src="http://email-media.s3.amazonaws.com/indiegogo/assets/facebook.png"
                                                         width="25" style="display: block; border: none;"></a>
                                            </td>
                                            <td align="right" width="30" style="border-collapse: collapse;">
                                                <a href="#"
                                                   style="color: #000001; text-decoration: none;">
                                                    <img src="http://email-media.s3.amazonaws.com/indiegogo/assets/twitter.png"
                                                         width="25" style="display: block; border: none;"></a>
                                            </td>
                                            <td align="right" width="30" style="border-collapse: collapse;">
                                                <a href="https://plus.google.com/u/5/114340005704133838729"
                                                   style="color: #000001; text-decoration: none;">
                                                    <img src="http://email-media.s3.amazonaws.com/indiegogo/assets/gplus.png"
                                                         width="25" style="display: block; border: none;"></a>
                                            </td>
                                            <td align="right" width="30" style="border-collapse: collapse;">
                                                <a href="#"
                                                   style="color: #000001; text-decoration: none;">
                                                    <img src="http://email-media.s3.amazonaws.com/indiegogo/assets/rss.png"
                                                         width="25" style="display: block; border: none;"></a>
                                            </td>
                                            <td align="right" width="30" style="border-collapse: collapse;">
                                                <a href="mailto:support@abzarmoblmahdi.com"
                                                   style="color: #000001; text-decoration: none;">
                                                    <img src="http://email-media.s3.amazonaws.com/indiegogo/assets/mail.png"
                                                         width="25" style="display: block; border: none;"></a>
                                            </td>
                                        </tr>
                                    </table>
                                    <p style="font-size: 13px; color: #000001; line-height: 18px; margin: 0; padding: 0;">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<center>
    <p style="font-size: 13px; font-family: Arial, sans-serif; color: #000001;">
        <a href="https://abzarmoblmahdi.com/contact-us#unsubscribe" style="color: #000001;">
            ایمیل اشتباه دریافت کرده اید ؟
        </a>
    </p>
</center>
</body>
</html>
