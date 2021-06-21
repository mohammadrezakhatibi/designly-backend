@include('admin.layouts.header')
@yield('modal')
<div class="wrapper">
    <div class="general">
        @yield('sidebar')
        @yield('top_header')
        @yield('content')


        <div class="clr"></div>
    </div>
</div>

@yield('bottom_script')
</body>
</html>
