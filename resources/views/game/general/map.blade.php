<div class="uk-container uk-container-center">
    <div class="uk-grid" data-uk-grid>
        <div class="uk-width-1-1 map">
            <h1>Mapa da Campanha</h1>
            <dl class="uk-description-list-line">
                // arrumar aqui
                @for ($i = 0; $i < 0; $i++)
                <dt>
                    <div class="uk-badge">{{ $i + 1 }}</div> {{ $progress->keys[$i]['title'] }}

                    @if($chapter_current == $progress->keys[$i]['name'])
                    <strong> - VOCÊ ESTÁ AQUI </strong>
                    @endif

                    <div class="uk-text-muted">{{ $progress->keys[$i]['description'] }}</div>
                </dt>
                @endfor
            </dl>
            </div>
    </div>
</div>
