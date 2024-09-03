<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    //
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function modelProduct() {
        return $this->hasMany( Product::class, 'model_id' );
    }

    public function products()
    {
        return $this->hasManyThrough('App\ProductVehicle', 'App\Vehicle','model_id', 'vehicle_id');
    }
}
