<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryTypeRequest extends FormRequest
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
            'title' => 'required|min:2|unique:delivery_types,title',
            'type' => 'required',
            'duration' => 'required',
            'fee' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'title.unique' => 'This Delivery title already exist',

        ];
    }
}
