<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(5);
        return view('products.index',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories=Category::all();

         return view('products.create',compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $photo_name="none";

        if($request->file('photo')){
            $photo_name=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'),$photo_name);
        }

        Product::create([
          'name'=>$request->name,
          'category'=>$request->category,
          'price'=>$request->price,
          'photo'=>$photo_name,
          
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view('products.details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $photo_name="none";

        if($request->file('new_photo')){
            $photo_name=$request->file('new_photo')->getClientOriginalName();
            $request->file('new_photo')->move(public_path('images'),$photo_name);
        }
        else{

             $photo_name=$request->curr_photo;
        }


        $product=Product::findOrFail($id);

        $product->name=$request->name;
        $product->category=$request->category;
        $product->price=$request->price;
        $product->photo=$photo_name;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    /*
       Product Search Function
    */

       public function search(Request $request){
            $str=$request->search;

            $products=Product::where('name','LIKE','%'.$str.'%')->paginate(5);
            $products->appends(['search'=> $str]);
            

             return view('products.index',compact("products"));
    
       }


       public function updateFeature($id){

        $product=Product::findOrFail($id);
        if($product->feature==1){
           $product->recent=1;
            $product->feature=0;
        }
        else if($product->feature==0){
            $product->recent=0;
            $product->feature=1;
        }

        $product->save();

        return redirect()->back();


       }

       public function updateRecent($id){

        $product=Product::findOrFail($id);
        if($product->recent==1){
            $product->recent=0;
            $product->feature=1;
        }
        else if($product->recent==0){
            $product->recent=1;
            $product->feature=0;
        }

        $product->save();

        return redirect()->back();
       }

}
