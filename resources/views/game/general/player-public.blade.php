@extends('game.general.general')
@section('title')
{{ $player->name }} - {{ $player->patente() }} em Astrogame
@stop

@section('style')
<style>
	body {
		overflow-y: scroll;
		min-height: 0
	}

	.insignas {
		overflow-y:scroll;
		max-height: 330px
	}
</style>
@stop

@section('content')
<div class="uk-container uk-container-center uk-margin-large-top">
    <div class="uk-grid" data-uk-grid>
        <div class="uk-width-medium-2-6">
            <div class="uk-panel uk-panel-box uk-text-center">
                <figure class="uk-thumbnail uk-border-circle" style="width: 120px">
                    <img src="{{ $player->avatar() }}" alt="avatar" class="uk-border-circle avatar" data-uk-tooltip title="{{ $player->patente() }} {{ $player->name }}">
                </figure>
                <h3>{{ $player->name }}</h3>

								@if ($player->isOnline())
									<span class="uk-badge uk-badge-success uk-panel-badge">ONLINE <i class="uk-icon uk-icon-gamepad"></i></span>
								@else
									<span class="uk-badge uk-badge-danger uk-panel-badge">OFFLINE</span>
								@endif

								<ul class="uk-list uk-list-striped uk-text-left">
                    <li><i class="uk-icon-heart"></i> {{ trans('game.level') }}: <strong>{{ $player->level }}</strong></li>
                    <li><i class="uk-icon-bookmark"></i> {{ trans('game.patent') }}: <strong>{{ $player->patente() }}</strong></li>
                    <li><i class="uk-icon-money"></i> {{ trans('game.money')}}: <strong>{{ $player->money }}</strong></li>
                    <li><i class="uk-icon-calendar"></i> {{ trans('game.since')}}: <strong>{{ $player->desde() }}</strong></li>
                    <li><i class="uk-icon-star"></i> {{ trans('game.ranking')}}: <strong># {{ $player_rank }}</strong></li>
                </ul>
            </div>

						<div class="uk-margin">
								<a href="{{$social->facebook}}" class="uk-icon-button uk-icon-facebook" data-uk-tooltip title="Compartilhar perfil no facebook"></a>
								<a href="{{$social->twitter}}" class="uk-icon-button uk-icon-twitter" data-uk-tooltip title="Compartilhar perfil no twitter"></a>
								<a href="{{$social->gplus}}" class="uk-icon-button uk-icon-google-plus" data-uk-tooltip title="Compartilhar perfil no google plus"></a>
								<a href="{{$social->tumblr}}" class="uk-icon-button uk-icon-tumblr" data-uk-tooltip title="Compartilhar perfil no tumblr"></a>
								<a href="{{$social->pinterest}}" class="uk-icon-button uk-icon-pinterest" data-uk-tooltip title="Compartilhar perfil no pinterest"></a>
						</div>

						<a class="action-button red uk-margin-top" href="{{ ((Request::header('referer')) ? Request::header('referer') : url('/')) }}"><i class="uk-icon-sign-out"></i> Voltar</a>
				</div>
        <div class="uk-grid-divider uk-hidden-large uk-hidden-medium"></div>
        <div class="uk-width-medium-4-6">
            <div class="uk-panel uk-panel-box uk-text-center">
                <h2>Insignas</h2>
                <ul class="uk-list insignas">
                    @foreach($player->insignas as $insigna)
                    <li>
                        <figure data-uk-modal="{target:'#insigna-{{ $insigna->insigna->id }}'}" class="uk-thumbnail uk-border-circle" style="width: 100px">
                            <img src="{{ url('/img/insignias') }}/{{ $insigna->insigna->key }}.png" alt="" data-uk-tooltip title="{{ $insigna->insigna->name }}">
                        </figure>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="uk-panel uk-panel-box">
                <h2>{{ trans('game.recent-activ') }}</h2>
                <ul class="uk-list uk-list-striped uk-text-left">
                    @forelse($player->history as $item)
                    	<li><i class="uk-icon-{{ $item->icon }}"> </i> {!! $item->texto !!} <span class="uk-text-muted uk-text-small">{{ $item->created_at }}</span></li>
										@empty
											<p>Nenhuma atividade recente</p>
										@endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
