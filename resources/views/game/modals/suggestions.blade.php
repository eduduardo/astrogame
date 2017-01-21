<!-- bug report modal -->
<form id="bug-report" method="POST" action="{{ URL('/game/report') }}" class="uk-form">
    {!! csrf_field() !!}
    {!! Honeypot::generate('form_name', 'form_time') !!}
    <div id="bug-report-modal" class="uk-modal">
        <div class="uk-modal-dialog">
            <a href="" class="uk-modal-close uk-close"></a>
            <div class="uk-modal-header">
                <h2>{{ trans('game.bug-title') }}</div>
                <div class="uk-form-row">
                    <p class="uk-text-muted">Você pode nos enviar sugestões de novas fases, ideias de jogos, melhorias, erros que estão acontecendo no jogo, críticas, e qualquer outra ideia que vier a sua mente.</p>
                    <div class="uk-form-controls">
                        <textarea name="text" minlength="10" rows="5" style="width: 100%" required></textarea>
                    </div>
                </div>
            <div class="uk-modal-footer uk-text-right">
                <div class="uk-button-group">
                    <button class="uk-modal-close uk-button uk-button-danger"><i class="uk-icon-trash"> </i> {{ trans('game.cancel') }}</button>
                    <button type="submit" class="uk-button uk-button-primary"><i class="uk-icon-send"></i> {{ trans('game.submit') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
