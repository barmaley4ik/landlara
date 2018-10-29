<ul class="header-nav">
    @foreach($items as $menu_item)
        <li><a class="smoothscroll" href="{{ $menu_item->link() }}" title="{{ $menu_item->title }}">{{ $menu_item->title }}</a></li>
    @endforeach
</ul>