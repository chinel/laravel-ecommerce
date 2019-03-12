<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SideBarBannerRequest extends FormRequest
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
            'banner1' => 'required|image|mimes:jpeg,png,jpg',
            'banner1Url' => 'required|url',
            'banner2' => 'required|image|mimes:jpeg,png,jpg',
            'banner2Url' => 'required|url',
            'banner3' => 'required|image|mimes:jpeg,png,jpg',
            'banner3Url' => 'required|url',
        ];
    }
}
