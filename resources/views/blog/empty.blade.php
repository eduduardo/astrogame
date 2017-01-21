@extends('blog.base')

@section('content')
<div class="thumbnav thumbnav-blog">
    <div class="uk-container uk-container-center uk-text-center-small">
        <h1>{{ trans('blog.empty-title') }}</h1>
    </div>
</div>

<div class="white">
<div class="uk-container uk-container-center">
    <div class="uk-grid uk-margin-large-top" data-uk-grid-margin>
        <div class="uk-width-medium-4-6">
          <div class="uk-panel uk-panel-box">
              <p>{{ trans('blog.empty-text')}}</p>
          </div>
          </div>

    <div class="uk-width-medium-2-6">
        @include('blog.sidebar')
    </div>
</div>
</div>
<hr class="uk-grid-divider">
</div>
@stop
