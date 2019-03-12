<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section3 extends Model
{
    protected $fillable = [
        'bannerUrl',
        'categoryId'
    ];

    public function getCategorySlug($id){

        $category = Category::find($id);

        return $category->slug;
    }
}
