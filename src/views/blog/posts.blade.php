@extends('blog::layout.master')

@section('title')

@stop

@section('content')
    <div class="blogs">
        @foreach($blogs as $blog)
            <div class="blog">
                <a href="{{route('blog::show_blog', [$blog->slug]) }}">{{ $blog['title'] }}</a>
                <p>{{ substr($blog['body'], 0, 80) }}...</p>
            </div>
        @endforeach
    </div>
@stop
