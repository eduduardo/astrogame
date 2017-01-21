@extends('project.general')
@section('title')
{{ trans('passwords.reset-password')}} | {{ trans('project.project-name') }}
@stop
@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1 login-section">
   <div class="uk-vertical-align-middle" style="width: 300px;">
      <img class="uk-margin-bottom" width="280" height="120" src="{{ url('img/logo.png') }}" alt="{{ trans('project.project-name') }}">
      <form class="uk-panel uk-panel-box uk-form" role="form" method="POST" action="{{ url('/password/reset') }}">
         {!! csrf_field() !!}

         @if ($errors->has('email'))
         <div class="uk-alert uk-alert-danger" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            <strong>{{ $errors->first('email') }}</strong>
         </div>
         @endif

         <input type="hidden" name="token" value="{{ $token }}">
         <div class="uk-form-row">
            <input placeholder="Email Address" class="uk-width-1-1 uk-form-large" type="email"  name="email" value="{{ $email or old('email') }}">
         </div>
         <div class="uk-form-row">
            <input type="password" placeholder="{{ trans('passwords.pass')}}" class="uk-width-1-1 uk-form-large" name="password">
            @if ($errors->has('password'))
            <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
         </div>
         <div class="uk-form-row">
            <input type="password" placeholder="{{ trans('passwords.confirm-pass')}}" class="uk-width-1-1 uk-form-large" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
            <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
         </div>
         <div class="uk-form-row">
            <button type="submit" class="uk-button uk-width-1-1 uk-button-primary uk-button-large">
            <i class="uk-icon-refresh"></i> {{ trans('passwords.reset-password')}}
            </button>
         </div>
   </div>
   </form>
</div>
</div>
@endsection