@extends('project.general')

@section('title')
{{ trans('project.contato-title') }}
@stop

@section('content')
<div class="thumbnav">
    <div class="uk-container uk-container-center">
        <div class="uk-align-left">
            <h1>{{ trans('project.contato') }}</h1>
        </div>
    </div>
</div>
<div class="white">
<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-margin-large-top" data-uk-grid>
        <div class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-2-3">
            <div class="uk-panel">
                <h2>{{ trans('project.contato-title') }}</h2>
                <form class="uk-form uk-form-stacked" action="{{ url('/contato')}}" method="POST">
                    {!! csrf_field() !!} {!! Honeypot::generate('form_name', 'form_time') !!}
                    @foreach ($errors->all() as $error)
                    <div class="uk-alert uk-alert-danger" data-uk-alert>
                        <a href="#" class="uk-alert-close uk-close"></a>
                        <strong>{{ $error }}</strong>
                    </div>
                    @endforeach @if(session('status'))
                    <div class="uk-alert uk-alert-success" data-uk-alert>
                        <a href="#" class="uk-alert-close uk-close"></a>
                        <strong>{{ trans('project.contact-success') }}</strong>
                    </div>
                    @endif
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="name">{{ trans('project.your-name') }}</label>
                        <div class="uk-form-controls">
                            <input type="text" name="name" class="uk-width-1-1" placeholder="{{ trans('project.name-placeholder') }}" required>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="email">{{ trans('project.your-email') }}</label>
                        <div class="uk-form-controls">
                            <input type="email" name="email" class="uk-width-1-1" placeholder="{{ trans('project.email-placeholder') }}" required>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label">{{ trans('project.your-message') }}</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-width-1-1" name="mensagem" cols="100" rows="9" required></textarea>
                        </div>
                    </div>
                    <div class="uk-form-row uk-text-right">
                        <div class="uk-form-controls">
                            <button class="uk-button uk-button-large uk-button-primary"><i class="uk-icon-send"></i> {{ trans('project.enviar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-grid-divider uk-visible-small"></div>
        <div class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-3 uk-text-center-small">
            <div class="uk-panel uk-panel-box uk-panel-box-secondary">
                <h2>{{ trans('project.project-name') }}</h2>
                <p>
                    <strong><a href="http://www.pfalves.com.br/">ETEC Pedro Ferreira Alves</a></strong>
                    <br>Mogi Mirim, São Paulo
                    <br>Brasil
                </p>
                <hr class="uk-grid-divider">
                <ul class="uk-list-space uk-margin-top" style="list-style: none; margin-left: 0; padding-left: 0">
                  <li><a href="{{ url('/credits') }}" class="ajax-link"><i class="uk-icon-user"></i> {{ trans('project.credits')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="uk-grid-divider">
</div>
</div>
@stop
