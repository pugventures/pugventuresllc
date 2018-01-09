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
        $this->data['product'] = self::createEmptyProduct();
        ;
        $this->data['variationAttributes'] = VariationAttribute::with('variationAttributeOptions')->get();

        return view('sites.pugventuresllc.product.add', $this->data);
    }

    public function submitProduct(Request $request) {

        // Validation
        $validation = $request->validate([
            'title' => 'required|max:80',
        ]);

        dd('ok');
    }

    public function imageUpload(Request $request, $id = null) {
        // TODO: Need to associate the id with the images if it's an edit
        // TODO: There will be a problem with files of the same name being
        //       overwritten if another file with the same name comes in
        return $request->file('file')->storeAs('public/products', Input::file('file')->getClientOriginalName());
    }

    public function saveDraft(Request $request) {
        // Validation
        $validation = $request->validate([
            'id' => 'required|integer',
            'field' => 'required|filled',
            'value' => 'required|filled'
        ]);

        $field = $request->get('field');
        $value = $request->get('value');
        $product = Product::where('id', $request->get('id'))->first();
        $product->$field = $value;
        $product->save();
        
        return $product;
    }

    private function createEmptyProduct() {
        $product = new Product();
        $product->save();

        return $product;
    }

}
