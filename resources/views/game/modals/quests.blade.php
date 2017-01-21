<!-- quests modal -->
<div id="quests" class="uk-modal">
    <div class="uk-modal-dialog" style="height: 530px;">
        <a href="" class="uk-modal-close uk-close"></a>
        <div class="uk-modal-header">
            <h3 class="uk-panel-header">{{ trans('game.quests') }} <span class="uk-badge uk-badge-warning">!</span></h3>
        </div>

        <ul class="uk-tab" data-uk-tab="{connect:'#tab-quests'}" data-uk-check-display>
            <li aria-expanded="true" class="uk-active"><a href="#"><i class="uk-icon-exclamation"></i> Disponíveis</a></li>
            <li aria-expanded="true"><a href="#"><i class="uk-icon-exclamation-triangle"></i> Aceitas</a></li>
            <!-- <li aria-expanded="true"><a href="#"><i class="uk-icon-exclamation-circle"></i> Completadas</a></li> -->
        </ul>

        <ul id="tab-quests" class="uk-switcher uk-margin">
            <li class="uk-active">
                @if (!empty($avaliable_quests->first()))
                <div class="uk-grid" data-uk-grid>
                    <div class="uk-width-medium-1-3 uk-text-center uk-margin-bottom">
                        <h3>{{ trans('game.quest-avaliable') }}</h3> @foreach ($avaliable_quests as $quest)
                        <div class="uk-hidden" id="quest-title-{{$quest->id}}">{{ $quest->title }}</div>
                        <div class="uk-hidden" id="quest-name-{{$quest->id}}">{{ $quest->name }}</div>
                        <div class="uk-hidden" id="quest-description-{{$quest->id}}">{!! $quest->description !!}</div>
                        <div class="uk-hidden" id="quest-objetivos-{{$quest->id}}">{!! $quest->objetivos !!}</div>
                        <div class="uk-hidden" id="xp-reward-{{$quest->id}}">{{ $quest->xp_reward }}</div>
                        <div class="uk-hidden" id="money-reward-{{$quest->id}}">{{ $quest->money_reward }}</div>
                        @endforeach
                        <select class="uk-form-select quest-avaliable" id="avaliable_quests">
                            @foreach ($avaliable_quests as $quest)
                            <option value="{{ $quest->id }}">{{$quest->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-2-3 uk-overflow-container">
                        <div>
                            <h3 class="quest-title">{{ $avaliable_quests->first()->title }}</h3>
                            <p class="quest-description">{!! $avaliable_quests->first()->description !!}</p>
                            <h5><strong>Objetivos</strong></h5>
                            <p class="quest-objetivos">{!! $avaliable_quests->first()->objetivos !!}</p>
                        </div>
                        <h3>{{ trans('game.quest-reward') }}</h3>
                        <div class="uk-grid" data-uk-grid>
                            <div class="uk-width-2-4">
                                <span><i class="uk-icon-money"></i>&nbsp;<span class="money-reward">{{ $avaliable_quests->first()->money_reward }}</span></span> /
                                <span><i class="uk-icon-exclamation"></i>&nbsp;<span class="xp-reward">{{ $avaliable_quests->first()->xp_reward }}</span> XP</span>
                            </div>
                            <div class="uk-width-2-4 uk-text-right">
                                <button class="uk-button uk-button-success accept-quest" value="{{ $avaliable_quests->first()->id }}">{{ trans('game.quest-get') }} <i class="uk-icon-exclamation"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <p>Parece que não há nenhuma quest disponível :(</p>
                @endif
            </li>
            <li>
                @if (!empty($accepted_quests->first()))
                <div class="uk-grid" data-uk-grid>
                    <div class="uk-width-medium-1-3 uk-text-center uk-margin-bottom">
                        <h3>{{ trans('game.quest-accepted') }}</h3> @foreach ($accepted_quests as $quest)
                        <div class="uk-hidden" id="quest-title-{{$quest->id}}">{{ $quest->title }}</div>
                        <div class="uk-hidden" id="quest-name-{{$quest->id}}">{{ $quest->name }}</div>
                        <div class="uk-hidden" id="quest-description-{{$quest->id}}">{{ $quest->description }}</div>
                        <div class="uk-hidden" id="xp-reward-{{$quest->id}}">{{ $quest->xp_reward }}</div>
                        <div class="uk-hidden" id="money-reward-{{$quest->id}}">{{ $quest->money_reward }}</div>
                        @endforeach
                        <select class="uk-form-select quest-avaliable" id="accepted_quests">
                            @foreach ($accepted_quests as $quest)
                            <option value="{{ $quest->id }}">{{$quest->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="uk-width-medium-2-3 uk-overflow-container">
                        <div>
                            <h3 class="quest-title">{{ $accepted_quests->first()->title }}</h3>
                            <p class="quest-description">{!! $accepted_quests->first()->description !!}</p>
                            <h5><strong>Objetivos</strong></h5>
                            <p class="quest-objetivos">{!! $accepted_quests->first()->objetivos !!}</p>
                        </div>
                        <h3>{{ trans('game.quest-reward') }}</h3>
                        <div class="uk-grid" data-uk-grid>
                            <div class="uk-width-2-4">
                                <span><i class="uk-icon-money"></i>&nbsp;<span class="money-reward">{{ $accepted_quests->first()->money_reward }}</span></span> /
                                <span><i class="uk-icon-exclamation"></i>&nbsp;<span class="xp-reward">{{ $accepted_quests->first()->xp_reward }}</span> XP</span>
                            </div>
                            <div class="uk-width-2-4 uk-text-right">
                                <a href="{{ URL('/game/quest') . '/' . $accepted_quests->first()->name }}" class="ajax-link uk-button uk-button-danger return-quest">Retornar a missão <i class="uk-icon-external-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <p>Você não aceitou nenhuma quest ainda</p>
                @endif
            </li>
        </ul>
    </div>
</div>
