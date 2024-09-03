<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PickupLocation extends Model
{
    //
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
