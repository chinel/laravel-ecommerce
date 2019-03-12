<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section5 extends Model
{
protected $fillable = [
    'banner1Url',
    'banner1CategoryId',
    'banner2Url',
    'banner2CategoryId'
];

    public function getCategorySlug($id){

        $category = Category::find($id);

        return $category->slug;
    }

}
