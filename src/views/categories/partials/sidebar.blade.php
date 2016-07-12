<?php $level = 0 ?>

@inject('categoryRepo', 'Lembarek\Core\Repositories\CategoryRepository')
<?php $categories = $categoryRepo->where(['parent' => 0])->get(); ?>

<div class="sidebar col-md-3">
<ul class="nav nav-sidebar">
    @include('blog::categories.partials.categories')
</ul>
</div>
