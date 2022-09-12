<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title'=>'required | min:3 | max:255 ',
            'description'=>'required | min:10 | max:400',
            'rooms'=>'required | numeric',
            'beds'=>'required | numeric',
            'bathrooms'=>'required | numeric',
            'mq'=>'required | numeric',
            'address'=>'required',
            'image'=>'nullable|image|max:32000',
            'house_type'=>'required | min:3 | max:200',
            'room_type'=>'required | min:3 | max:200',
        ];

    }

    public function messages()
    {
        // 'name.required'=>'Il nome è obbligatorio',
       return[
        'required'=> 'Il campo :attribute è obbligatorio',
        'min'=> [
            'numeric'=> 'il valore di :attribute non può essere inferiore a :min',
            'string'=> 'il campo :attribute non può avere meno di :min caratteri'
        ],

        'max'=> [
            'string'=> 'il campo :attribute non può avere più di :max caratteri'
        ],

        'numeric'=> 'Il campo :attribute deve essere un numero'
       ];

    }

    public function attributes()
    {
        return [

            'title'=>'titolo',
            'description'=>'descrizione',
            'rooms'=>'stanze',
            'beds'=>'letti',
            'bathrooms'=>'bagni',
            'mq'=>'metri quadri',
            'address'=>'indirizzo',
            'house_type'=>'tipologia appartamento',
            'room_type'=>'tipologia alloggio',
        ];
    }
}
