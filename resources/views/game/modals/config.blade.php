<!-- settings modal -->
<div id="settings" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <h2>{{ trans('game.config') }}</h2>
        <form class="uk-form">
            <div class="uk-form-row">
                <div class="uk-form-controls">
                    <label class="uk-form-label" for="enable-sound">
                        <i class="uk-icon-volume-off"></i>
                        <input id="volume-effects" type="range" min="0" max="100" value="100"> <i class="uk-icon-volume-up"></i> {{ trans('game.volume-sound') }}
                    </label>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-form-controls">
                    <label class="uk-form-label" for="enable-music">
                        <i class="uk-icon-volume-off"></i>
                        <input id="volume-music" type="range" min="0" max="100" value="{{ $music_volume }}"> <i class="uk-icon-music"></i> {{ trans('game.volume-music') }}
                    </label>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-form-controls">
                    <div class="uk-form-select" data-uk-form-select>
                        <select id="lang-select" name="lang">
                            <option value="pt-br" @if ($lang=='pt-br' ) selected @endif>Português Brasileiro</option>
                            <option value="en" @if ($lang=='en' ) selected @endif>English</option>
                        </select>
                        <label for="lang"><i class="uk-icon-language"></i> {{ trans('game.language') }}</label>
                    </div>
                </div>
            </div>
        </form>
        <div class="uk-margin-top">
            @if($tutorial)
              <button class="uk-button uk-button-danger" id="tutorial-done">Desativar Tutorial <i class="uk-icon-close"></i></button>
              <button class="uk-button uk-button-primary" id="tutorial-again" style="display:none">Ativar Tutorial <i class="uk-icon-exclamation"></i></button>
            @else
              <button class="uk-button uk-button-primary" id="tutorial-again">Ativar Tutorial <i class="uk-icon-exclamation"></i></button>
              <button class="uk-button uk-button-danger" id="tutorial-done" style="display:none">Desativar Tutorial <i class="uk-icon-close"></i></button>
            @endif
        </div>
    </div>
</div>
