@extends('project.general')
@section('title') {{ trans('project.team') }} | {{ trans('project.project-name') }} @stop
@section('content')
<div class="team">
<div class="uk-container uk-container-center uk-margin-large-bottom">
    <div class="uk-grid team-section" data-uk-grid-margin>
        <div class="uk-width-1-1 uk-text-center">
            <h1>{{ trans('project.team') }}</h1>
            <h2>{{ trans('project.team-pre-text') }}</h2>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        @foreach ($team as $member)
        <div class="uk-width-medium-1-5 uk-text-center">
            <div class="uk-thumbnail uk-overlay-hover uk-border-circle">
                <figure class="uk-overlay">
                    <img class="uk-border-circle" src="{{ $member->img }}" alt="{{ $member->name }}">
                    <figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center uk-border-circle">
                        <div>
                            @if (!empty($member->facebook))
                            <a href="{{ $member->facebook }}" class="uk-icon-button uk-icon-facebook"></a>
                            @endif @if (!empty($member->twitter))
                            <a href="{{ $member->twitter }}" class="uk-icon-button uk-icon-twitter"></a>
                            @endif @if (!empty($member->instagram))
                            <a href="{{ $member->instagram }}" class="uk-icon-button uk-icon-instagram"></a>
                            @endif @if (!empty($member->devianart))
                            <a href="{{ $member->devianart }}" class="uk-icon-button uk-icon-deviantart"></a>
                            @endif @if (!empty($member->github))
                            <a href="{{ $member->github }}" class="uk-icon-button uk-icon-github"></a>
                            @endif
                        </div>
                    </figcaption>
                </figure>
            </div>
            <h2 class="uk-margin-top"><a href="{{ url('/blog/author') . '/' . $member->blog }}">{{ $member->name }}</a></h2>
            <p class="uk-text-large">{{ $member->description }}</p>
        </div>
        @endforeach
    </div>
</div>
<div class="white" style="padding: 30px 0">
<div class="uk-grid uk-container uk-container-center" data-uk-grid-margin>
    <div class="uk-width-1-1 uk-width-large-2-4 uk-text-justify">
        <h1>{{ trans('project.team-about') }}</h1>
        {!! trans('project.team-text') !!}
        <p><a href="{{ url('/blog')}}" class="uk-button ">{{ trans('project.team-blog') }} <i class="uk-icon-external-link"></i></a></p>
    </div>
    <div class="uk-width-1-1 uk-width-large-2-4">
        <div class="uk-thumbnail uk-overlay-hover ">
            <figure class="uk-overlay">
                <img src="img/equipe_astrogame.jpg" alt="Equipe Astrogame">
                <figcaption class="uk-text-center uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle"> {{ trans('project.team-figcaption')}} </figcatipon>
            </figure>
        </div>
    </div>

    </div>

    <hr class="uk-grid-divider">

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-1-1 uk-text-center">
            <h1 class="uk-h1">{{ trans('project.team-thanks') }}</h1>
            <h2 class="uk-h3 uk-text-muted">{{ trans('project.team-thanks2') }}</h2>
        </div>
    </div>


    <div class="uk-grid uk-container uk-container-center">
       <div class="uk-grid">
          <div class="uk-width-medium-1-5 uk-text-center">
             <div class="uk-thumbnail uk-overlay-hover uk-border-circle">
                <figure class="uk-overlay">
                   <img class="uk-border-circle" src="img/team/guilherme.jpg" alt="Guilherme Brandão">
                   <figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center uk-border-circle">
                      <div>
                         <a href="https://www.facebook.com/profile.php?id=100008526960671" class="uk-icon-button uk-icon-facebook"></a>
                      </div>
                   </figcaption>
                </figure>
             </div>
          </div>
          <div class="uk-width-medium-1-3">
             <h2 class="uk-margin-top">Guilherme Brandão</h2>
             <p class="uk-text-large">Compositor das músicas do jogo</p>
          </div>
       </div>
    </div>
</div>
</div>
@stop
