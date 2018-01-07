<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationAttributeOption extends Model {

    protected $table = 'variation_attribute_options';

    public function variationAttribute() {
        return $this->belongsTo('App\Models\VariationAttribute');
    }

}
