@if($category_child->getChilds() != null)
<ul>
    @foreach ($category_child->getChilds() as $category_child)
        <li>
            <a href="">
                {{ $category_child->name }}
                @include('layouts.menu_dequy')
            </a>
        </li>
    @endforeach
</ul>
@endif