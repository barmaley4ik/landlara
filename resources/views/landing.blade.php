@extends('layouts.html')

@section('content')
@if (($landing->type_background == 2) || ($landing->type_background == 1))
<section id="home" class="s-home page-hero target-section" @isset($landing_bg) data-parallax=scroll data-image-src='{{ $landing_bg }}' data-natural-width=3000 data-natural-height=2000 data-position-y=center @endisset >
    <div class="shadow-overlay"></div>
    <div class="home-content" @isset($color) style="background-color: {!! $color !!} @endisset">
        <div class="row home-content__main">
            <h1>
                {{ $landing->slogan }}
            </h1>
        </div> <!-- end home-content__main -->
    </div> <!-- end home-content -->
    <ul class="home-social">
        @isset($landing->facebook)
        <li>
            <a href="{{ $landing->facebook }}"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
        </li>
        @endisset
        @isset($landing->twitter)
        <li>
            <a href="{{ $landing->twitter }}"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
        </li>
        @endisset
        @isset($landing->instagramm)
        <li>
            <a href="{{ $landing->instagramm }}"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
        </li>
        @endisset
        @isset($landing->youtube)
        <li>
            <a href="{{ $landing->youtube }}"><i class="fab fa-youtube" aria-hidden="true"></i><span>YouTube</span></a>
        </li>
        @endisset
        @isset($landing->pinterest)
        <li>
            <a href="{{ $landing->pinterest }}"><i class="fab fa-pinterest" aria-hidden="true"></i><span>Pinterest</span></a>
        </li>
        @endisset
        @isset($landing->googleplus)
        <li>
            <a href="{{ $landing->googleplus }}"><i class="fab fa-google" aria-hidden="true"></i><span>Google</span></a>
        </li>
        @endisset
    </ul> <!-- end home-social -->
</section> <!-- end s-home -->
@else
<section id="home" class="s-home page-hero target-section" >
    <div class="shadow-overlay"></div>
    @if(isset ($video))
    <div class="home-content" style="display: block;padding-bottom: 0px;">
        <video muted loop="1" autoplay="autoplay" src="{{ $video }}" style="width: 100vw!important;height: auto!important">
        </video>
    </div> <!-- end home-content -->
    @endif
    <ul class="home-social">
        <li>
            <a href="{{ $landing->facebook }}"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
        </li>
        <li>
            <a href="{{ $landing->twitter }}"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
        </li>
        <li>
            <a href="{{ $landing->instagramm }}"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
        </li>
        <li>
            <a href="{{ $landing->youtube }}"><i class="fab fa-youtube" aria-hidden="true"></i><span>YouTube</span></a>
        </li>
        <li>
            <a href="{{ $landing->pinterest }}"><i class="fab fa-pinterest" aria-hidden="true"></i><span>Pinterest</span></a>
        </li>
        <li>
            <a href="{{ $landing->googleplus }}"><i class="fab fa-google" aria-hidden="true"></i><span>Google</span></a>
        </li>
    </ul> <!-- end home-social -->
</section> <!-- end s-home -->
@endif

<!-- about
================================================== -->
<section id="about" class="s-contact target-section">
    <div class="row section-header" data-aos="fade-up">
        <div class="col-full">
            <h3 data-num="04" class="subhead">About As</h3>
        </div>
    </div>
    <div class="row about-infos">
        <video data-aload="{{ Storage::disk('public')->url('/videoplayback.mp4') }}" {{-- poster="{{ $landing_bg }}" --}} controls width="1024" height="683" style="width: 100%;">
            <source data-aload="{{ Storage::disk('public')->url('/videoplayback.mp4') }}" type="video/mp4"><!-- MP4 для Safari, IE9, iPhone, iPad, Android, и Windows Phone 7 -->
            {{--<source src="video.webm" type="video/webm"><!-- WebM/VP8 для Firefox4, Opera, и Chrome -->--}}
            {{--<source src="video.ogv" type="video/ogg"><!-- Ogg/Vorbis для старых версий браузеров Firefox и Opera -->--}}
            {{--<object data="video.swf" type="application/x-shockwave-flash"><!-- добавляем видеоконтент для устаревших браузеров, в которых нет поддержки элемента video -->--}}
                {{--<param name="movie" value="video.swf">--}}
            {{--</object>--}}
        </video>
    </div>
