<?php

namespace App\Http\Controllers\Sites\PugVenturesLLC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\LLCContact;

class AdminController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function dashboard(Request $request)
    {
        return view('sites/pugventuresllc/dashboard');
    }
}