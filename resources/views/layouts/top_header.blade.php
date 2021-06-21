<header>
    <div class="logo">
        <a href="{{ url('dashboard') }}"><img src=" {{ asset('theme/library/img/logo.png') }} " alt="logo" height="72px"/></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="http://abrangdigital.com/#contact">تماس با ما</a></li>
            <li><a href="http://abrangdigital.com/#contact">ثبت شکایت</a></li>
            <li><a href="http://abrangdigital.com/shipping.html">نحوه ارسال</a></li>
            <li><a href="http://abrangdigital.com/roles.html">قوانین و مقررات</a></li>

            @if(Auth::check() && Auth::user()->is('user'))

                <li><a href="{{ route('basket') }}"><i class="icon shopping bag"></i>سبد خرید@if(Cart::count() > 0)<span class="count">{{ Cart::content()->count() }}</span>@endif</a></li>
                <li><a href="{{ route('dashboard') }}"><i class="icon user"></i>من</a>
                    <ul>
                        <li><a href="{{ route('profile') }}">پروفایل</a></li>
                        <li><a href="{{ route('tracking') }}">{{ trans('order.tracking') }}</a></li>
                        <li><a href="{{ route('orders.list') }}">سفارشات من</a></li>
                        <li><a href="{{ route('address') }}">آدرس‌های من</a></li>
                        <li><a href="{{ url('logout') }}">خروج</a></li>
                    </ul>
                </li>

            @else
                <li><a href="{{ route('login') }}"><i class="icon user"></i>ورود / ثبت‌نام</a></li>
            @endif
        </ul>
    </div>
</header>