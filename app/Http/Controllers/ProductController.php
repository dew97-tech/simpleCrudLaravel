<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //
        
        $products = Product::latest()->paginate(3);
        if(isset($_GET['query'])){
            $search = $_GET['query'];
            // $products = Product::with('category')->find($search)->get();
            $products = Product::where('name','LIKE',"%".$search."%")->orWhere('id','LIKE',"%".$search."%")->paginate(3);
            // $products = Product::find($search);
            return view('products.index',compact('products'));
        }
        else{
            
            // // dd($products);
            return view('products.index',compact('products'))->with(request()->input('page'));
        }
        
        
        
        
        
        // return view('products.index',compact('products'))->with(request()->input('page'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Product::create([
        //     'name' => $request->name,
        //     'price'=>$request->price,
        //     // 'category_id' => $request->category_id,       
        // ]);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            // 'details' => 'required',
            'category_id' => 'required',       
        ]);
        
        $product = new Product();

        $product ->name = $request->input('name');
        $product ->price = $request->input('price');

        $ck=$product->save(); 
        // dd($product) ;

        

         
        
        $product->categories()->attach($request->input('category_id'));
        
        
        
        
        
        
        // return view('products.index',compact('products'))->with(request()->input('page'));
        return redirect()->route('products.index',compact('product'))
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //Show Product
        return view('products.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //Edit The Data
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Update 
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            // 'category_id' => 'required',
            // 'details' => 'required',
            // 'category_id' => 'required',
            
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //Delete the Product
        $product->categories()->detach();
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully.');
    }
    
}
// Check if route is :
    