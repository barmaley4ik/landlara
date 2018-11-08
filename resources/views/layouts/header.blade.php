<!-- preloader
      ================================================== -->
<div id="preloader">
    <div id="loader" class="dots-jump">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- header
================================================== -->
<header class="s-header">

    <div class="row">
        <div class="header-logo">
            <a class="site-logo" href="/"><img src="{{ Voyager::image($landing->thumbnail('cropped_logo', 'logo')) }}" title="{{$landing->title_image}}" alt="{{$landing->alt_image}}"></a>
        </div>

        <nav class="header-nav-wrap">
            {{ menu('landing', 'my_menu') }}
        </nav> <!-- end header-nav-wrap -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </div> <!-- end row -->

</header> <!-- end s-header -->