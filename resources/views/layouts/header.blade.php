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
<?php if($agent->isDesktop()) { ?>
.s-header {
  width: 100%;
  height: 72px;
  background-color: transparent;
  position: absolute;
  top: 4.2rem;
  z-index: 500;
}
.s-header > .row {
  position: relative;
  height: 72px;
  max-width: 1400px;
}
.s-header.offset {
  -webkit-transform: translate3d(0, -100%, 0);
  -ms-transform: translate3d(0, -100%, 0);
  transform: translate3d(0, -100%, 0);
  -webkit-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}
.s-header.scrolling {
  -webkit-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.s-header.sticky {
  position: fixed;
  top: 0;
  background-color: #000000 !important;
  opacity: 0;
  visibility: hidden;
  z-index: 600;
}
.s-header.sticky > .row {
  max-width: 1200px;
}
.s-header.sticky .header-logo {
  padding-left: 20px;
}
.s-header.sticky .header-nav-wrap {
  top: 0;
  right: 20px;
  left: auto;
}
.s-header.sticky.scrolling {
  opacity: 1;
  visibility: visible;
}
.header-logo {
  display: inline-block;
  position: absolute;
  margin: 0;
  padding: 0;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index: 501;
}
.header-logo a {
  display: block;
  margin: 3px 0 0 0;
  padding: 0;
  outline: 0;
  border: none;
}
.header-logo img {
  width: 130px;
  height: 37px;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.header-menu-toggle {
  display: none;
  position: absolute;
  right: 29px;
  top: 18px;
  height: 42px;
  width: 42px;
  line-height: 42px;
  font-family: "Montserrat", sans-serif;
  font-size: 1.3rem;
  text-transform: uppercase;
  letter-spacing: .2rem;
  color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.header-menu-toggle::before {
  display: inline-block;
  content: "Menu";
  height: 42px;
  left: auto;
  text-align: right;
  padding-left: 15px;
  padding-right: 10px;
  position: absolute;
  top: 0;
  right: 100%;
}
.header-menu-toggle:hover,
.header-menu-toggle:focus {
  color: #FFFFFF;
}
.header-menu-toggle span {
  display: block;
  width: 24px;
  height: 2px;
  margin-top: -1px;
  position: absolute;
  left: 9px;
  top: 50%;
  right: auto;
  bottom: auto;
  background-color: white;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  font: 0/0 a;
  text-shadow: none;
  color: transparent;
}
.header-menu-toggle span::before,
.header-menu-toggle span::after {
  content: '';
  width: 100%;
  height: 100%;
  background-color: inherit;
  position: absolute;
  left: 0;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
.header-menu-toggle span::before {
  top: -9px;
}
.header-menu-toggle span::after {
  bottom: -9px;
}
.s-header.sticky .header-menu-toggle {
  top: 12px;
}
.header-menu-toggle.is-clicked span {
  background-color: rgba(255, 255, 255, 0);
  -webkit-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;
}
.header-menu-toggle.is-clicked span::before,
.header-menu-toggle.is-clicked span::after {
  background-color: white;
}
.header-menu-toggle.is-clicked span::before {
  top: 0;
  -webkit-transform: rotate(135deg);
  -ms-transform: rotate(135deg);
  transform: rotate(135deg);
}
.header-menu-toggle.is-clicked span::after {
  bottom: 0;
  -webkit-transform: rotate(225deg);
  -ms-transform: rotate(225deg);
  transform: rotate(225deg);
}
.header-nav-wrap {
  font-family: "Montserrat", sans-serif;
  font-weight: 500;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: .3rem;
  position: absolute;
  top: 0;
  left: 200px;
}
.header-nav {
  display: inline-block;
  list-style: none;
  margin: 0;
  height: 72px;
}
.header-nav li {
  display: inline-block;
  padding-left: 0;
  margin-right: 2rem;
}

.header-nav li a {
  display: block;
  line-height: 72px;
  color: rgba(255, 255, 255, 0.5);
}
.header-nav li.current a,
.header-nav li a:hover {
  color: #FFFFFF;
}
.s-home {
  width: 100%;
  height: 100vh;
  min-height: 786px;
  background-color: transparent;
  position: relative;
  display: table;
}
.s-home::before {
  display: block;
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: .6;
  background-color: #000000;
}
.s-home .shadow-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: .2;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0) 100%);
}
.no-js .s-home {
  background: #000000;
}
.home-content {
  display: table-cell;
  width: 100%;
  height: 100vh;
  vertical-align: bottom;
  padding-bottom: 15.6rem;
  overflow: hidden;
  position: relative;
}
.home-content h1 {
  font-size: 6.6rem;
  font-weight: 600;
  line-height: 1.5;
  margin-top: 0;
  color: #FFFFFF;
}
.home-content__main {
  padding-right: 28rem;
  position: relative;
  max-width: 1400px;
}
.home-content__button {
  margin-top: 6rem;
}
.home-content__button .btn {
  margin-right: 0;
}
.home-content__video {
  position: absolute;
  top: 7.2rem;
  right: 12rem;
}
.home-content__video .video-link {
  display: block;
  text-align: center;
  width: 13rem;
  outline: none;
  position: relative;
}
.home-content__video .video-icon {
  display: inline-block;
  height: 8.4rem;
  width: 8.4rem;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.1);
  background-image: url(../images/icons/icon-play.svg);
  background-repeat: no-repeat;
  background-position: 55% center;
  background-size: 24px 27px;
  -webkit-transition: background-color 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}
.home-content__video .video-text {
  display: inline-block;
  text-align: center;
  font-family: "Montserrat", sans-serif;
  font-size: 1.3rem;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.5);
  text-transform: uppercase;
  letter-spacing: .4rem;
  -webkit-transition: color 0.3s ease-in-out;
  transition: color 0.3s ease-in-out;
}
.home-content__video .video-link:hover .video-text {
  color: white;
}
.home-content__video .video-link:hover .video-icon {
  background-color: #F26522;
}
.home-content__scroll {
  position: absolute;
  right: 8rem;
  bottom: 6rem;
  -webkit-transform: rotate(-90deg) translate3d(100%, 50%, 0);
  -ms-transform: rotate(-90deg) translate3d(100%, 50%, 0);
  transform: rotate(-90deg) translate3d(100%, 50%, 0);
  -webkit-transform-origin: right bottom;
  -ms-transform-origin: right bottom;
  transform-origin: right bottom;
}
.home-content__scroll .scroll-link {
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  font-size: 1.2rem;
  text-transform: uppercase;
  letter-spacing: .35rem;
  text-align: left;
  color: #FFFFFF;
  position: relative;
  padding-right: 200px;
}
.home-content__scroll .scroll-link:hover {
  color: #F26522;
}
.home-content__scroll::after {
  content: "";
  display: block;
  background-color: rgba(255, 255, 255, 0.3);
  width: 150px;
  height: 1px;
  position: absolute;
  right: 0;
  top: 50%;
}
.home-social {
  list-style: none;
  font-family: "Montserrat", sans-serif;
  margin: 0;
  position: absolute;
  top: 6rem;
  right: 6.2rem;
  z-index: 500;
}
.home-social a {
  color: #FFFFFF;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
.home-social li {
  position: relative;
  padding: .6rem 0;
}
.home-social li a {
  display: block;
  width: 36px;
  height: 36px;
  line-height: 36px;
}
.home-social i,
.home-social span {
  position: absolute;
  top: 0;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
.home-social i {
  display: inline-block;
  font-size: 20px;
  text-align: center;
  width: 36px;
  height: 36px;
  line-height: 36px;
  right: 0;
}
.home-social span {
  background-color: #151515;
  font-size: 1.2rem;
  line-height: 30px;
  color: #F26522;
  right: 50px;
  padding: 0 15px;
  margin: 3px 0;
  opacity: 0;
  visibility: hidden;
  -webkit-transform: scale(0);
  -ms-transform: scale(0);
  transform: scale(0);
  -webkit-transform-origin: 100% 50%;
  -ms-transform-origin: 100% 50%;
  transform-origin: 100% 50%;
}
.home-social span::after {
  display: block;
  content: "";
  width: 0;
  height: 0;
  border-top: 6px solid transparent;
  border-bottom: 6px solid transparent;
  border-left: 6px solid #151515;
  position: absolute;
  top: 50%;
  right: -6px;
  margin-top: -6px;
}
.home-social li:hover span {
  opacity: 1;
  visibility: visible;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}
html.cl-preload .home-content__main {
  opacity: 0;
}

html.cl-loaded .home-content__main {
  animation-duration: 2s;
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}

html.no-csstransitions .home-content__main {
  opacity: 1;
}
@-webkit-keyframes fadeIn {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 150%, 0);
    -ms-transform: translate3d(0, 150%, 0);
    transform: translate3d(0, 150%, 0);
  }
  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}
