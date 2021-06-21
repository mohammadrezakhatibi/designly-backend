@include('layouts.header')
@yield('modal')
<div class="wrapper">
    <div class="main no-sidebar">
        @yield('top_header')
        @yield('content')
        <div class="clr"></div>
    </div>

    <footer>
        <div class="container">
            <div class="ui equal width grid">
                <div class="column">
                    <p>تهران - سهرودی شمالی - پایین‌تر از خیابان بهشتی - نرسیده به چهارراه کیهان - پلاک ۳۶۴ - طبقه اول - واحد ۱76</p>
                    <p>شماره تماس: 88517022 | 88177801 | 09011765289</p>
                    <p>ما را دنبال کنید : <a href="" target="_blank"></a>
                    <p>تمامی حقوق این سایت متعلق به آبرنگ نوین می باشد</p>
                    <p>طراحی و اجرا : <a id="spod" href="http://spodcreative.com" target="_blank">اسپاد کریتــیو</a></p>
                </div>
                <div class="column">
                    <div class="ui equal width grid">
                        <div class="column">
                            <div class="menu">
                                <ul>
                                    <li><a href="http://abrangdigital.com/#contact">تماس با ما</a></li>
                                    <li><a href="http://abrangdigital.com/#contact">ثبت شکایت</a></li>
                                    <li><a href="http://abrangdigital.com/shipping.html">نحوه ارسال</a></li>
                                    <li><a href="http://abrangdigital.com/roles.html">قوانین و مقررات</a></li>

                                    @if(Auth::check())
                                        <li><a href="{{ route('tracking') }}">{{ trans('order.tracking') }}</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">ورود / ثبت‌نام</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="column">
                            <script src="https://cdn.zarinpal.com/trustlogo/v1/trustlogo.js" type="text/javascript"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@yield('bottom_script')
</body>
</html>