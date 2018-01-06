<?php

namespace App\Http\Controllers\Sites\PugVenturesLLC;

use App\Http\Controllers\Controller;
use GuzzleHttp;

class EbayController extends Controller {
    
    use \App\Http\Controllers\Sites\PugVenturesLLC\Ebay\EbayTaxonomyAPI;
    
    private static function authenticate(){
        $base64Auth = base64_encode('PugVentu-Primary-PRD-d5d7504c4-fe7871e2:PRD-5d7504c42790-3986-4fac-a791-e208');
        $client = new GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/x-www-form-urlencoded', 'Authorization' => 'Basic ' . $base64Auth]]);
        $response = $client->post('https://api.ebay.com/identity/v1/oauth2/token', ['body' => 'grant_type=client_credentials&redirect_uri=Pug_Ventures__L-PugVentu-Primar-sqsmzjswb&scope=https://api.ebay.com/oauth/api_scope']);
        return json_decode((string)$response->getBody())->access_token;
    }

}
