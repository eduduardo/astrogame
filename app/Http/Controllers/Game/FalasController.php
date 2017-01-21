<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;

class FalasController extends Controller
{
    public function getFromChapter(Request $request)
    {
        $chapter = $request->chapter;
        $chapters_falas = Lang::get('chapters.'.$chapter);
        $array = ['c2array' => true,
                  'size'    => [9, 1, 1],
                  'data'    => $chapters_falas, ];

        return response()->json([$array]);
    }
}
