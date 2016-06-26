@extends('blog::layout.master')

@section('title')
    {{ $post['title'] }}
@stop

@section('content')

    <div class="container">
      <div class="post-header">
        <h1 class="post-title">{{ $post['title'] }}</h1>
        <h5>{{ $post->published_at->format('M jS Y g:ia') }}</h5>
        <p class="lead post-description">{{$post['description'] }} </p>
      </div>

      <div class="row">

        <div class="col-sm-8 post-main">
          <div class="post-post">
                <hr>
                {!! nl2br(e($post['body'])) !!}
                <hr>
          </div>
        </div>
      </div>

      @include('blog::blog.partials.tags')
    </div>

@stop
