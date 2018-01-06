<?php

namespace App\Http\Controllers\Sites\PugVenturesLLC\Ebay;

use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp;

trait EbayTaxonomyAPI {
    
    private static function getDefaultCategoryTreeId() {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate()]]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/get_default_category_tree_id?marketplace_id=EBAY_US');
        
        return json_decode((string)$response->getBody());
    }
    
    public static function getCategoryTree() {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate(), 'Accept-Encoding' => 'application/gzip']]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getDefaultCategoryTreeId()->categoryTreeId);
        
        return json_decode((string)$response->getBody());
    }
    
    public static function getCategorySubTree($categoryId) {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate(), 'Accept-Encoding' => 'application/gzip']]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getCategoryTree()->categoryTreeId . '/get_category_subtree?category_id=' . $categoryId);
        
        return json_decode((string)$response->getBody());
    }
    
    public static function getCategorySuggestions(Request $request) {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate(), 'Accept-Encoding' => 'application/gzip']]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getCategoryTree()->categoryTreeId . '/get_category_suggestions?q=' . $request->get('title'));
        
        return $response->getBody();
    }
    
    public static function getCategoryItemAspects(Request $request) {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate()]]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getCategoryTree()->categoryTreeId . '/get_item_aspects_for_category?category_id=' . $request->get('categoryId'));
        
        return $response->getBody();
    }

}