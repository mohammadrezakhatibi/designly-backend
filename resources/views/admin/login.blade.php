@section('title', 'ورود')
@include('layouts.header')
<div class="wrapper">
    <div id="verify">
        @if ($errors->any())
            <div class="ui error message">
                <div class="header">
                    {{ trans('message.error') }}
                </div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="verify-box login">
            @if (Auth::guest())
                <div class="ctn">

                    <p>Enter your email</p>
                    {{ Form::open(['class' => 'ui form', 'route' => 'login','method' => 'post']) }}

                    <div class="field">
                        <input id="email" placeholder="Email" type="text" name="email">
                    </div>
                    <div class="field">
                        <input id="password" placeholder="xxxxxxxxxx" type="password" name="password">
                    </div>
                    <button id="submit" type="submit" class="ui primary button">
                        Login
                    </button>
                    {{ Form::close() }}
                </div>
                <div class="ctn-img">
                    <img src="" alt="logo"/>
                </div>
            @endif
        </div>
        <p class="copyright">All rights reserved for Designly.com</p>
    </div>
</div>
</body>
</html>

