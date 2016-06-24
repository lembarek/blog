@can('add-comment')
<form action="{{ route('blog::add-comment') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <input type="textarea" name="comment">
    <input type="hidden" name="parent_id" value="0">
    <input type="submit" name="submit" value="{{ trans('blog::blog.add-comment') }}" />
</form>
@endcan
