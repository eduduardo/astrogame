@extends('project.general')
@section('title')
{{ trans('project.register') }} | {{ trans('project.project-name') }}
@stop
@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1 login-section">
   <div class="uk-vertical-align-middle" style="width: 350px;">
      <a href="{{url('/')}}">
        <img class="uk-margin-bottom" src="{{ url('img/logo-full.png') }}" alt="{{ trans('project.project-name') }}">
      </a>
      <form class="uk-panel uk-panel-box uk-form" method="POST" action="{{ url('/register') }}">
         {!! csrf_field() !!}

         @foreach ($errors->all() as $error)
            <div class="uk-alert uk-alert-danger" data-uk-alert>
               <a href="#" class="uk-alert-close uk-close"></a>
               <strong>{{ $error }}</strong>
            </div>
         @endforeach

         <div class="uk-form-row">
            <input class="uk-width-1-1 uk-form-large" type="text" name="name" value="{{ old('name') }}" placeholder="{{ trans('project.name')}}" required>
         </div>
         <div class="uk-form-row">
            <input class="uk-width-1-1 uk-form-large" type="email" name="email" value="{{ old('email') }}" placeholder="{{ trans('project.email-register') }}" required>
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
            <label for="terms">Aceito os <a href="{{ url('/terms') }}">termos de uso</a></label>
         </div>
            <a class="uk-float-right uk-link uk-link-muted" href="{{ url('/login') }}">{{ trans('project.login-register')}}</a>
         </div>
         <div class="uk-form-row">
            <div class="uk-button-group">
               <button type="submit" class="action-button yellow uk-width-1-1"><i class="uk-icon-user-plus"></i> {{ trans('project.cadastrar') }}</button>
            </div>
         </div>
      </form>
   </div>
</div>
@stop
