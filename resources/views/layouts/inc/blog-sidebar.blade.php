<aside class="sidebar-cat">
    <div class="sidebar-cat-header">
        <h3>Categories</h3>
    </div>
    <div class="sidebar-cat-content">
        <ul class="sidebar-cat-list">
            @foreach($categories as $category)
                <li><a href="{{ url('/category/' . $category->slug)  }}">{{ $category->title }}</a>
                    <span class="move-right">
                        {{ $count }}
                        {{--{{ $category->posts->count() }}--}}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</aside>