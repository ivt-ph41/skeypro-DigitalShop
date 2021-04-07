<ul>
    @if ($category->getChilds() != null)

        @foreach ($category->getChilds() as $category)
            <li>
                <span>
                    <a href="" style='background:none; color:black'>
                        {{ $category->name }}
                    </a>
                </span>
            </li>
        @endforeach
    @endif
</ul>
