<!-- player modal -->
<div id="player-modal" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-large">
        <a href="" class="uk-modal-close uk-close"></a>

        <ul class="uk-tab" data-uk-tab="{connect:'#tab-content'}" data-uk-check-display>
            <li aria-expanded="true" class="uk-active"><a href="#"><i class="uk-icon-user"></i> {{ trans('game.profile') }}</a></li>
            <li class="" aria-expanded="false"><a href="#"><i class="uk-icon-cog"></i> {{ trans('game.account') }}</a></li>
            <li class="" aria-expanded="false"><a href="#"><i class="uk-icon-shopping-bag"></i> {{ trans('game.bag') }}</a></li>
            <li class="" aria-expanded="false"><a href="#"><i class="uk-icon-graduation-cap"></i> {{ trans('game.patents') }}</a></li>
            <li class="" aria-expanded="false"><a href="#"><i class="uk-icon-bookmark"></i> {{ trans('game.insignas') }}</a></li>
            <li><a href="{{ url('/ranking')}}"><i class="uk-icon-cubes"></i> Ranking</a></li>
        </ul>

<ul id="tab-content" class="uk-switcher uk-margin">
    <li class="uk-active">
        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-medium-1-6">
                <figure class="uk-thumbnail uk-border-circle">
                  <div class="uk-form-file">
                      <img src="{{ auth()->user()->avatar() }}" alt="avatar" class="uk-border-circle avatar" style="width: 130px">
                      <input type="file" name="avatar" accept="image/*" id="avatar-file" data-uk-tooltip title="Alterar avatar">
                  </div>
                </figure>
                <div>
                  <a id="remove-avatar"><i class="uk-icon-trash"></i> Remover avatar</a>
                </div>
            </div>
            <div class="uk-width-medium-5-6">
                <ul class="uk-list">
                    <li><i class="uk-icon-medium uk-icon-level-up level" data-uk-tooltip title="{{ trans('game.level') }}"></i> {{ $user_level }} ({{ auth()->user()->patente() }})</li>
                    <li><i class="uk-icon-medium uk-icon-money" data-uk-tooltip title="Astrocoins"></i> DG {{ $user_money }}</li>
                </ul>
                <div class="uk-margin-bottom">
                  XP: {{ $xp_bar }}% ({{ $user_xp }} XP)
                  <div class="uk-progress uk-progress-striped uk-text-center" data-uk-tooltip title="{{ $user_xp }} / {{ $xp_for_next_level }}">
                      <div class="uk-progress-bar" style="width: {{ $xp_bar }}%;"></div>
                  </div>
              </div>
                <a href="{{ url('/player')}}/{{ auth()->user()->nickname }}">{{ trans('game.profile-public') }}</a>
            </div>
        </div>
    </li>
  <li>
      <div class="uk-grid" data-uk-grid>
          <div class="uk-width-1-1">
            <form method="post" action="{{ url('/game/change_account') }}" class="uk-form user-config" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <h3>Básico</h3>
                  <div class="uk-grid" data-uk-grid>
                    <div class="uk-width-medium-1-2">
                        <label class="uk-form-label" for="text">{{ trans('game.name') }}:</label>
                        <div class="uk-form-controls">
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="uk-width-1-1">
                        </div>
                    </div>

                    <div class="uk-width-medium-1-2">
                        <label class="uk-form-label" for="text">{{ trans('game.nickname') }}:</label>
                        <div class="uk-form-controls">
                            <input type="text" name="nickname" value="{{ auth()->user()->nickname }}" class="uk-width-1-1">
                        </div>
                    </div>

                    <div class="uk-width-medium-1-2">
                        <label class="uk-form-label" for="text">{{ trans('game.email') }}:</label>
                        <div class="uk-form-controls">
                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="uk-width-1-1"
                            @if (!empty(auth()->user()->provider_id))
                            disabled
                            @endif
                            >
                        </div>
                    </div>

                    @if (empty(auth()->user()->provider_id))
                      <div class="uk-width-medium-1-1 uk-margin-top">
                          <h3>{{ trans('game.change-password') }}</h3>
                      </div>
                      <div class="uk-width-medium-1-2">
                          <label class="uk-form-label" for="text">{{ trans('game.old-password') }}:</label>
                          <div class="uk-form-controls">
                              <input type="password" name="old_password" class="uk-width-1-1">
                          </div>
                      </div>
                      <div class="uk-width-medium-1-2">
                          <label class="uk-form-label" for="text">{{ trans('game.new-password') }}:</label>
                          <div class="uk-form-controls">
                              <input type="password" name="new_password" class="uk-width-1-1">
                          </div>
                      </div>
                    @endif
                  </div>

                  <button type="submit" class="uk-button uk-button-success uk-align-right uk-margin-top"><i class="uk-icon-check"></i> Salvar alterações</button>

                  <div class="uk-align-right uk-margin-top">
                    <div class="uk-button-group" data-uk-switcher>
                        <button aria-expanded="true" class="uk-button @if($profile_private == false) uk-active @endif uk-button-primary" type="button" id="public">Pefil Público <i class="uk-icon-globe"></i></button>
                        <button aria-expanded="false" class="uk-button @if($profile_private) uk-active @endif uk-button-danger" type="button" id="private">Perfil Privado <i class="uk-icon-user-secret"></i></button>
                    </div>
                  </div>

                  @if (!empty(auth()->user()->provider_id))
                      <button class="uk-button uk-button-success uk-disabled uk-align-right uk-margin-top" disabled>
                          @if (auth()->user()->provider_id == 1)
                            <i class="uk-icon-facebook"></i> Vinculado com o Facebook <i class="uk-icon-check"></i>
                          @elseif (auth()->user()->provider_id == 2)
                            <i class="uk-icon-google"></i> Vinculado com o Google <i class="uk-icon-check"></i>
                          @endif
                      </button>
                  @endif
              </form>
          </div>
      </div>
  </li>
  <li>
      <div class="uk-panel uk-panel-box uk-panel-box-primary">
          <h3 class="uk-panel-title"><i class="uk-icon-shopping-bag"> </i> {{ trans('game.bag') }}</h3>
          <ul class="uk-list bag bag-items">
              <li></li>
              @forelse($bag as $bag_item)
              <li onclick="remove_item({{ $bag_item->item->id }});" class="item-{{ $bag_item->item->id }}">
                  <span class="uk-badge uk-badge-success">{{ $bag_item->amount }}</span>
                  <figure class="uk-thumbnail">
                      <img src="{{ url('/img/items') }}/{{ $bag_item->item->img_url }}.png" alt="" data-uk-tooltip title="{{ $bag_item->item->name }}">
                  </figure>
              </li>
              @empty {{ trans('game.empty-bag') }} @endforelse
          </ul>
      </div>
  </li>
  <li>
      <dl class="uk-description-list-line">
          <dt>
              <strong>Level (0-3)</strong> {{ trans('game.patent1')}}
              @if ($user_level <= 3)
              <div class="uk-badge uk-badge-warning">Você está aqui</div>
              @endif

              <div class="uk-text-muted">{{ trans('game.patent1-description')}}</div>
          </dt>
          <dt>
              <strong>Level (4-6)</strong> {{ trans('game.patent2')}}
              @if ($user_level >= 4 && $user_level <= 6)
              <div class="uk-badge uk-badge-warning">Você está aqui</div>
              @endif
              <div class="uk-text-muted">{{ trans('game.patent2-description')}}</div>
          </dt>
          <dt>
              <strong>Level (7-9)</strong> {{ trans('game.patent3')}}
              @if ($user_level >= 7 && $user_level <= 9)
              <div class="uk-badge uk-badge-warning">Você está aqui</div>
              @endif
              <div class="uk-text-muted">{{ trans('game.patent3-description')}}</div>
          </dt>
          <dt>
              <strong>Level (10-12)</strong> {{ trans('game.patent4')}}
              @if ($user_level >= 10 && $user_level <= 12)
              <div class="uk-badge uk-badge-warning">Você está aqui</div>
              @endif
              <div class="uk-text-muted">{{ trans('game.patent4-description')}}</div>
          </dt>
          <dt>
              <strong>Level (13-14)</strong> {{ trans('game.patent5')}}
              @if ($user_level >= 13 && $user_level <= 14)
              <div class="uk-badge uk-badge-warning">Você está aqui</div>
              @endif
              <div class="uk-text-muted">{{ trans('game.patent5-description')}}</div>
          </dt>
          <dt>
              <strong>Level (15)</strong> {{ trans('game.patent6')}}
              @if ($user_level >= 15)
              <div class="uk-badge uk-badge-warning">Você está aqui</div>
              @endif
              <div class="uk-text-muted">{{ trans('game.patent6-description')}}</div>
          </dt>
      </dl>
  </li>
  <li>
      <ul class="uk-list insignas" style="overflow-y: scroll; height: 400px">
        @php
        $user_insignas = auth()->user()->insignas->map(function($insigna_log){ return ['key' => $insigna_log->insigna->key]; });
        @endphp

        @forelse($all_insignas as $insigna)
            @if($user_insignas->contains('key', $insigna->key))
              <li>
                  <figure data-uk-modal="{target:'#insigna-{{ $insigna->id }}'}" class="uk-thumbnail uk-border-circle" style="width: 100px">
                      <img src="{{ url('/img/insignias') }}/{{ $insigna->key }}.png" alt="" data-uk-tooltip title="{{ $insigna->name }}">
                  </figure>
              </li>
            @else
              <li>
                  <figure data-uk-modal="{target:'#insigna-{{ $insigna->id }}'}" class="uk-thumbnail uk-border-circle gray" style="width: 100px">
                      <img src="{{ url('/img/insignias') }}/{{ $insigna->key }}.png" alt="" data-uk-tooltip title="Como eu consigo essa insigna?">
                  </figure>
              </li>
            @endif
        @empty
        {!! trans('game.empty-insignas') !!}
        @endforelse

      </ul>
      <p><i class="uk-icon-exclamation-circle"></i> Uma insigna cinza significa que você ainda não conquistou ela ainda!</p>
  </li>
  <li>
    <ul class="uk-list uk-list-line ranking-list">
      @forelse ($ranking as $player)
      <li>
          <div class="uk-border-circle uk-hidden-small" style="width: 60px; display: inline-block">
              <a href="{{ url('/player') . '/' . $player->nickname }}">
                <img src="{{ $player->avatar() }}" alt="{{ $player->name }} avatar" class="uk-border-circle avatar">
              </a>
          </div>
          <ul class="uk-list" style="display: inline-block;">
              <li># <strong>{{ $player->row}}</strong> &nbsp; <a href="{{ url('/player') . '/' . $player->nickname }}"><strong>{{ $player->name }}</strong></a> ({{ $player->patente() }})</li>
              <li><i class="uk-icon-exclamation"></i> Level: {{ $player->level }} - ({{$player->xp}} XP)</li>
          </ul>
      </li>
      @empty
        <p>Acho que ninguém começou a jogar ainda :(</p>
      @endforelse
    </ul>
  </li>
</ul>
</div>
</div>
