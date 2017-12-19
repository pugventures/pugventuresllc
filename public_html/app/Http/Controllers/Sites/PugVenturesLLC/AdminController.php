<?php

namespace App\Http\Controllers\Sites\PugVenturesLLC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class AdminController extends Controller
{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function dashboard(Request $request)
    {
        $this->data['user'] = Auth::user();
        return view('sites.pugventuresllc.dashboard', $this->data);
    }
    
    public function products(Request $request)
    {
        $this->data['user'] = Auth::user();
        $this->data['products'] = Product::all();
        return view('sites.pugventuresllc.products', $this->data);
    }
}