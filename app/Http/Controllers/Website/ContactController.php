<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    const email = 'email@email.com';
    /**
   * Enviar formulário de contato para a equipe.
   *
   * @param object Request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(ContactRequest $request)
  {
      $data = ['name' => $request->name, 'email' => $request->email, 'mensagem' => $request->mensagem];
      $mail = Mail::send('emails.contact', $data, function ($message) use ($data) {
          $message->from($data['email'], $data['name']);
          $message->subject('Contato do Astrogame '.$data['name']);
          $message->to(ContactController::email);
      });

      if ($mail) {
          return redirect('contato')->with(['status' => true]);
      } else {
          return redirect('contato')->withErrors(['Não foi possível enviar o contato, tente mais tarde'])->withInput();
      }
  }

  /**
   * Página sobre do contato.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('project.contact', ['page' => 'contato']);
  }
}