</section>
<!-- contact
================================================== -->
<section id="contact" class="s-contact target-section">
    <div class="row section-header" data-aos="fade-up">
        <div class="col-full">
            <h3 data-num="05" class="subhead">Get In Touch</h3>
            <h1 class="display-1 display-1--light">Have an idea or an epic project in mind? Talk to 
                us. Let’s work together and make something 
                great. Drop us a line at <a href="mailto:#0">hello@stellar.com</a></h1>
        </div>
    </div>
    <div class="row contact-infos">
        <div class="col-five md-seven tab-full contact-address" data-aos="fade-up">
            <h4>Where to Find Us</h4>
            <p>
                {{ $landing->adress }}
            </p>
        </div>
        <div class="col-three conl md-five tab-full contact-social" data-aos="fade-up">
            <h4>Follow Us</h4>
            <ul class="contact-list">
                <li><a href="{{ $landing->facebook }}">Facebook</a></li>
                <li><a href="{{ $landing->twitter }}">Twitter</a></li>
                <li><a href="{{ $landing->instagram }}">Instagram</a></li>
            </ul>
        </div>
        <div class="col-four conl md-six tab-full contact-number" data-aos="fade-up">
            <h4>Contact Us</h4>
            <ul class="contact-list">
                <li><a href="mailto:{{ $landing->mail }}">{{ $landing->mail }}</a></li>
                <li><a href="tel:{{ $landing->tel }}">{{ $landing->tel }}</a></li>
                <li><a href="tel:{{ $landing->mobile }}">{{ $landing->mobile }}</a></li>
            </ul>
        </div>
        <div style="color: #fff" class="form">
            <h4>Будущая форма</h4>
            <form action="">
                @foreach($formfields as $formfield)
                    @if ($formfield->ftype == '1')
                        @php 
                        $fvalues = json_decode($formfield->fvalue) 
                        @endphp
                        <label class="label label-warning">
                            @if(!empty($formfield->label))
                                {{ $formfield->label }}
                            @endif
                        </label>
                        <input @if($formfield->frequired == '1') required @endif type="text" class="form-control" name="{{ $formfield->label }}" placeholder="@if(!empty($formfield->placeholder)) {{ $formfield->placeholder }}@endif" value="">
                    @elseif ($formfield->ftype == '2')
                        @php 
                        $fvalues = json_decode($formfield->fvalue) 
                        @endphp
                        <label class="label label-warning">
                            @if(!empty($formfield->label))
                                {{ $formfield->label }}
                            @endif
                        </label>
                        <input @if($formfield->frequired == '1') required @endif type="email" class="form-control" name="{{ $formfield->label }}" placeholder="@if(!empty($formfield->placeholder)) {{ $formfield->placeholder }}@endif" value="">
                    @elseif ($formfield->ftype == '3')
                        @php 
                        $fvalues = json_decode($formfield->fvalue) 
                        @endphp
                        <label class="label label-warning">
                            @if(!empty($formfield->label))
                                {{ $formfield->label }}
                            @endif
                        </label>
                        <input @if($formfield->frequired == '1') required @endif type="tel" class="form-control" name="{{ $formfield->label }}" placeholder="@if(!empty($formfield->placeholder)) {{ $formfield->placeholder }}@endif" value="">
                    @elseif ($formfield->ftype == '4')
                        @php 
                        $fvalues = json_decode($formfield->fvalue);
                        @endphp
                        <label class="label label-warning">
                            @if(!empty($formfield->label))
                                {{ $formfield->label }}
                            @endif
                        </label>
                        <select @if($formfield->frequired == '1') required @endif class="form-control select2" name="{{ $formfield->name }}">
                            @foreach($fvalues->options as $key => $option)
                                <option value="{{ $key }}" @if($fvalues->default == $key){{ 'selected="selected"' }}@endif >{{ $option }}</option>
                            @endforeach
                        </select>
                    @elseif ($formfield->ftype == '5')
                        @php
                        $fvalues = json_decode($formfield->fvalue);
                        @endphp
                        <label class="label label-warning">
                            @if(!empty($formfield->label))
                                {{ $formfield->label }}
                            @endif
                        </label>
                        
                            <input type="checkbox" name="{{ $formfield->label }}" class="toggleswitch"
                               @if($fvalues->default == $fvalues->options->on)     checked @endif >
                        
                    @endif
                @endforeach
                
            </form>
        </div>
{{--         <div class="row contact-bottom">
            <div class="col-five tab-full contact-button" data-aos="fade-up">
                <a href="#about" class="smoothscroll btn btn-animatedbg">
                    Let's Talk
                </a>
            </div>

            <div class="col-six tab-full contact-subscribe" data-aos="fade-up">
                <h4>Subscribe</h4>

                <form id="mc-form" class="group mc-form" novalidate="true">
                    <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                    <input type="submit" name="subscribe" value="Subscribe">
                    <label for="mc-email" class="subscribe-message"></label>
                </form>
            </div>
        </div> <!-- end contact-button -->
    </div> <!-- end contact-infos -->
 --}}
</section> <!-- end s-contact -->

@endsection

