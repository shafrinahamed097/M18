<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
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
        $brands = DB::table('brands')->pluck('brandImg','brandName');
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

    function leftJoin(){
        $products = DB::table('products')
                  ->leftJoin('categories', 'products.category_id','=','categories.id')
                  ->leftJoin('brands', 'products.brand_id','=','brands.id');
        return $products->get();
    }


    function RightJoin(){
        $products = DB::table('products')
        ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
        ->rightJoin('brands', 'products.brand_id', '=', 'brands.id');
        return $products->get();
    }

    function CrossJoin(){
        $products = DB::table('products')
        ->crossJoin('brands')->get();

        return $products;
    }

    function AdvancedJoinClauses(){
        $products = DB::table('products')
        ->join('categories', function (JoinClause $join){
            $join->on('products.category_id', '=', 'categories.id')
            ->where('products.price', '>', 2000);
        })
        ->join('brands', function (JoinClause $join){
            $join->on('products.brand_id', '=', 'brands.id')
            ->where('brands.brandName', '=', 'Easy');

        })->get();
        return $products;
    }

    function Unions(){
        $query = DB::table('products')->where('price', '>', 2000);
        $otherQuery = DB::table('products')->where('products.discount', '=', 1)->union($query)->get();
        return $otherQuery;
    }


    // Advanced Where
    function orWhere(){
        $products = DB::table('products')
        ->where('products.price', '>', 2000)
        ->orWhere('products.price', '=', 20)->get();
        return $products;
    }

    function whereNot(){
        $products = DB::table('products')
        ->where('products.price', '>', 2000)
        ->whereNot('products.price', '=', 200)->get();
        return $products;
    }

    function whereBetween(){
        $products = DB::table('products')
        ->whereBetween('price', [3000,5000])->get();
        return $products;
    }

    function whereNotBetween(){
        $products = DB::table('products')
        ->whereNotBetween('price', [3000,5000])->get();
        return $products;
    }
}
