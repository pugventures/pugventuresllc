<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationAttribute extends Model
{
    protected $table = 'variation_attributes';
    
    public function variationAttributeOptions()
    {
        return $this->hasMany('App\Models\VariationAttributeOption');
    }
}
