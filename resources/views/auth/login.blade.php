@extends('project.general')
@section('title')
{{ trans('project.login') }} | {{ trans('project.project-name') }}
@stop

@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1 login-section">
   <div class="uk-vertical-align-middle" style="width: 350px;">
      <a href="{{url('/')}}">
        <img class="uk-margin-bottom" src="{{ url('img/logo-full.png') }}" alt="{{ trans('project.project-name') }}">
      </a>
      <form class="uk-panel uk-panel-box uk-form" method="POST" action="{{ url('/login') }}">
         {!! csrf_field() !!}

         @if (count($errors->all()) > 0 )
             @foreach($errors->all() as $error)
             <div class="uk-alert uk-alert-danger" data-uk-alert>
                <a href="#" class="uk-alert-close uk-close"></a>
                <p>{{ $error }}</p>
             </div>
             @endforeach
         @endif
         <div class="uk-form-row">
            <input class="uk-width-1-1 uk-form-large" type="text" name="login" value="{{ old('email-or-nickname') }}" placeholder="{{ trans('project.email-or-nickname') }}" required>
         </div>
         <div class="uk-form-row">
            <input class="uk-width-1-1 uk-form-large" type="password" name="password" placeholder="{{ trans('project.password') }}" required>
         </div>
         <div class="uk-form-row uk-text-small">
            <label class="uk-float-left"><input type="checkbox" name="remember" checked> {{ trans('project.remember')}}</label>
            <a class="uk-float-right uk-link uk-link-muted" href="{{ url('/password/reset') }}">{{ trans('project.forget-password')}}</a>
         </div>
         <div class="uk-form-row">
               <button type="submit" class="action-button green uk-width-1-1"><i class="uk-icon-sign-in"></i> {{ trans('project.submit') }}</button>
               <a class="action-button blue uk-width-1-1" href="{{ URL('/login/facebook') }}"><i class="uk-icon-facebook"></i> Facebook</a>
               <a class="action-button red uk-width-1-1" href="{{ URL('/login/google') }}"><i class="uk-icon-google"></i> Google</a>
               <a href="{{ URL('/register') }}" class="action-button yellow uk-width-1-1"><i class="uk-icon-user-plus"></i> {{ trans('project.register')}}</a>
         </div>
      </form>
   </div>
</div>
@endsection
