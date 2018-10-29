<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ $landing->title }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ $landing->keywords }}">
        <meta name="description" content="{{ $landing->description }}">
        <meta name="robots" content="{{ $landing->robots }}">
        <meta charset="utf-8">
        <meta property="og:title" content="{{ $landing->title }}"/>
        <meta property="og:description" content="{{ $landing->description }}"/>
        <meta property="og:image" content="{{ Voyager::image($landing->thumbnail('cropped_fb', 'logo')) }}"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content= "{{ env('APP_URL') }}" />        
        <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "WebSite",
              "name": "{{ $landing->name }}",
              "alternateName": "{{ $landing->title }}",
              "description": "{{ $landing->description }}",
              @if ($landing->logo)
              "logo": "{{ Storage::disk('public')->url($landing->logo) }}",
              @endif
              @if (isset($socials))
              "url": "{{ env('APP_URL') }}",
              "sameAs": [ 
			  {!! $socials !!} 
                        ]
              @else
              "url": "{{ env('APP_URL') }}" 
              @endif
}     

      </script> 



      <link rel="icon" href="{{ Storage::disk('public')->url($landing->favicon) }}" type="image/png" />

  <!--    <link rel="shortcut icon" href="//upst.fwdcdn.com/favicon-v3.ico" type="'image/x-icon"/>-->
      <!-- For iPhone 4 Retina display: -->
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ Storage::disk('public')->url($landing->favicon) }}">
      <!-- For iPad: -->
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ Voyager::image($landing->thumbnail('medium', 'favicon')) }}">
      <!-- For iPhone: -->
      <link rel="apple-touch-icon-precomposed" href="{{ Voyager::image($landing->thumbnail('small', 'favicon')) }}">
      <!--Fonts -->
      

      <!-- Styles -->
      <link href="{{ asset('css/base.css') }}" rel="stylesheet">
      <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
      <link href="{{ asset('css/mainlandin.css') }}" rel="stylesheet">
      <style>
      </style>
  </head>
  <body id="top">
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
                  <a class="site-logo" href="/"><img src="{{ Voyager::image($landing->thumbnail('medium', 'logo')) }}" title="{{$landing->title_image}}" alt="{{$landing->alt_image}}"></a>
              </div>
              
              <nav class="header-nav-wrap">
                  {{ menu('landing', 'my_menu') }}
              </nav> <!-- end header-nav-wrap -->
              
              <a class="header-menu-toggle" href="#0">
                  <span class="header-menu-icon"></span>
              </a>

          </div> <!-- end row -->

      </header> <!-- end s-header -->
      @yield('content')


    <!-- footer
    ================================================== -->
    <footer>
        <div class="row">
            <div class="col-full cl-copyright">
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
            </div>
        </div>

        <div class="cl-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>
    </footer>


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div><!-- end photoSwipe background -->
      <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
      <script src="{{ asset('js/modernizr.js') }}"></script>
      <script src="{{ asset('js/pace.min.js') }}"></script>
      <script src="{{ asset('js/plugins.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>