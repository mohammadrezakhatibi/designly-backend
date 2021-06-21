@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('script')
    <script>
        $(document).ready(function(){
            $('.dropdown').dropdown();
        });
    </script>
@endsection
@section('sidebar')
    @parent
    @include('admin.layouts.sidebar')
@endsection
@section('top_header')
    @parent
    @include('admin.layouts.top_header')
@endsection
@section('modal')
@endsection
@section('content')
    @parent
    <div class="general-content">
        @include('layouts.messages')
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            @foreach($sources as $source)
                <tr id="{{ $source->id }}">
                    <td>{{ $source->title }}</td>
                    <td>{{ $source->description }}</td>
                </tr>
            @endforeach
        </table>            
        @include('admin.layouts.pagination', ['paginator' => $sources])
    </div>
@endsection
