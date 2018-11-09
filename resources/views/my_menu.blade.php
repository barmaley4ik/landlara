<ul class="header-nav" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
    @foreach($items as $menu_item)
        <li itemprop="name"><a itemprop="url" class="smoothscroll" href="{{ $menu_item->link() }}" title="{{ $menu_item->getTranslatedAttribute('title', app()->getLocale() , 'ru' ) }}">{{ $menu_item->getTranslatedAttribute('title', app()->getLocale() , 'ru' )}}</a></li>
    @endforeach
</ul>