<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    function Products(){
       $products = DB::table('products')->get();
       return $products;
    }

    function Brands(){
        $brands = DB::table('brands')->get();
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
