<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Category;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //

    public function index(Request $request)
    {
        //
        // dd(' Category Index e asi');
        $category = Category::latest()->paginate(3);
        // if(isset($_GET['query'])){
        //     $search = $_GET['query'];
        //     $category = Category::where('name','LIKE',"%".$search."%")->orWhere('phone_number','LIKE',"%".$search."%")->paginate(3);
        //     return view('category.index',compact('category'));
        // }
        // else{
        //     return view('category.index',compact('category'))->with(request()->input('page'));
        // }
        
        $products = Product::with('category')->get();
        // dd($products);
        $categories = Category::with('products')->get();
        // dd($categories);
        return view('category.index',compact('products','categories'))->with(request()->input('page'));
    }
    
    public function edit(Category $category)
    {
        //Edit The Data
        // dd(' I am in Category Index');
        return view('category.edit',compact('category'));
    }
    
    public function show(Category $category)
    {
        //Show Product
        return view('category.show',compact('category'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'android_version' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')
                        ->with('success','Category created successfully.');
    }

    public function create()
    {
        return view('category.create');
    }

    public function destroy(Category $category)
    {
        //Delete the Product
        $category->delete();
        return redirect()->route('category.index')
                        ->with('success','category deleted successfully.');
    }


    public function update(Request $request, Category $category)
    {
        //Update 
        $request->validate([
            'name' => 'required',
            'android_version' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
                        ->with('success','Category updated successfully.');
    }

    

    
}
