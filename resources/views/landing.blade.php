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

        <link rel="icon" href="{{Storage::disk('public')->url($landing->favicon)}}" type="image/png" />
    <!--    <link rel="shortcut icon" href="//upst.fwdcdn.com/favicon-v3.ico" type="'image/x-icon"/>-->
        <!-- For iPhone 4 Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{Storage::disk('public')->url($landing->favicon)}}">
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
                    <a class="site-logo" href="/"><img src="{{ Voyager::image($landing->thumbnail('medium', 'logo')) }}" alt="Homepage"></a>
                </div>
                
                <nav class="header-nav-wrap">
                    <ul class="header-nav">
                        <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                        <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
                        <li><a class="smoothscroll"  href="#services" title="services">Services</a></li>
                        <li><a class="smoothscroll"  href="#works" title="works">Works</a></li>
                        <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                    </ul>
                </nav> <!-- end header-nav-wrap -->
                
                <a class="header-menu-toggle" href="#0">
                    <span class="header-menu-icon"></span>
                </a>

            </div> <!-- end row -->

        </header> <!-- end s-header -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/modernizr.js') }}"></script>
        <script src="{{ asset('js/pace.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
