@if ($ajax)
  <div id="new-title" class="uk-hidden">@yield('title')</div>
  @yield('style')
  @yield('javascript')
  @yield('content')
@else
<!DOCTYPE html>
<html dir="ltr" lang="{{ \Lang::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Astrogame é um jogo online onde é possível aprender astronomia através do conceito de gamification, estudando de forma lúcida e divertida com jogos no estilo plataforma, puzzle, point-and-click e outros">
    <meta name="keywords" content="astrogame, astronomia, jogo, gamification, gratis, online, cosmos, astrofísica, etec, tcc, emia, universo">

    <link rel="manifest" href="manifest.json">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="img/favicon/android-chrome-192x192.png">

    <title>@yield('title')</title>

    {!! Minify::stylesheet(['/vendor/uikit/css/normalize.css', '/vendor/uikit/css/uikit.gradient.css', '/css/project/main.css', '/vendor/uikit/css/components/notify.gradient.css', '/vendor/loadingbar/loadingbar.css'])->withFullUrl() !!}
    @yield('style')
    <link rel="icon" type="image/png" href="/img/favicon/favicon-32x32.png" sizes="32x32">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

    @yield('head')
</head>
<body>
  <div id="top"></div>
  <nav class="uk-navbar uk-navbar-attached">
      <div class="uk-container uk-container-center">
          <a class="uk-navbar-brand uk-hidden-small uk-logo" href="{{ url('/') }}" class="ajax-link"><img alt="astrogame logo" class='logo' src="{{ url('img/logo-full.png') }}"></a>
          <ul class="uk-navbar-nav uk-hidden-small">
            <li @if ($page=='home') class="uk-active" @endif><a href="{{ URL('/') }}" class="ajax-link">{{ trans('project.navbar.home') }}</a></li>
            <li @if ($page=='sobre') class="uk-active" @endif><a href="{{ URL('/sobre') }}" class="ajax-link">{{ trans('project.navbar.sobre') }}</a></li>
            <li @if ($page=='equipe') class="uk-active" @endif><a href="{{ URL('/equipe') }}" class="ajax-link">{{ trans('project.navbar.equipe') }}</a></li>
            <li @if ($page=='ranking') class="uk-active" @endif><a href="{{ URL('/ranking') }}" class="ajax-link">{{ trans('project.navbar.ranking') }}</a></li>
            <li @if ($page=='blog') class="uk-active" @endif><a href="{{ URL('/blog') }}" class="ajax-link">{{ trans('project.navbar.blog') }}</a></li>
            <li @if ($page=='contato') class="uk-active" @endif><a href="{{ URL('/contato') }}" class="ajax-link">{{ trans('project.navbar.contato') }}</a></li>
          </ul>
          <a class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas="" href="#offcanvas"></a>
          <div class="uk-navbar-center uk-visible-small" >
              <a href="{{ url('/')}}" class="ajax-link">
                  <img alt="astrogame logo" class='logo' src="{{url('img/logo-full.png')}}">
              </a>
          </div>
      </div>
  </nav>
  <div class="uk-offcanvas" id="offcanvas">
      <div class="uk-offcanvas-bar">
          <ul class="uk-nav uk-nav-offcanvas">
            <li @if ($page=='home') class="uk-active" @endif>
                <a href="{{ URL('/') }}" class="ajax-link"><i class="uk-icon-home"></i> {{ trans('project.navbar.home') }}</a>
            </li>
            <li @if ($page=='sobre') class="uk-active" @endif><a href="{{ URL('/sobre') }}" class="ajax-link"><i class="uk-icon-gamepad"></i> {{ trans('project.navbar.sobre') }}</a></li>
            <li @if ($page=='equipe') class="uk-active" @endif><a href="{{ URL('/equipe') }}" class="ajax-link"><i class="uk-icon-group"></i> {{ trans('project.navbar.equipe') }}</a></li>
            <li @if ($page=='blog') class="uk-active" @endif><a href="{{ URL('/blog') }}" class="ajax-link"><i class="uk-icon-pencil"></i> {{ trans('project.navbar.blog') }}</a></li>
            <li @if ($page=='ranking') class="uk-active" @endif><a href="{{ URL('/ranking') }}" class="ajax-link"><i class="uk-icon-cubes"></i> {{ trans('project.navbar.ranking') }}</a></li>
            <li @if ($page=='contato') class="uk-active" @endif><a href="{{ URL('/contato') }}" class="ajax-link"><i class="uk-icon-paper-plane-o"></i> {{ trans('project.navbar.contato') }}</a></li>

            <li class="uk-nav-divider"></li>

            <li><a href="{{ URL('/login/facebook') }}"><i class="uk-icon-facebook"></i> Facebook Login</a></li>
            <li><a href="{{ URL('/login/google') }}"><i class="uk-icon-google"></i> Google Login</a></li>
            <li @if ($page=='login') class="uk-active" @endif><a href="#login" data-uk-modal=""><i class="uk-icon-sign-in"></i> {{ trans('project.login') }}</a></li>
            <li @if ($page=='register') class="uk-active" @endif><a href="#register" data-uk-modal=""><i class="uk-icon-user-plus"></i> {{ trans('project.cadastrar') }}</a></li>
          </ul>
      </div>
  </div>
    <div id="content_holder">
      @yield('content')
    </div>
    @include('project.footer')

    @if (env('ASTROGAME_LOGIN'))
    <div id="login" class="uk-modal">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h2>Entrar no Astrogame</h2>
            <br>

            @if (isset($errors) && count($errors->all()) > 0 )
                @foreach($errors->all() as $error)
                <div class="uk-alert uk-alert-danger" data-uk-alert>
                   <a href="#" class="uk-alert-close uk-close"></a>
                   <p>{{ $error }}</p>
                </div>
                @endforeach
            @endif

            <form class="uk-form uk-width-1-1 uk-container-center" method="POST" action="{{url('/login')}}">
                {!! csrf_field() !!}

                <div class="uk-form-row">
                    <input class="uk-width-1-1 uk-form-large" type="text" name="login" value="{{ old('email-or-nickname') }}" placeholder="{{ trans('project.email-or-nickname')}}" required>
                </div>
                <div class="uk-form-row">
                    <input class="uk-width-1-1 uk-form-large" type="password" name="password" placeholder="{{ trans('project.password')}}" required>
                </div>
                <div class="uk-form-row uk-text-small">
                    <label class="uk-float-left">
                        <input type="checkbox" name="remember" checked> {{ trans('project.remember')}}</label>
                    <a class="uk-float-right uk-link uk-link-muted" href="{{ url('password/reset')}}">{{ trans('project.forget-password') }}</a>
                </div>
                <div class="uk-form-row">
                      <button type="submit" class="action-button green uk-width-1-1"><i class="uk-icon-sign-in"></i> {{ trans('project.submit') }}</button>
                      <a class="action-button blue uk-width-1-1" href="{{ URL('/login/facebook') }}"><i class="uk-icon-facebook"></i> Facebook</a>
                      <a class="action-button red uk-width-1-1" href="{{ URL('/login/google') }}"><i class="uk-icon-google"></i> Google</a>
                      <a href="#register" data-uk-modal="" class="action-button yellow uk-width-1-1"><i class="uk-icon-user-plus"></i> {{ trans('project.register')}}</a>
                </div>
            </form>
        </div>
    </div>

    <div id="register" class="uk-modal">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <h2>Registrar no Astrogame</h2>
            <br>

            @if (isset($errors) && count($errors->all()) > 0 )
                @foreach($errors->all() as $error)
                <div class="uk-alert uk-alert-danger" data-uk-alert>
                   <a href="#" class="uk-alert-close uk-close"></a>
                   <p>{{ $error }}</p>
                </div>
                @endforeach
            @endif

            <form class="uk-form uk-width-1-1 uk-container-center" method="POST" action="{{url('/register')}}">
                {!! csrf_field() !!}
                <div class="uk-form-row">
                   <input class="uk-width-1-1 uk-form-large" type="text" name="name" value="{{ old('name') }}" placeholder="{{ trans('project.name')}}" required>
                </div>
                <div class="uk-form-row">
                    <input class="uk-width-1-1 uk-form-large" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                </div>
                <div class="uk-form-row">
                    <input class="uk-width-1-1 uk-form-large" type="password" name="password" value="{{ old('password') }}" placeholder="{{ trans('project.password') }}" required>
                </div>

                <div class="uk-form-row">
                   {!! Recaptcha::render() !!}
                </div>

                <div class="uk-form-row uk-text-small">
                    <div class="uk-float-left">
                        <input type="checkbox" name="terms" required>
                        <label for="terms">{{ trans('project.termos-1') }} <a href="{{ url('/termos')}}">{{ trans('project.termos-2') }}</a></label>
                    </div>
                    <a class="uk-float-right uk-link uk-link-muted" href="#login" data-uk-modal>{{ trans('project.login-register') }}</a>
                </div>
                <div class="uk-form-row">
                    <button type="submit" class="action-button red uk-width-1-1"><i class="uk-icon-user-plus"></i> {{ trans('project.cadastrar') }}</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    {!! Minify::javascript(['/vendor/jquery/jquery-2.2.1.min.js', '/vendor/uikit/js/uikit.min.js', '/vendor/uikit/js/components/tooltip.js', '/vendor/buzz/buzz.min.js', '/js/home.js', '/vendor/uikit/js/components/notify.min.js', '/vendor/loadingbar/loadingbar.min.js'], ['defer' => true])->withFullUrl() !!}
    @yield('javascript')

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    @if (isset($errors) && count($errors->all()) > 0 )
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            @if(empty(old('name')))
              UIkit.modal("#login").show();
            @else
              UIkit.modal("#register").show();
            @endif
        });
    </script>
    @endif

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-81244880-1', 'auto');
      ga('send', 'pageview');
  </script>

  @yield('footer')
</body>
</html>
@endif
