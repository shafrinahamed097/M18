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

    function whereNull(){
        $products = DB::table('products')->whereNull('price')->get();
        return $products;
    }

    function whereNotNull(){
        $products = DB::table('products')->whereNotNull('price')->get();
        return $products;
    }

    function whereDate(){
        $products = DB::table('products')->whereDate('updated_at', '2024-11-15')->get();
        return $products;
    }

    function whereMonth(){
        $products = DB::table('products')->whereMonth('updated_at', '11')->get();
        return $products;
    }

    function whereDay(){
        $products = DB::table('products')->whereDay('updated_at', '15')->get();
        return $products;
    }

    function whereYear(){
        $products = DB::table('products')->whereYear('updated_at', '2024')->get();
        return $products;
    }

    function whereTime(){
        $products = DB::table('products')->whereTime('updated_at', '>','12:00:00')->get();
        return $products;
    }

     function whereIn(){
        $products = DB::table('products')->whereIn('price', [20,5000])->get();
        return $products;
     }

     function whereNotIn(){
        $products = DB::table('products')->whereNotIn('price', [20,5000])->get();
        return $products;
     }

     function whereColumn(){
         $products = DB::table('products')->whereColumn('updated_at', '>', 'created_at')->get();
         return $products;
     }


     /*
      Ordering, Grouping,Limit"
        - The order by method allows you to sort the results of a query by one or more columns.
        - The latest and oldest methods allow you to easily order results by date.
        - The inRandomOrder method may be used to sort the query results randomly.
        - The groupBy and having methods may be used to group the query results.
        - The skip and take methods to limit the number of results returned from the query or to skip a given number of results in the query.
      */

      function orderBy(){
        $brands = DB::table('brands')->orderBy('brandName', 'desc')->get();
        return $brands;
      }

      function inRandom(){
        $brands = DB::table('brands')->inRandomOrder()->get();
        return $brands;
      }

      function latestData(){
        $brands = DB::table('brands')->latest()->get();
        return $brands;
      }

      function oldestData(){
        $brands = DB::table('brands')->oldest()->get();
        return $brands;
      }

      function skipTake(){
        $products = DB::table('products')->skip(2)->take(2)->get();
        return $products;
      }

      function groupBy(){
        $products = DB::table('products')->groupBy('title')->get();
        return $products;
      }

      function groupByHaving(){
        $products = DB::table('products')->groupBy('title')->having('price', '>', 1000)->get();
        return $products;
      }


      /*
      Insert Statement
       - Insert method used to insert records into the database table.
       - The insert method accepts an array of columns names and values.
       */

       function Insert(){
        $brands = DB::table('brands')->insert([
            'brandName'=>'Lenovo',
            'brandImg'=>'lenovo Img'
        ]);
       }


      




     

     
}