@keyframes fadeIn {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 150%, 0);
    -ms-transform: translate3d(0, 150%, 0);
    transform: translate3d(0, 150%, 0);
  }
  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}
@-webkit-keyframes fadeOut {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -150%, 0);
    -ms-transform: translate3d(0, -150%, 0);
    transform: translate3d(0, -150%, 0);
  }
}
@keyframes fadeOut {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -150%, 0);
    -ms-transform: translate3d(0, -150%, 0);
    transform: translate3d(0, -150%, 0);
  }
}
@media only screen and (max-width:1600px) {
  .home-content h1 {
    font-size: 6.4rem;
  }
  .home-content__video {
    right: 13rem;
  }
}
@media only screen and (max-width:1400px) {
  .home-content h1 {
    font-size: 6rem;
  }
}
@media only screen and (max-width:1200px) {
  .home-content h1 {
    font-size: 5.6rem;
  }
  .home-content__main {
    padding-right: 6rem;
  }
  .home-content__button,
  .home-content__video {
    display: inline-block;
    vertical-align: top;
  }
  .home-content__video {
    position: static;
    margin-top: 6rem;
    margin-left: 6rem;
    height: 6.6rem;
    line-height: 6.6rem;
  }
  .home-content__video .video-link {
    padding-left: 9rem;
    width: auto;
  }
  .home-content__video .video-icon {
    height: 6.6rem;
    width: 6.6rem;
    background-size: 12px 13px;
    position: absolute;
    top: 0;
    left: 0;
  }
}
@media only screen and (max-width:1000px) {
  .home-content h1 {
    font-size: 5.4rem;
  }
  .home-social i {
    font-size: 1.8rem;
  }
}
@media only screen and (max-width:900px) {
  .home-social {
    display: none;
  }
}
<?php } elseif ($agent->isTablet()) { ?>
@media only screen and (max-width:800px) {
  .s-header {
    top: 0;
  }
  .s-header > .row {
    max-width: none;
    width: auto;
  }
  .header-logo {
    left: 40px;
    top: 3rem;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
  .header-logo img {
    width: 120px;
    height: 34px;
  }
  .s-header.sticky .header-logo {
    top: 50%;
    left: 20px;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }
  .header-menu-toggle {
    top: 3rem;
    right: 40px;
  }
  .header-nav-wrap {
    display: none;
    height: auto;
    width: 100%;
    right: auto;
    top: 0;
    left: 0;
    background-color: #000000;
    padding: 120px 40px 21px;
  }
  .header-nav-wrap .header-nav {
    display: block;
    height: auto;
    margin: 0 0 4.2rem 0;
    border-top: 1px solid rgba(255, 255, 255, 0.07);
  }
  .header-nav-wrap .header-nav li {
    display: block;
    margin: 0;
    padding: 0;
    border-bottom: 1px dotted rgba(255, 255, 255, 0.07);
  }
  .header-nav-wrap .header-nav li a {
    padding: 18px 0;
    line-height: 18px;
  }
  .s-header.sticky .header-nav-wrap {
    right: 0;
  }
  .header-menu-toggle {
    display: block;
  }
}
@media only screen and (min-width:801px) {
  .header-nav-wrap {
    display: block !important;
  }
}
@media only screen and (max-width:800px) {
  .home-content h1 {
    font-size: 5rem;
  }
  .home-content__main {
    max-width: 600px;
  }
  .home-content__main h1 br {
    display: none;
  }
  .home-content__video {
    margin-left: 4rem;
  }
  .home-content__video .video-text {
    display: none;
  }
  .home-content__scroll {
    right: 6rem;
    bottom: 4.2rem;
  }
  .home-content__scroll .scroll-link {
    padding-right: 80px;
  }
  .home-content__scroll::after {
    width: 50px;
  }
}
<?php } elseif ($agent->isPhone()) { ?>

@media only screen and (max-width:400px) {
  .header-logo {
    left: 30px;
  }
  .s-header.sticky .header-logo {
    left: 10px;
  }
  .header-menu-toggle {
    right: 30px;
  }
  .header-menu-toggle::before {
    display: none;
  }
}

@media only screen and (max-width:700px) {
  .home-content h1 {
    font-size: 4.8rem;
  }
  .home-content__main {
    max-width: 490px;
  }
}
@media only screen and (max-width:600px) {
  .home-content {
    vertical-align: middle;
    padding-top: 19.8rem;
    padding-bottom: 12rem;
  }
  .home-content h1 {
    font-size: 4.2rem;
  }
  .home-content__main {
    text-align: center;
    padding: 0 40px;
  }
  .home-content__button {
    margin-top: 3rem;
  }
  .home-content__video {
    margin-top: 1.5rem;
    margin-left: 0;
  }
  .home-content__video .video-text {
    display: inline-block;
    font-size: 11px;
  }
  .home-content__scroll .scroll-link {
    font-size: 11px;
  }
  .home-content__scroll::after {
    display: none;
  }
}
@media only screen and (max-width:500px) {
  .s-home {
    min-height: 654px;
  }
  .home-content h1 {
    font-size: 3.8rem;
  }
}
@media only screen and (max-width:400px) {
  .home-content__main {
    padding: 0 25px;
  }
  .home-content {
    padding-top: 15rem;
  }
  .home-content h1 {
    font-size: 3.5rem;
  }
  .home-content__scroll {
    right: 5rem;
  }
}
@media only screen and (max-width:350px) {
  .home-content h1 {
    font-size: 3.2rem;
  }
  .home-content__button .btn {
    padding: 0 7rem 0 4rem;
  }
}
<?php } ?>
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