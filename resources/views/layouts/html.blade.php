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

    @include('layouts.cssonpage')

</head>
<body id="top">

@include('layouts.header')

@yield('content')

@include('layouts.footer')

</body>
</html>