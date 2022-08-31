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
            'title'=>'required|min:3|max:255|unique:announcements',
            'rooms'=>'required|min:1|numeric',
            'description'=>'required|min:10|max:400',
            'beds'=>'required|min:1|numeric',
            'bathrooms'=>'required|min:1|numeric',
            'mq'=>'required|min:15|numeric',
            'address'=>'required|min:7|max:200',
            'city'=>'required|min:2|max:250',
            'country'=>'required|min:2|max:250',
            'image'=>'nullable|image|max:32000',
            'house_type'=>'required|min:3|max:200',
            'room_type'=>'required|min:3|max:200',
        ];
    }

    // public function messages()
    // {
    //     // 'name.required'=>'Il nome è obbligatorio',
    //    return[
    //     'required'=> 'Il campo :attribute è obbligatorio',
    //     'min'=> [
    //         'numeric'=> 'il valore di :attribute non può essere inferiore a :min',
    //         'string'=> 'il campo :attribute non può avere meno di :min caratteri'
    //     ],

    //     'max'=> [
    //         'numeric'=> 'il valore di :attribute deve essere inferiore a :max',
    //         'string'=> 'il campo :attribute non può avere meno di :max caratteri'
    //     ],

    //     'numeric'=> 'Il campo :attribute deve essere un numero',
    //     'image'=> 'Il file :attribute deve essere un\'immagine'
    //    ];

    // }


    // public function attributes()
    // {
    //     return [
    //         'title'=>'titolo',
    //         'rooms'=>'stanze',
    //         'beds'=>'letti',
    //         'bathrooms'=>'bagni',
    //         'mq'=>'metri quadri',
    //         'address'=>'via',
    //         'city'=>'città',
    //         'country'=>'paese',
    //         'image'=>'immagine',
    //         'house_type'=>'tipologia abitazione',
    //         'room_type'=>'tipologia di camera',
    //     ];
    // }
}
