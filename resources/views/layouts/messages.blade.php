@if(session()->has('message'))
    <div class="ui positive message">
        <p>{{ session()->get('message') }}</p>
    </div>
@endif
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