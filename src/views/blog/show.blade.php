@extends('blog::layout.master')

@section('title')
    {{ $post['title'] }}
@stop

@section('content')

    <div class="container">
      <div class="post-header">
        <h1 class="post-title">{{ $post['title'] }}</h1>
        <p class="lead post-description">{{$post['description'] }} </p>
      </div>

      <div class="row">

        <div class="col-sm-8 post-main">
          <div class="post-post">
                {{ $post['body'] }}
          </div>
        </div>
      </div>
    </div>

@stop
