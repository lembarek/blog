@extends('blog::layout.master')

@section('title')

@stop

@section('content')
    <div class="posts">
        @foreach($posts as $post)
            <div class="post">
                <a href="{{ route('blog::show_post', [$post->slug]) }}">{{ $post['title'] }}</a>
                <p>{{ substr($post['body'], 0, 80) }}...</p>
            </div>
        @endforeach
    </div>
@stop
