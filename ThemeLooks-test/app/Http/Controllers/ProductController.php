<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;

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
        ]);

       
        $product = new Product();
        $product->name = $request->name;
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
           ]);
   
   
            $product->name = $request->name;
            $product->save();
               
           return redirect('admin/products')->with("success_message","Product has been updated !");
    }
    public function destroy($id){
         
        Product::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Product has been deleted Successfully!");
    }


    public function attribute($id){

        $product = Product::find($id);
        $attributes = ProductAttribute::where('product_id',$id)->orderBy('id','DESC')->get();
        return view("products.attribute",compact('product','attributes'));

    }

    public function addProductAttribute(Request $request, $id){
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            foreach ($data['size'] as $key => $value) {
                if(!empty($value)){

                    // $attrCountSize = ProductAttribute::where(['size'=> $value])->count();
                    // if($attrCountSize > 0){
                    //     return redirect()->back()->with('error_message','size already exits. please add another size');
                    // }

                    $attrCountSize = ProductAttribute::where(["product_id"=>$id,'size'=> $data['size'][$key]])->count();
                    if($attrCountSize > 0){
                        return redirect()->back()->with('error_message','Size already exits. please add another Size');
                    }

                    $attribute = new  ProductAttribute;
                    $attribute->product_id = $id;
                    $attribute->gender = $data['gender'][$key];
                    $attribute->color = $data['color'][$key];
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->save();
                }
            }

            return redirect()->back()->with('success_message','Product Attribute added has ben Successfully!');
        }
    }

    public function deleteAttribute($id){
        ProductAttribute::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Attribute has been deleted Successfully!");
    }
}
