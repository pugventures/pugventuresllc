<?php

namespace App\Http\Controllers\Sites\PugVenturesLLC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\Models\VariationAttribute;

class ProductController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function products(Request $request) {
        // TODO: Population of 'user' needs to be a global event on every request
        $this->data['user'] = Auth::user();
        $this->data['products'] = Product::with(['type', 'vendor', 'brand'])->paginate(25);

        return view('sites.pugventuresllc.product.products', $this->data);
    }

    public function addProduct(Request $request) {
        // TODO: Population of 'user' needs to be a global event on every request
        $this->data['user'] = Auth::user();
        $this->data['variationAttributes'] = VariationAttribute::with('variationAttributeOptions')->get();

        return view('sites.pugventuresllc.product.add', $this->data);
    }

    public function editProduct(Request $request, $id) {
        // TODO: Population of 'user' needs to be a global event on every request
        $this->data['user'] = Auth::user();
        $this->data['product'] = Product::with(['type', 'vendor', 'brand'])->where('id', $id)->first();

        return view('sites.pugventuresllc.product.edit', $this->data);
    }

    public function submitProduct(Request $request) {
        // Validation
        $validation = $request->validate([
            'title' => 'required|unique:posts|max:80',
            'description' => 'required',
            'upc' => 'required',
            'purchase_url' => 'required|active_url',
            'price' => 'required|integer'
        ]);
    }

    public function imageUpload(Request $request, $id = null) {
        // TODO: Need to associate the id with the images if it's an edit
        // TODO: There will be a problem with files of the same name being
        //       overwritten if another file with the same name comes in
        return $request->file('file')->storeAs('public/products', Input::file('file')->getClientOriginalName());
    }

}
