<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(5);
        return view('category.index',compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
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

        Category::create([
            'name'=>$request->name,
            'photo'=>$photo_name,
        ]);



        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $photo_name="none";
        if($request->file('new_photo')){
            $photo_name=$request->file('new_photo')->getClientoriginalName();
            $request->file('new_photo')->move(public_path('images'),$photo_name);

        }
       
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->save();

         return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index');
    }
    public function search(Request $request){
        $str=$request->search;

        $categories=Category::where('name','LIKE','%'.$str.'%')->paginate(5);
        $categories->appends(['search'=> $str]);
        

         return view('category.index',compact("categories"));

   }

}
