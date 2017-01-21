<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Input;

class AccountController extends GameController
{
    /**
     * Extensões disponíveis para envio de avatares.
     *
     * @var array
     */
    public $ext_avaliables = ['png', 'jpg', 'jpge', 'gif'];

    /**
     * Altera o volume da música do usuário.
     *
     * @param Request $request | precisa de um $volume entre 0 e 100
     *
     * @return void
     */
    public function change_volume_music(Request $request)
    {
        $volume = $request->volume;
        if ($volume > 100 || $volume < 0) {
            return 'Não é possível fazer isso';
        }
        Config::setConfig('music_volume', $volume);
    }

    /**
     * Altera o volume dos efeitos de um usuário.
     *
     * @param Request $request | precisa de um $volume entre 0 e 100
     *
     * @return void
     */
    public function change_volume_effects(Request $request)
    {
        $volume = $request->volume;
        if ($volume > 100 || $volume < 0) {
            return 'Não é possível fazer isso';
        }
        Config::setConfig('effects_volume', $volume);
    }

    /**
     * Altera o modo do perfil do usuário para privado ou público.
     *
     * @param Request $request | precisa de um $type (public|private)
     *
     * @return void
     */
    public function change_profile(Request $request)
    {
        if ($request->type == 'public') {
            Config::setConfig('private', false);
        } elseif ($request->type == 'private') {
            Config::setConfig('private', true);
        }
    }

    public function change_tutorial(Request $request)
    {
        if ($request->tutorial == 'done') {
            Config::setConfig('tutorial', false);

            return response()->json(['text' => 'Modo tutorial desativado', 'status' => 'danger']);
        } elseif ($request->tutorial == 'again') {
            Config::setConfig('tutorial', true);

            return response()->json(['text' => 'Modo tutorial ativado', 'status' => 'success']);
        }
    }

    /**
     * Função para alterar todas as configurações principais da conta de um usuário.
     *
     * @param Request $request | (name|email|nickname|old_password|new_password|avatar)
     *
     * @return json | mensagens dentro de uma json array
     */
    public function change_account(Request $request)
    {
        // falta um validator
        $messages = [];

        $name = $request->name;
        $email = $request->email;
        $nickname = $request->nickname;
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $avatar = $request->avatar;

        // mudou nome?
        if ($name != '' && auth()->user()->name != $name) {
            auth()->user()->name = $name;
            auth()->user()->save();
            $messages[] = ['status' => true, 'text' => 'Nome alterado'];
        }

        // mudou nickname?
        if ($nickname != '' && auth()->user()->nickname != $nickname) {
            if (User::select('id')->where('nickname', $nickname)->limit(1)->first()) {
                $messages[] = ['status' => false, 'text' => 'Nickname já utilizado no sistema'];
            } else {
                auth()->user()->nickname = $nickname;
                auth()->user()->save();
                $messages[] = ['status' => true, 'text' => 'Nickname alterado'];
            }
        }

        // mudou email?
        if ($email != '' && $email != auth()->user()->email) {
            if (User::select('id')->where('email', $email)->limit(1)->first()) {
                $messages[] = ['status' => false, 'text' => 'Email já utilizado no sistema'];
            } else {
                auth()->user()->email = $email;
                auth()->user()->save();
                $messages[] = ['status' => true, 'text' => 'Email alterado'];
            }
        }

        // mudou a senha?
        if ($old_password != '' && $new_password != '') {
            if (Hash::check($old_password, auth()->user()->password)) {
                auth()->user()->password = Hash::make($new_password);
                $messages[] = ['status' => true, 'text' => 'Senha alterada'];
            } else {
                $messages[] = ['status' => false, 'text' => 'Senha antiga inválida'];
            }
        }

        // mudou o avatar?
        if ($request->hasFile('avatar')) {
            if (in_array(strtolower($avatar->getClientOriginalExtension()), $this->ext_avaliables)) {
                auth()->user()->makeAvatar(Input::file('avatar'));
                $messages[] = ['status' => true, 'text' => 'Avatar alterado com sucesso', 'avatar' => auth()->user()->avatar()];
            } else {
                $messages[] = ['status' => false, 'text' => 'A foto deve ser em jpg, png, gif ou jpge'];
            }
        }

        return response()->json($messages);
    }

    /**
     * Remove o avatar de um usuário por GET.
     *
     * @return json
     */
    public function remove_avatar()
    {
        if (auth()->user()->remove_avatar()) {
            return response()->json(['status' => 'success', 'text' => '<i class="uk-icon-user"></i> Avatar removido', 'avatar' => auth()->user()->avatar()]);
        }
    }
}
