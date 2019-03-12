<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Section6Request extends FormRequest
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
            'category1' => 'required',
            'banner1' => 'required',
            'product1List' => 'required',
            'category2' => 'required',
            'banner2' => 'required',
            'product2List' => 'required'

        ];
    }
}
