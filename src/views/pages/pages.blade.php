@extends('blog::layout.master')

@section('title')

@stop

@section('content')
    <div class="pages">
        @foreach($pages as $page)
            <div class="page">
                <a href="{{route('blog::show_page', [$page->slug]) }}">{{ $page['title'] }}</a>
                <p>{{ substr($page['body'], 0, 80) }}...</p>
            </div>
        @endforeach
    </div>
@stop
