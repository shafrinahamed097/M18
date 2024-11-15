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
       $products = DB::table('products')->sum('price');
       return $products;
    }

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




}
