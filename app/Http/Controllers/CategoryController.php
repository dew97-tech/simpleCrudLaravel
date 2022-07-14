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
        $categories = Category::latest()->paginate(3);

        // ---------------------------------------------------------
        // for one to many relationship
        // $products = Product::with('category_product')->get();
        // dd($products);
        // $categories = Category::with('products')->get();
        // dd($categories);
        return view('category.index',compact('categories'))->with(request()->input('page'));
        // ---------------------------------------------------------
    }
    
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }
    
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
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
            'title' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
                        ->with('success','Category updated successfully.');
    }

    

    
}
