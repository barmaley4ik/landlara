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
        </script>>  

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
        <style>
        </style>
    </head>
    <body>
    </body>
</html>
