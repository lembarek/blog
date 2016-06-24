@include('blog::blog.partials.add_comment')

@foreach($post->comments as $comment)
    @include('blog::blog.partials.comment')
@endforeach
