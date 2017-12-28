<?php

namespace App\Http\Controllers\Sites\PugVenturesLLC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function products(Request $request)
    {
        // TODO: Population of 'user' needs to be a global event on every request
        $this->data['user'] = Auth::user();
        $this->data['products'] = Product::with(['type', 'vendor', 'brand'])->paginate(25);

        return view('sites.pugventuresllc.products', $this->data);
    }
    
    public function editProduct(Request $request, $id)
    {
        // TODO: Population of 'user' needs to be a global event on every request
        $this->data['user'] = Auth::user();
        $this->data['product'] = Product::with(['type', 'vendor', 'brand'])->where('id', $id)->first();

        return view('sites.pugventuresllc.product', $this->data);
    }
}