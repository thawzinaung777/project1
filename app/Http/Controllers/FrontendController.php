<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class FrontendController extends Controller
{
    public function welcome(){
        $products=Product::paginate(8);
        return view('welcome',compact('products'));
    }

     /*
       Product Search Function
    */

       public function search(Request $request){
            $str=$request->search;

            $products=Product::where('name','LIKE','%'.$str.'%')->paginate(8);
            $products->appends(['welcomesearch'=> $str]);
            

             return view('welcome',compact("products"));
    
       }

       public function orderTrack(){
      
          return view('ordertrack');
        }
 

       public function orderTrackSubmit(Request $request){
       $str=$request->searchStr;

        $myorder=Order::where('orderid','=',$str)->get();

       

         return view('ordertrack',compact("myorder"));
       }


       


}
