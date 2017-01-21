@extends('project.general')
@section('title') {{ trans('project.title') }} @stop

@section('style')
{!! Minify::stylesheet(['/vendor/uikit/css/components/tooltip.gradient.css'])->withFullURL() !!}
@stop

@section('javascript')
<script>
document.addEventListener("DOMContentLoaded", function(event) {
@if (session()->has('notify'))
    @foreach (session()->get('notify') as $notify)
        UIkit.notify({message: '{!! $notify['text'] !!}', status: '{!! $notify['status'] !!}', pos:'top-right'});
    @endforeach
    {{ session()->forget('notify') }}
@endif
});
</script>
@stop

@section('content')
<div class="uk-container uk-margin-large-top uk-container-center">
    <div class="uk-grid" data-uk-grid-margin="">
        <div class="uk-vertical-align-middle uk-width-medium-3-6 welcome">
            <h1>{{trans('project.home-title')}}</h1>
            <h2>{{ trans('project.home-subtitle')}}</h2>
            <p class="uk-text-muted">{{ trans('project.home-description')}}</p>
            @if (!auth()->check()) @if (env('ASTROGAME_LOGIN'))
            <p>
              <a class="action-button green" href="#login" data-uk-modal=""><i class="uk-icon uk-icon-rocket"></i> {{ trans('project.enter') }}</a>
            </p>
            @else
            <p>
                <button class="action-button disabled" disabled data-uk-tooltip="{pos:'bottom'}" title="Aguarde, logo sairá quentinho do forno um jogo incrível!"><i class="uk-icon uk-icon-close"></i> Login Indisponível</button>
            </p>
            @endif @else
            <p><a class="action-button red" href="{{url('/game')}}"><i class="uk-icon uk-icon-gamepad"></i> {{trans('project.jogar')}}</a></p>
            @endif
        </div>

        <div class="uk-width-medium-3-6">
            <img src="{{ url('img/astronaut.png') }}" class="astronaut uk-animation-hover uk-animation-shake" data-uk-tooltip title="That's one small step for a man, one giant leap for mankind.">
        </div>
    </div>
</div>
<div class="info">
    <div class="uk-grid uk-margin-large-top" data-uk-grid-margin="">
        <div class="uk-width-medium-1-3 red-info uk-margin-remove">
            <div class="uk-container">
                <h2><i class="uk-icon uk-icon-graduation-cap"></i> {{ trans('project.home-text.title2') }}</h2>
                <p>{{ trans('project.home-text.text2') }}</p>
            </div>
        </div>
        <div class="uk-width-medium-1-3 carrot-info uk-margin-remove">
            <div class="uk-container">
                <h2><i class="uk-icon uk-icon-level-up"></i> {{ trans('project.home-text.title1') }}</h2>
                <p>{{ trans('project.home-text.text1') }}</p>
            </div>
        </div>
        <div class="uk-width-medium-1-3 yellow-info uk-margin-remove">
            <div class="uk-container">
                <h2><i class="uk-icon uk-icon-cubes"></i> {{ trans('project.home-text.title3') }}</h2>
                <p>{{ trans('project.home-text.text3') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="screenshots">
<div class="uk-container uk-container-center">
    <div class="uk-grid" data-uk-grid="">
        <div class="uk-width-medium-1-2" data-uk-scrollspy="{cls:'uk-animation-fade'}">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/ElKzB4hrLCw?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen class="uk-responsive-width"></iframe>
        </div>
        <div class="uk-width-medium-1-2 uk-margin-top">
            <h1>{{ trans('project.home-text.title4') }}</h1>
            <p>{{ trans('project.home-text.text4') }}</p>
            <p>{{ trans('project.home-text.text5') }}</p>
            <p>{{ trans('project.home-text.text6') }}</p>

            @if(auth()->check())
            <a class="action-button red" href="{{ url('/game')}}" data-uk-modal><i class="uk-icon uk-icon-gamepad"></i> {{ trans('project.jogar') }}</a> @else
            <a class="action-button blue" href="#login" data-uk-modal><i class="uk-icon uk-icon-gamepad"></i> {{ trans('project.play') }}</a> @endif @if (session()->get('language', 'pt-br') == 'pt-br')
            <a class="action-button red" href="{{ url('lang/en')}}"><i class="uk-icon uk-icon-language"></i> Available in English</a> @else
            <a class="action-button green" href="{{ url('lang/pt-br')}}"><i class="uk-icon uk-icon-language"></i> Disponível em Português</a> @endif
        </div>
    </div>
</div>
</div>

<div class="galileu uk-container uk-container-center">
    <div class="uk-grid uk-text-center" data-uk-grid>
        <div class="uk-width-medium-1-2">
            <div class="uk-container uk-container-center">
                <div class="uk-vertical-align-middle">
                    <div class="uk-width-medium-1-1 uk-container-center">
                        <span class="bubble-carl">{{ trans('project.home-text.text8') }}</span>
                    </div>
                    <div class="uk-width-medium-1-1 uk-container-center">
                        <a href="{{ url('/blog/carl-sagan')}}">
                          <img class="carl-img uk-animation-hover uk-animation-shake" alt="Carl Sagan avatar" src="{{ url('/img/char/carl.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-medium-1-2">
            <div class="uk-container uk-container-center">
                <div class="uk-vertical-align-middle">
                    <div class="uk-width-medium-1-1 uk-container-center">
                        <span class="bubble">{{ trans('project.home-text.text7') }}</span>
                    </div>
                    <div class="uk-width-medium-1-1 uk-container-center">
                        <a href="{{ url('/blog/galileu-galilei')}}">
                          <img class="galileu-img uk-animation-hover uk-animation-shake" alt="Galileu Galilei avatar" src="{{ url('/img/char/galileu.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="contact">
    <div class="uk-container uk-container-center">
        <h1 class="uk-heading-large">{{ trans('project.contato-title') }}</h1>
        <p class="uk-text-large">{{ trans('project.contato-description')}}</p>

        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-medium-2-3">
                <form class="uk-form uk-form-stacked" action="{{ url('/contato')}}" method="POST">
                    {!! csrf_field() !!} {!! Honeypot::generate('form_name', 'form_time') !!}
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="name">{{ trans('project.name')}}</label>
                        <div class="uk-form-controls">
                            <input type="text" name="name" id="name" placeholder="{{ trans('project.your-name') }}" class="uk-width-1-1" required>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="email">{{ trans('project.email') }}</label>
                        <div class="uk-form-controls">
                            <input type="email" name="email" id="email" placeholder="{{ trans('project.your-email') }}" class="uk-width-1-1" required>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="mensagem">{{ trans('project.your-message') }}</label>
                        <div class="uk-form-controls">
                            <textarea name="mensagem" id="mensagem" rows="8" cols="40" class="uk-width-1-1" required></textarea>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <button type="submit" class="action-button animate red" href="#"><i class="uk-icon-send"></i> {{ trans('project.enviar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="call-action uk-hidden-small">
    <div class="uk-container uk-container-center uk-text-center uk-vertical-align">
        <p>
          <span class="text">{{ trans('project.home-text.call-to-action') }}</span>
          <a href="#login" class="action-button red uk-margin-left" data-uk-modal>{{ trans('project.home-text.call-to-action-button') }}</a>
        </p>
    </div>
</div>

@stop
