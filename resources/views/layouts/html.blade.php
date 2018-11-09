<!doctype html>
<html lang="@php
    $lang =app()->getLocale() ?? 'ru';
    echo $lang;
@endphp">
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
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "VideoObject",
  "name": "Introducing the self-driving bicycle in the Netherlands",
  "description": "This spring, Google is introducing the self-driving bicycle in Amsterdam, the world’s premier cycling city. The Dutch cycle more than any other nation in the world, almost 900 kilometres per year per person, amounting to over 15 billion kilometres annually. The self-driving bicycle enables safe navigation through the city for Amsterdam residents, and furthers Google’s ambition to improve urban mobility with technology. Google Netherlands takes enormous pride in the fact that a Dutch team worked on this innovation that will have great impact in their home country.",
  "thumbnailUrl": [
    "https://example.com/photos/1x1/photo.jpg",
    "https://example.com/photos/4x3/photo.jpg",
    "https://example.com/photos/16x9/photo.jpg"
   ],
  "publisher": {
    "@type": "Organization",
    "name": "{{ $landing->getTranslatedAttribute('name', app()->getLocale() , 'ru')}}",
    @if ($landing->logo)
    "logo": {
      "@type": "ImageObject",
      "url": "{{ Storage::disk('public')->url($landing->logo) }}",
      "width": 600,
      "height": 60
    }
    @endif
  },   
  "uploadDate": "2016-03-31T08:00:00+08:00",
  "contentUrl": "https://www.example.com/video/123/file.mp4",
  "embedUrl": "https://www.example.com/embed/123"
}
        </script>



    <link rel="icon" href="{{ Storage::disk('public')->url($landing->favicon) }}" type="image/png" />

    <!--    <link rel="shortcut icon" href="//upst.fwdcdn.com/favicon-v3.ico" type="'image/x-icon"/>-->
    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" data-aload="{{ Storage::disk('public')->url($landing->favicon) }}">
    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" data-aload="{{ Voyager::image($landing->thumbnail('medium', 'favicon')) }}">
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" data-aload="{{ Voyager::image($landing->thumbnail('small', 'favicon')) }}">
    <!--Fonts -->


    <!-- Styles -->
    <link data-aload="{{ asset('css/base.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/vendor.css') }}" rel="stylesheet"> --}}
    <link data-aload="{{ asset('css/mainlandin.css') }}" rel="stylesheet">

    @include('layouts.cssonpage')

    <script>
        function aload(t){"use strict";var e="data-aload";return t=t||window.document.querySelectorAll("["+e+"]"),void 0===t.length&&(t=[t]),[].forEach.call(t,function(t){t["LINK"!==t.tagName?"src":"href"]=t.getAttribute(e),t.removeAttribute(e)}),t}
        window.onload = function () {
            aload();
        };
    </script>

</head>
<body id="top">

@include('layouts.header')

@yield('content')

@include('layouts.footer')

</body>
</html>