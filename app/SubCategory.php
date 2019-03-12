<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];


    public function getCategory($id){


        return Category::join('category_sub_categories','categories.id','=','category_sub_categories.category_id')->where('category_sub_categories.subcategory_id', $id)->pluck('title')->first();

    }
}
