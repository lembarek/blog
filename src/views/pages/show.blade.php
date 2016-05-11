@extends('blog::layout.master')

@section('title')
    {{ $page->title }}
@stop

@section('content')

    <div class="page">
        <h1>{{ $page['title'] }}</h1>

        <h3>{{$page['description'] }} </h3>

        <div class="body">
            {{ $page->body }}
        </div>
    </div>

@stop
