@extends('project.general')

@section('title') 503 | Em manutenção @stop

@section('content')
<div class="galileu ranking">
    <div class="uk-grid" data-uk-grid="">
        <div class="uk-container uk-container-center">
            <div class="uk-vertical-align-middle">
                <div class="uk-width-2-3 uk-container-center uk-text-center">
                    <span class="bubble">
                      <img src="{{url('img/telescope-not.png')}}" width="150" class="uk-animation uk-animation-hover uk-animation-scale">
                      <p>Estamos em manutenção! Logo voltamos a explorar o universo!</span>
                </div>
                <div class="uk-width-1-3 uk-container-center">
                    <img class="galileu-img uk-animation-hover uk-animation-shake" alt="" src="{{url('img/char/galileu.png')}}">
                </div>
            </div>
        </div>
    </div>
</div>
@stop
