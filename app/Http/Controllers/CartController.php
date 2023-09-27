<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;



class CartController extends Controller
{

    public function list(){

        

         return view('cart');
    }


    public function add($id){


        $product = Product::findOrFail($id);

          
        //create session array 
        $cart = session()->get('cart', []);


        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            //mapping [key,value]
            //cart[key=id,value=Product]

            $cart[$id] = [

                'category'=>$product->category,

                'name' => $product->name,

                'quantity' => 1,

                'price' => $product->price,

                'photo' => $product->photo

            ];

        }

          
        //save clicked product into session array
        session()->put('cart', $cart);

        return redirect()->back();
    }


    public function remove($id){


        //create session array 
        $cart = session()->get('cart');


        if(isset($cart[$id])) {

            unset($cart[$id]);

        }

        //save clicked product into session array
        session()->put('cart', $cart);

         return redirect()->back();

     }


      public function increase($id){


        //create session array 
        $cart = session()->get('cart');

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } 

        //save clicked product into session array
        session()->put('cart', $cart);

         return redirect()->back();

     }

     public function decrease($id){


        //create session array 
        $cart = session()->get('cart');

        if(isset($cart[$id])) {

            if($cart[$id]['quantity']==1){

                unset($cart[$id]); 
                //save clicked product into session array
                session()->put('cart', $cart);
            }
            else{
                
                $cart[$id]['quantity']--;
                //save clicked product into session array
                 session()->put('cart', $cart);
            }

        } 

        //save clicked product into session array
        session()->put('cart', $cart);

         return redirect()->back();

     }

}
