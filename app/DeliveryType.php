<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    protected $fillable = [
        'title',
        'fee',
        'type',
        'duration'
    ];
}
