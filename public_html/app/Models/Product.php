<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';

    public function type() {
        return $this->hasOne('App\Models\ProductType', $remote = 'id', $local = 'product_type_id');
    }

    public function vendor() {
        return $this->hasOne('App\Models\Vendor', $remote = 'id', $local = 'vendor_id');
    }

    public function brand() {
        return $this->hasOne('App\Models\Brand', $remote = 'id', $local = 'brand_id');
    }

}
