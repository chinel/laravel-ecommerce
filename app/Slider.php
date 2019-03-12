<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'big_slider1Url',
        'big_slider1CategoryId',
         'big_slider2Url',
        'big_slider2categoryId',
          'big_slider3Url',
        'big_slider3CategoryId',
           'small_slider1Url',
        'small_slider1CategoryId',
             'small_slider2Url',
        'small_slider2CategoryId',
           'small_slider3Url',
        'small_slider3CategoryId'
    ];

    public function getCategorySlug($id){

        $category = Category::find($id);

        return $category->slug;
    }
}
