<li
id="category-{{$category->id}}"
data-parent="category-{{$category->parent}}"
class="{{$level == '0'? 'show': 'hide'}} category-level-{{$level++}}"
>
@if(count($category->childrenCategories()))
<a>{{ $category->name }}</a>
@else
<a href={{ route('blog::categories.posts', ['category' => $category->name]) }}>{{ $category->name }}</a>
@endif
</li>
@if(count($category->childrenCategories()))
    <ul class="hide nav nav-sidebar" data-parent="category-{{$category->id}}">
        @include('blog::categories.partials.categories', ['categories' => $category->childrenCategories()])
    </ul>
@endif
<?php $level--; ?>
