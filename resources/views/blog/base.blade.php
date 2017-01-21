@if ($ajax)
  <div id="new-title" class="uk-hidden">@yield('title')</div>
  @yield('style')
  @yield('script')
  @yield('content')
@else
<!DOCTYPE html>
<html dir="ltr" lang="{{ \Lang::getLocale() }}">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    {!! Minify::stylesheet(['/vendor/uikit/css/normalize.css', '/vendor/uikit/css/uikit.gradient.css', '/css/project/main.css', '/vendor/uikit/css/components/notify.gradient.css'])->withFullUrl() !!}
    @yield('style')
    <link rel="icon" type="image/png" href="/img/favicon/favicon-32x32.png" sizes="32x32">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

    {!! wp_head() !!}
</head>
<body {!! body_class() !!}>
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
    @yield('content')
    @include('project.footer')

    {!! Minify::javascript(['/vendor/jquery/jquery-2.2.1.min.js', '/vendor/uikit/js/uikit.min.js', '/vendor/uikit/js/components/tooltip.js'], ['defer' => true])->withFullUrl() !!}
    @yield('javascript')

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-81244880-1', 'auto');
      ga('send', 'pageview');
  </script>

  {!! wp_footer() !!}
</body>
</html>
@endif
