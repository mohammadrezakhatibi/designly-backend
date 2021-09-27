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
        <div id="post-single">

            <form class="ui form" action="{{ route('admin.post.add') }}" method="POST">
                <div class="meta">

                </div>
                {{ csrf_field() }}
                <div class="attribute">
                    <div class="field">
                        <label>Post title</label>
                        <input type="text" placeholder="Prodcut name" value="" name="name">
                    </div>
                    <div class="field">
                        <label>Category</label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="category">
                            <i class="dropdown icon"></i>
                            <div class="default text">Category</div>
                            <div class="menu">
                                @foreach($categories as $category)
                                    <div class="item" data-value="{{ $category->id }}">{{ $category->title }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Source</label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="source">
                            <i class="dropdown icon"></i>
                            <div class="default text">Source</div>
                            <div class="menu">
                                @foreach($sources as $source)
                                    <div class="item" data-value="{{ $source->id }}">{{ $source->title }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Creator</label>
                        <input type="text" placeholder="Creator" value="" name="creator">
                    </div>
                    <div class="field">
                        <label>Link</label>
                        <input type="text" placeholder="Link" value="" name="link">
                    </div>
                    <div class="field">
                        <label>Is external link?</label>
                        <input type="text" placeholder="Is external link?" value="0" name="is_external_link">
                    </div>
                    <div class="field">
                        <label>Description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <button class="ui button green left" id="submit" >
                        <i class="edit icon"></i>
                        Add Post
                    </button>

                </div>
            </form>
            <div class="clr"></div>

        </div>
    </div>
@endsection