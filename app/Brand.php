<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = ['id', 'name', 'logo', 'created_at', 'updated_at'];
    
    public function products() {
        return $this->hasMany( Product::class, 'brand_id' );
    }    
}
