<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function expoete()
    {
        return view('promos.expoete');
    }

    public function reedem(Request $request)
    {
        // http://astrogame.me/promo/reedem/EuVisiteiOAstrogameExpoete2016EGanheiItems
        $code = $request->code;

        if ($code != 'EuVisiteiOAstrogameExpoete2016EGanheiItems') {
            session()->put('notify',
          [
              ['text' => '<i class="uk-icon-close"></i> Nenhum código promocional encontrado', 'status' => 'danger', 'timeout' => 3000],
          ]);

            return redirect('/');
        }

        session()->put('promo', 'expoete2016');

        return redirect('/game');
    }
}
