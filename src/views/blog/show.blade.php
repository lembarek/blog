@extends('blog::layout.master')

@section('title')
    {{ $blog['title'] }}
@stop

@section('content')

    <div class="container">
      <div class="blog-header">
        <h1 class="blog-title">{{ $blog['title'] }}</h1>
        <p class="lead blog-description">{{$blog['description'] }} </p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
          <div class="blog-post">
                {{ $blog['body'] }}
          </div>
        </div>
      </div>
    </div>

@stop
