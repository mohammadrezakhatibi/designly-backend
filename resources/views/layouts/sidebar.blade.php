<div class="sidebar">
    <aside>
        <div class="avatar">
            @if(empty(Auth::user()->meta->avatar))
                <img src="{{ asset('theme/library/img/profile-image.png') }}" alt="avatar" />
            @else
                <img src="{{ asset('storage/avatars/'.Auth::user()->meta->avatar) }}" alt="avatar" />
            @endif
        </div>
        <div class="details">
            <p class="name">{{ Auth::user()->meta->name }}</p>
            @if(empty(Auth::user()->wallet->amount))
                <span class="wallet">موجودی شما: ۰ {{ trans('main.currency') }}</span>
            @else
                <span class="wallet">موجودی شما: {{ Abrang::PriceSeparator(Auth::user()->wallet->amount) }} {{ trans('main.currency') }}</span>
                <!--<p>{{  jDate::forge()->format('%d %B %Y',true) }}</p>-->
            @endif
            <a href="{{ route('profile') }}" class="ui compact labeled icon blue tiny button">
                <i class="user icon"></i>
                {{ trans('sidebar.profile') }}
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('order.new') }}"><i class="icon archive"></i>{{ trans('sidebar.new_order') }}</a></li>
                <li>
                    <a href="{{ route('basket') }}">
                        <i class="icon shopping bag"></i>
                        {{ trans('sidebar.basket') }}
                        <span class="count">{{ Abrang::ConvertLatinToPersianNumber(Cart::count()) }}</span>
                    </a>
                </li>
                <li><a href="{{ route('orders.list') }}"><i class="icon list ul"></i>{{ trans('sidebar.orders') }}</a></li>
                <li><a href="{{ route('tracking') }}"><i class="icon search"></i>{{ trans('sidebar.tracking') }}</a></li>
                <li><a href="{{ route('wallet') }}"><i class="icon plus"></i>{{ trans('sidebar.recharge') }}</a></li>
                <li><a href="{{ route('address') }}"><i class="icon map pin"></i>{{ trans('sidebar.addresses') }}</a></li>
                <li><a href="{{ url('/logout') }}"><i class="sign out alternate icon"></i>خروج</a></li>
            </ul>
        </nav>
        <div class="copyright">

            <script src="https://cdn.zarinpal.com/trustlogo/v1/trustlogo.js" type="text/javascript"></script>
            <p></p>
            تمام حقوق برای چاپ دیجیتال آبرنگ محفوظ است.
            <p>طراحی و ساخت: <a href="http://spodcreative.com" class="spodcreative">اســپــاد</a></p>
            <p>{{ Abrang::version() }}</p>
        </div>
    </aside>
    <div class="clr"></div>
</div>