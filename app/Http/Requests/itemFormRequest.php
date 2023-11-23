<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'title' => 'required|max:40',
            'price' => 'required|numeric|min:1',
            'body' => 'required|max:5000',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'max:4', // Imposta il limite massimo a 4 file
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo "Nome prodotto" non può essere vuoto.',
            'title.max' => 'Il campo Titolo non può essere più lungo di :max caratteri',
            'body.required' => 'Il campo "Descrizione" non può essere vuoto.',
            'body.max' => 'Il campo "Descrizione" non può essere più lungo di :max caratteri',
            'images.*.image' => 'Ogni file deve essere un\'immagine valida.',
            'images.*.mimes' => 'I file devono essere di uno dei seguenti formati: jpeg, png, jpg, gif.',
            'images.*.max' => 'Ogni immagine non può superare i 2048 kilobyte.',
            'images.max' => 'Non è possibile caricare più di 4 immagini.',
            'price.required' => 'Il campo "Prezzo" è obbligatorio.',
            'price.numeric' => 'Il "Prezzo" deve essere un numero.',
            'price.min' => 'Il "Prezzo" deve essere almeno 1.',
        ];
    }
}
