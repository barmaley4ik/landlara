<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @if (config('voyager.multilingual.rtl')) dir="rtl" @endif>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="none" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="admin login">
        <title>Admin - {{ Voyager::setting("admin.title") }}</title>
        <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
        @if (config('voyager.multilingual.rtl'))
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
            <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
        @endif
        <link rel="stylesheet" href="{{ voyager_asset('css/style.css') }}">
    </head>
    <body>
        <div class="login">
            <h1>{{ __('voyager::login.signin') }}</h1>
            <form method="post" action="{{ route('voyager.login') }}">
                {{ csrf_field() }}
                <input type="email" value="{{ old('email') }}" name="email" placeholder="{{ __('voyager::generic.email') }}" required="required" />
                <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large">
                    <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                    <span class="signin">{{ __('voyager::generic.login') }}</span>
                </button>
            </form>
        </div>
        <script>
            var btn = document.querySelector('button[type="submit"]');
            var form = document.forms[0];
            var email = document.querySelector('[name="email"]');
            var password = document.querySelector('[name="password"]');
            btn.addEventListener('click', function(ev){
                if (form.checkValidity()) {
                    btn.querySelector('.signingin').className = 'signingin';
                    btn.querySelector('.signin').className = 'signin hidden';
                } else {
                    ev.preventDefault();
                }
            });
        </script>
        <script src="{{ voyager_asset('js/index.js') }}"></script>
    </body>
</html>