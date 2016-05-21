@extends('blog::layout.master')

@section('title')
    {{ $page['title'] }}
@stop

@section('content')

    <div class="container">
      <div class="blog-header">
        <h1 class="blog-title">{{ $page['title'] }}</h1>
        <p class="lead blog-description">{{$page['description'] }} </p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
          <div class="blog-post">
                {{ $page['body'] }}
          </div>
        </div>
      </div>
    </div>

@stop
