@extends('project.general')
@section('title')
{{ trans('passwords.reset-password')}} | {{ trans('project.project-name') }}
@stop
@section('content')
<div class="uk-vertical-align uk-margin-large-top uk-text-center uk-height-1-1 login-section">
   <div class="uk-vertical-align-middle uk-margin-large-top" style="width: 350px;">
      <form class="uk-panel uk-panel-box uk-form" role="form" method="POST" action="{{ url('/password/email') }}">
         {!! csrf_field() !!}
         @if (session('status'))
         <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            <p>{{ session('status') }}</p>
         </div>
         @endif
         @if ($errors->has('email'))
         <div class="uk-alert uk-alert-danger" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            <strong>{{ $errors->first('email') }}</strong>
         </div>
         @endif
         <div class="uk-form-row">
            <input type="email" class="uk-width-1-1 uk-form-large" name="email" value="{{ old('email') }}" placeholder="Seu email" required>
         </div>
         <div class="uk-form-row">
               <button type="submit" class="uk-width-1-1 action-button blue">
               <i class="uk-icon-envelope"></i> {{ trans('passwords.send') }} </button>
         </div>
      </form>
   </div>
</div>
@endsection
