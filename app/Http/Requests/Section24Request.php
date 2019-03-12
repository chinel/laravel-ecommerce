<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Section24Request extends FormRequest
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
            'category_id' => 'required',
            'brandlist' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg',
            'subcategory1' => 'required',
            'subcategory2' => 'required',
            'subcategory3' => 'required',
            'subcategory4' => 'required',
            'subcategory5' => 'required',
            'subcategory1_childlist' => 'required',
            'subcategory2_childlist' => 'required',
            'subcategory3_childlist' => 'required',
            'subcategory4_childlist' => 'required',
            'subcategory5_childlist' => 'required'
        ];
    }
}
