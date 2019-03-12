<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SideBarBanner extends Model
{
    protected  $fillable = [
        'banner1',
        'banner1Url',
        'banner2',
        'banner2Url',
        'banner3',
        'banner3Url',
    ];
}
