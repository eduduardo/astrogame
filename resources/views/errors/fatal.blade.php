@extends('project.general')

@section('title') Ops, algo não está certo! @stop

@section('content')
<div class="galileu ranking">
    <div class="uk-grid" data-uk-grid="">
        <div class="uk-container uk-container-center">
            <div class="uk-vertical-align-middle">
                <div class="uk-width-2-3 uk-container-center uk-text-center">
                    <span class="bubble">
                      <p>Ops, algo de errado aconteceu!</p>
                      <p>Alguma coisa deu muito ruim, volte para a <a href="{{ url('/') }}">página inicial</a> e tente de novo.</p></span>
                </div>
                <div class="uk-width-1-3 uk-container-center">
                    <img class="galileu-img uk-animation-hover uk-animation-shake" alt="carl sagan" src="{{url('img/char/carl-01.png')}}">
                </div>
            </div>
        </div>
    </div>
</div>
@stop
