@extends('blog::layout.master')

@section('title')
    {{ $page->title }}
@stop

@section('content')

    <div class="body">
        {{ $page->body }}
    </div>

@stop
