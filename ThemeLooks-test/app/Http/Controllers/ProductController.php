<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->get();
        return view("products.list",compact('products'));
    }

    public function create(){
        return view("products.create");
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'color' => 'required',
            'size' => 'required',
            'price' => 'required',
        ]);

       
        $product = new Product();
        $product->name = $request->name;
        $product->gender = $request->gender;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.index')->with("success_message","Product has been Successfull!");
    }

    public function edit($id){
        
        $product = Product::find($id);
        // dd($product);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        
           
           $product = Product::find($id);

           // Validation Data
           $request->validate([
            'name' => 'required|max:50',
            'color' => 'required',
            'size' => 'required',
            'price' => 'required',
           ]);
   
   
            $product->name = $request->name;
            $product->gender = $request->gender;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->price = $request->price;
            
            $product->save();
               
           return redirect('admin/products')->with("success_message","Product has been updated !");
    }
    public function destroy($id){
         
        Product::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Product has been deleted Successfully!");
    }
}
