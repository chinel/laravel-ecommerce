<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'big_slider1' => 'required|image|mimes:jpeg,png,jpg',
            'big_slider1CategoryId' => 'required',
            'big_slider2' => 'required|image|mimes:jpeg,png,jpg',
            'big_slider2categoryId' => 'required',
            'big_slider3' => 'required|image|mimes:jpeg,png,jpg',
            'big_slider3CategoryId' => 'required',
            'small_slider1' => 'required|image|mimes:jpeg,png,jpg',
            'small_slider1CategoryId' => 'required',
            'small_slider2' => 'required|image|mimes:jpeg,png,jpg',
            'small_slider2CategoryId' => 'required',
            'small_slider3' => 'required|image|mimes:jpeg,png,jpg',
            'small_slider3CategoryId' => 'required'
        ];
    }
}
