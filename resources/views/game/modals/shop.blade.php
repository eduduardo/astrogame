<!-- shop modal -->
<div id="shop" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close"></a>
        <div class="uk-modal-header">
            <h3 class="uk-panel-header">{{ trans('game.shop-name') }} <i class="uk-icon-shopping-cart"></i> </h3>
        </div>

        <ul class="uk-tab" data-uk-tab="{connect:'#tab-shop'}" data-uk-check-display>
            <li aria-expanded="true" class="uk-active"><a href="#"><i class="uk-icon-search"></i> Instrumentos óticos</a></li>
            <li class="" aria-expanded="false"><a href="#"><i class="uk-icon-book"></i> Livros</a></li>
            <li class="" aria-expanded="false"><a href="#"><i class="uk-icon-space-shuttle"></i> Peças</a></li>
            <div class="uk-align-right">Astrocoins: <i class="uk-icon-money"></i> <strong class="money">{{ $user_money }}</strong></div>
        </ul>

        <ul id="tab-shop" class="uk-switcher uk-margin">
            @foreach($shop as $category)
            <li aria-hidden="false" class="uk-active">
                <ul class="uk-list bag">
                @foreach($category as $item)
                    <li>
                        @if ($item->max_stack > 1)
                        <span class="uk-badge uk-badge-danger" title="{{ trans('game.item-max') }}" data-uk-tooltip>{{ $item->max_stack }}</span>
                        @endif
                        <figure class="uk-thumbnail uk-text-center buy-item" onclick="buy_item({{ $item->id }});">
                            <img src="{{ url('/img/items') }}/{{ $item->img_url }}.png" alt="" title="{{ $item->name }}" data-uk-tooltip >
                        </figure>
                        <figcaption class="uk-align-center uk-text-center">
                            <span class="price" title="Preço" data-uk-tooltip><i class="uk-icon-money"></i> {{ $item->price }}</span>
                        </figcaption>
                    </li>
                @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
