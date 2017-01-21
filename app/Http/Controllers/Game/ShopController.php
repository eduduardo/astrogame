<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Bag;
use App\Models\Item;
use Illuminate\Http\Request;

class ShopController extends GameController
{
    /**
     * Função para a compra de um item.
     *
     * @param ItemRequest $request | (id)
     *
     * @return json | return mixed
     */
    public function buy_item(ItemRequest $request)
    {
        $item_id = $request->id;

        $user = auth()->user();
        $item = Item::select('id', 'name', 'price', 'min_level', 'max_stack', 'img_url')->where('id', $item_id)->limit(1)->get()->first();

        if ($item->min_level > $user->level) {
            return ['status_or_price' => false, 'msg' => 'Não é possível comprar esse item devido ao seu level'];
        }

        if ($user->money < $item->price) {
            return ['status_or_price' => false, 'msg' => 'Não é possível comprar esse item, pois não há astrocoins suficiente'];
        }

        if ($user->has_item_amount($item->id) >= $item->max_stack) {
            return ['status_or_price' => false, 'msg' => 'Você não pode carregar mais desse item'];
        }

        $user->decrement('money', $item->price);
        $user->save();

        $item_on_bag = Bag::where('user_id', $user->id)->where('item_id', $item->id)->limit(1)->first();
        if ($item_on_bag) {
            // aumenta a quantidade de items
            Bag::where('user_id', $user->id)->where('item_id', $item->id)->increment('amount', 1);
        } else {
            // insere um novo registro
            Bag::insert(['user_id' => $user->id, 'item_id' => $item->id]);
        }

        $item_return = ['status_or_price' => $item->price, 'msg' => $item->name.' comprado',
            'item'                        => $item,
            'item_id'                     => $item_id,
            // checar se já tem esse item, evitar apenas mudança de quantidade
            // @TODO tranformar esse HTML em json.
            'html' => '<li onclick="remove_item('.$item->id.')" class="item-'.$item->id.'"><span class="uk-badge uk-badge-success">1</span><figure class="uk-thumbnail" data-uk-tooltip title="'.$item->name.'"><img src="'.url('/img/items').'/'.$item->img_url.'.png" alt="" data-uk-tooltip=""></figure></li>',
          ];

        return response()->json($item_return);
    }

    /**
     * Request para remoção de um item da mochila.
     *
     * @param ItemRequest $request
     *
     * @return json | mixed array
     */
    public function remove_item(ItemRequest $request)
    {
        $item_id = $request->id;
        $item_return = $this->remove_item_from_bag($item_id, 1);

        return response()->json(['status' => true, 'msg' => 'Item removido!']);
    }

    /**
     * Função para remover item da mochila.
     *
     * @param int $item_id | id do item exsistente no banco de dados
     * @param int $amount  | quantidade de itens
     *
     * @return json
     */
    public function remove_item_from_bag($item_id, $amount)
    {
        $user_id = auth()->user()->id;

        if (auth()->user()->has_item_amount($item_id) == $amount) {
            // remove todos os items
            return Bag::where('item_id', $item_id)->where('user_id', $user_id)->delete();
        }

        Bag::where('user_id', $user_id)->where('item_id', $item_id)->decrement('amount', $amount);
    }
}
