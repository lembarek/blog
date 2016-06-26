<div class="tags">
    @foreach($post->tags as  $tag)
        <span class="tag">{{ $tag->name }}</span>
    @endforeach
</div>
