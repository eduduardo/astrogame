@extends('project.general') @section('title') {{ trans('project.politica') }} | {{ trans('project.title') }} @stop @section('content')
<div class="thumbnav">
    <div class="uk-container uk-container-center">
        <div class="uk-align-left">
          <h1>{{ trans('project.politica') }}</h1>
        </div>
    </div>
</div>
<div class="white">
<div class="uk-container uk-container-center">
    <div class="uk-grid uk-margin-large-top" data-uk-grid>
        <div class="uk-witdh-1-1 uk-width-large-3-4 uk-align-center">
            <div class="uk-text-justify">
                {!! trans('terms.privacidade') !!}
            </div>
        </div>
    </div>
    <hr class="uk-grid-divider">
</div>
</div>
@stop
