<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //This method will show products page
    public function index(){
        $products=Product::orderBy('created_at','DESC')->get();
        return view('products.list',[
            'products'=>$products
        ]);
    }

    //This method will show create products page
    public function create(){
        return view('products.create');
        
    }

    //This method will insert a product in db
    public function store(Request $request){
        $rules = [
            'name'=>'required|min:4|max:20',
            'sku'=>'required|min:3|max:20',
            'price'=>'required|numeric',
        ];
        if ($request->image !="") {
            $rules['image']='image';
        }
        
        $validator=Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        //Code for inserting product in DB
        $product=new Product();
        $product->name=$request->name;
        $product->sku=$request->sku;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->save();

        //Storing image
        if ($request->image !="") {
            //Setting unique image name
            $image=$request->image;
            $ext=$image->getClientOriginalExtension();
            $imageName=time().'.'.$ext; //unique image name

            // save image to products directory
            $image->move(public_path('uploads/products'),$imageName);

            //Save image name in DB
            $product->image=$imageName;
            $product->save();

        }
        
        return redirect()->route('products.index')->with('success','Product added successfully');
    }

    //This method will show edit product page
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit',[
            'product'=>$product
        ]);
    }

    //This method will update a product
    public function update($id, Request $request){
        $product = Product::findOrFail($id);
        $rules = [
            'name'=>'required|min:4|max:20',
            'sku'=>'required|min:3|max:20',
            'price'=>'required|numeric',
        ];
        if ($request->image !="") {
            $rules['image']='image';
        }
        
        $validator=Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
        }

        //Code for inserting product in DB
        $product->name=$request->name;
        $product->sku=$request->sku;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->save();

        //Storing image
        if ($request->image !="") {
            // delete old image
            File::delete(public_path('uploads/products/'.$product->image));
            //Setting unique image name
            $image=$request->image;
            $ext=$image->getClientOriginalExtension();
            $imageName=time().'.'.$ext; //unique image name

            // save image to products directory
            $image->move(public_path('uploads/products'),$imageName);

            //Save image name in DB
            $product->image=$imageName;
            $product->save();

        }

        return redirect()->route('products.index')->with('success','Product updated successfully');
    }
        
    

    //This method will delete a product
    public function destroy($id){
        $product = Product::findOrFail($id);

        //delete image
        File::delete(public_path('uploads/products/'.$product->image));

        //delete product from database
        $product->delete();
        
        return redirect()->route('products.index')->with('success','Product Deleted successfully');
        
    }
}
