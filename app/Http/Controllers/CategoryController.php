<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
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
            'phone_number' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
                        ->with('success','Category updated successfully.');
    }

    public function edit(Category $category)
    {
        //Edit The Data
        return view('category.edit',compact('category'));
    }

    public function index(Request $request)
    {
        //
        dd("I am in "); 
        $category = Category::latest()->paginate(3);
        if(isset($_GET['query'])){
            $search = $_GET['query'];
            $category = Category::where('name','LIKE',"%".$search."%")->orWhere('phone_number','LIKE',"%".$search."%")->paginate(3);
            return view('category.index',compact('category'));
        }
        else{
            return view('category.index',compact('category'))->with(request()->input('page'));
        }
    }
}
