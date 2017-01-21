<!-- insignas details modal -->
@forelse($all_insignas as $insigna)
<div id="insigna-{{ $insigna->id }}" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="#" class="uk-modal-close uk-close"></a>
        <h3>{{ $insigna->name }}</h3>

        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-1-4">
                <figure class="uk-thumbnail uk-border-circle">
                    <img src="{{ url('/img/insignias') }}/{{ $insigna->key }}.png" alt="" data-uk-tooltip title="{{ $insigna->name }}">
                </figure>
            </div>
            <div class="uk-width-3-4">
                <h3>Descrição</h3>
                <p>{{ $insigna->reason }}</p>

                <h3>Como conseguir?</h3>
                <p>{{ $insigna->how }}</p>
            </div>
        </div>

    </div>
</div>
@endforeach

<!-- observatory -->
<div id="observatory" class="uk-modal">
  <div class="uk-modal-dialog uk-modal-dialog-large">
    <a href="" class="uk-modal-close uk-close"></a>
    <div id="starmap" style="width:100%;height:500px;"></div>
    <p><strong>Dica:</strong> Você pode ver mais objetos no céu comprando livros na <a href="#shop" data-uk-modal="{target:'#shop'}"><i class="uk-icon uk-icon-shopping-cart"></i> loja</a>!</p>
    <p><strong>O platenátio ainda está em desenvolvimento, porém você pode observar todas as constelações aqui!</strong></p>
  </div>
</div>
<!-- campanha map -->
<div id="campaign" class="uk-modal">
  <div class="uk-modal-dialog">
    <a href="" class="uk-modal-close uk-close"></a>
    @include('game.general.map')
    </div>
</div>
