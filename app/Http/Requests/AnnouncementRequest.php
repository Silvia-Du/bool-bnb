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
            'title'=>'required | min:3 | max:255 | unique:announcements',
            'description'=>'required | min:10 | max:400',
            'rooms'=>'required | min:1 | numeric',
            'beds'=>'required | min:1 | numeric',
            'bathrooms'=>'required | min:1 | numeric',
            'mq'=>'required | min:30 | numeric',
            'address'=>'required | min:7 | max:200',
            'image'=>'nullable|image|max:32000',
            'house_type'=>'required | min:3 | max:200',
            'room_type'=>'required | min:3 | max:200',
        ];
    }
}
