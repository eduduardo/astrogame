<?php

namespace App\Http\Middleware;

use App;
use Closure;

class Language
{
    public $avaliable_langs = ['pt-br' => 'pt-br',
                               'pt-BR' => 'pt-br',
                               'pt'    => 'pt-br',
                               'en'    => 'en',
                               'en-US' => 'en', ];

    /**
     * Handle an incoming request.
     * Checa se há uma linguagem settada na sessão, se sim, muda a lang.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = session()->get('language', $this->browser_lang());
        App::setLocale($language);

        return $next($request);
    }

    private function browser_lang()
    {
        return 'pt-br'; // return pt-br até arrumar
        if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            return 'en';
        }

        $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        foreach ($languages as $lang) {
            if (array_key_exists($lang, $this->avaliable_langs)) {
                return $this->avaliable_langs[$lang];
            }
        }

        return 'en';
    }
}
