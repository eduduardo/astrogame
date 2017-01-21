@extends('game.general.general')
@section('title')
{{ trans('chapters.welcome.title') }} - {{ trans('project.title') }}
@stop

@section('music') background @stop

@section('content')
<div class="uk-container uk-container-center uk-margin-large-top">
    <div class="uk-grid">
        @if(1 != 1)
        <div class="uk-width-1-2 uk-container-center uk-text-center">
            <h1 class="big-bang-text" style="color: #fff">{{ trans('chapters.welcome.start-text') }}</h1>
            <button class="action-button red uk-width-1-1" id="big-bang" onclick="accept_quest('primeira_missao')"><i class="uk-icon-space-shuttle"></i> {{ trans('chapters.welcome.start-button') }}</button>
        </div>

        @else
        <div class="uk-width-1-2 uk-container-center uk-text-center">
            <h3 style="color: #fff">Complete as missões disponíveis para avançar de nível</h3>
            <a href="#missions" class="action-button red uk-width-1-1" data-uk-modal="{target:'#quests'}">Missões &nbsp;&nbsp;<i class="uk-icon uk-icon-exclamation"></i></a>
            <h3 style="color: #fff">Ou visite o planetário para explorar as estrelas</h3>
            <a href="#observatory" class="action-button yellow uk-width-1-1" data-uk-modal="{target:'#observatory'}">Planetário &nbsp;&nbsp;<i class="uk-icon uk-icon-moon-o"></i></a>

        </div>

        @endif
    </div>
</div>
@stop
