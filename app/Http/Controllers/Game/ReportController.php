<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use Cache;
use Mail;

class ReportController extends Controller
{
    /**
     * Email remetende.
     */
    const from = 'from@astrogame.me';

    /**
     * Envio para o envio.
     */
    const to = 'to@gmail.com';

    /**
     * Função para envio de bug reports ou sugestões por email.
     *
     * @param StoreReportRequest $request [description]
     *
     * @return [type] [description]
     */
    public function send(StoreReportRequest $request)
    {
        $data = ['name' => auth()->user()->name, 'email' => auth()->user()->email, 'mensagem' => $request->text];
        $mail = Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from(ReportController::from, 'Astrogame');
            $message->subject('Bug Report do Astrogame '.$data['name']);
            $message->to(ReportController::to);
        });

        if ($mail) {
            if (!Cache::has('report-'.auth()->user()->id)) {
                // evita ganhar muito XP! só depois de 30 minutos pode ganhar denovo.
                Cache::put('report-'.auth()->user()->id, true, 30);

                auth()->user()->gain_xp(100);
                session()->put('notify',
                [
                    ['text' => '<i class="uk-icon-arrow-up"></i> Ganhou 100 de XP por enviar uma sugestão', 'status' => 'warning', 'timeout' => 3000],
                ]);
            }

            return response()->json(['status' => true, 'text' => trans('game.bug-success')]);
        } else {
            return response()->json(['status' => false, 'text' => trans('game.bug-fail')]);
        }
    }
}
