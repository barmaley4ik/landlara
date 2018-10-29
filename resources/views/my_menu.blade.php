<ul class="header-nav">
    @foreach($items as $menu_item)
        <li><a class="smoothscroll" href="{{ $menu_item->link() }}" title="{{ $menu_item->getTranslatedAttribute('title', app()->getLocale() , 'ru' ) }}">{{ $menu_item->getTranslatedAttribute('title', app()->getLocale() , 'ru' )}}</a></li>
    @endforeach
</ul>