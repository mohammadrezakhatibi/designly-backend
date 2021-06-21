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

<div class="ui link cards">
        @foreach($posts as $post)
            <div class="card">
                <div class="image" style="background-image: url('{{ $post->image_url }}');width:100%;height:200px;background-position: center; background-size: cover;">
                </div>
                <div class="content">
                <div class="header">{{ $post->title }}</div>
                <div class="meta">
                    <a>{{ $post->source->title }}</a>
                </div>
                <div class="description">
                    Matthew is an interior designer living in New York.
                </div>
                </div>
                <div class="extra content">
                <span class="right floated">
                    <a>{{ $post->category->title }}</a>
                </span>
                <span>
                    <i class="user icon"></i>
                    <a>{{ $post->creator }}</a>
                </span>
                </div>
            </div>
        @endforeach
</div>
            
        @include('admin.layouts.pagination', ['paginator' => $posts])
    </div>
@endsection
