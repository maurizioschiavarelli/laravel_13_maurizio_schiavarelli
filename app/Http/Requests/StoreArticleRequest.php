<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //verifica se l utente ha autorizzazione
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:50', //controlla input title
            'body' => 'required',
            'cover'=> 'mimes:jpg,bmp,png',
            'author_id'=>'required|exists:authors,id',
        ];
    }

    public function messages()
    {

        return [
            'title.requred' => 'il titolo é obbligatorio',
            'title.max' => 'il titolo é troppo lungo',

            'body.required' => 'il body é obbligatorio',
            'cover.mimes'=> 'il formato immagine é sbagliato',

        ];
    }
}
