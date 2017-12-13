<?php

namespace App\Http\Controllers\Sites\PugVenturesLLC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\LLCContact;

class ContactController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function send(Request $request)
    {
        Mail::to(env('PUGVENTURESLLC_EMAIL', 'dhansen@pugventuresllc.com'))
                ->send(new LLCContact($request));
    }
}