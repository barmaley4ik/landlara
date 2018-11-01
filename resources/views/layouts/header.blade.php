<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ $landing->getTranslatedAttribute('title', app()->getLocale() , 'ru')}}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ $landing->getTranslatedAttribute('keywords', app()->getLocale() , 'ru')}}">
        <meta name="description" content="{{ $landing->getTranslatedAttribute('description', app()->getLocale() , 'ru') }}">
        <meta name="robots" content="{{ $landing->robots }}">
        <meta charset="utf-8">
        <meta property="og:title" content="{{ $landing->getTranslatedAttribute('title', app()->getLocale() , 'ru')}}"/>
        <meta property="og:description" content="{{ $landing->getTranslatedAttribute('description', app()->getLocale() , 'ru') }}"/>
        <meta property="og:image" content="{{ Voyager::image($landing->thumbnail('cropped_fb', 'logo')) }}"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content= "{{ URL::to('/') }}" />        
        <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "WebSite",
              {{-- "name": "{{ $landing->name }}", --}}
              "name" : "{{ $landing->getTranslatedAttribute('name', app()->getLocale() , 'ru')}}",
              "alternateName": "{{ $landing->getTranslatedAttribute('title', app()->getLocale() , 'ru')}}",
              "description": "{{ $landing->getTranslatedAttribute('description', app()->getLocale() , 'ru') }}",
              @if ($landing->logo)
              "logo": "{{ Storage::disk('public')->url($landing->logo) }}",
              @endif
              @if (isset($socials))
              "url": "{{ URL::to('/') }}",
              "sameAs": [ 
			  {!! $socials !!} 
                        ]
              @else
              "url": "{{ URL::to('/') }}" 
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
      {{-- <link href="{{ asset('css/vendor.css') }}" rel="stylesheet"> --}}
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
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/modernizr.js') }}"></script>
    {{-- <script src="{{ asset('js/pace.min.js') }}"></script> --}}
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">{!! $landing->script !!}</script>
  </body>
</html>