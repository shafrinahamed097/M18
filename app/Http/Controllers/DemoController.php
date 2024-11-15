<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    function Products(){
    //    $products = DB::table('products')->count();
    //    $products = DB::table('products')->max('price');
    //    $products = DB::table('products')->min('price');
    //    $products = DB::table('products')->avg('price');
    //    $products = DB::table('products')->sum('price');

    // $products = DB::table('products')->select('title', 'price', 'stock')->get();

    $products = DB::table('products')->select('title')->distinct()->get();
       return $products;
    }

    /**
     * Retrieve a list of brand images keyed by brand names from the 'brands' table.
     *
     * @return \Illuminate\Support\Collection A collection of brand images with brand names as keys.
     */

    function Brands(){
        $brands = DB::table('brands')->pluck('brandImg',"brandName");
        return $brands;
    }

    function Categories(){
        $categories = DB::table('categories')->get();
        return $categories;
    }

    function Profiles(){
        $profiles = DB::table('profiles')->get();
        return $profiles;

    }

    function InnerJoin(){
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id');
        return $products->get();
    }




}
