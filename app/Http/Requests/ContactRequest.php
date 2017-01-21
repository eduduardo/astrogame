<?php

namespace App\Http\Requests;

class ContactRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'      => 'required|max:255',
          'email'     => 'required|email|max:255',
          'mensagem'  => 'required|min:10|max:65535',
          'form_name' => 'honeypot',
          'form_time' => 'required|honeytime:15',
        ];
    }
}
