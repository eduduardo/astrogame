@if ($ajax)
  <div id="new-title" class="uk-hidden">@yield('title')</div>
  <div id="quest" class="uk-hidden">{{ $quest or 'soon' }}</div>
  @yield('style')
  @yield('javascript')
  @yield('content')
@else
<!DOCTYPE html>
<html lang="{{ \Lang::getLocale() }}">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
    	<title>@yield('title')</title>
      {!! Minify::stylesheet([
                  '/vendor/uikit/css/uikit.gradient.css',
                  '/vendor/uikit/css/components/notify.gradient.css',
                  '/vendor/uikit/css/components/progress.gradient.css',
                  '/vendor/uikit/css/components/tooltip.gradient.css',
                  '/vendor/uikit/css/components/datepicker.gradient.css',
                  '/vendor/uikit/css/components/form-file.gradient.css',
                  '/vendor/introjs/introjs.min.css',
                  '/vendor/loadingbar/loadingbar.css',
                  '/css/game/main.css',

                  ])->withFullUrl() !!}
      @yield('style')
   </head>
   <body>
      <div id="content">
        @yield('content')
      </div>

      @if (auth()->check())
         @include('game.general.player-bar')
      @endif

      {!! Minify::javascript(['/vendor/jquery/jquery-2.2.1.min.js',
                              '/vendor/uikit/js/uikit.min.js',
                              '/vendor/jquery/ajaxform.min.js',
                              '/vendor/uikit/js/components/notify.min.js',
                              '/vendor/uikit/js/components/tooltip.min.js',
                              '/vendor/uikit/js/components/datepicker.min.js',
                              '/vendor/buzz/buzz.min.js',
                              '/vendor/introjs/intro.min.js',
                              '/vendor/loadingbar/loadingbar.min.js',

                              '/js/game/audio.js',
                              '/vendor/phaser/phaser.min.js',

                              ])->withFullUrl() !!}
      {!! Html::script('/vendor/virtualsky/virtualsky.js') !!}
      @yield('javascript')
      @yield('javascript2')

      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-81244880-1', 'auto');
        ga('send', 'pageview');

        background.setVolume({{ $music_volume }});
        sound_effect.setVolume({{ $effects_volume }});
      </script>
   </body>
</html>
@endif
