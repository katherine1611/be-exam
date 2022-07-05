<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{
    public function products(){

        try{
            $products = Product::orderBy('created_at', 'desc')->paginate(5);
            return view('products.product-index', compact('products'));
        }
        catch(\Exception $e){
        }

    }
    public function filterCategory(){
        try{
            $products = Product::orderBy('category','asc')->paginate(5);
            return view('products.product-index', compact('products'));
        }
        catch(\Exception $e){
        }
    }
    public function searchProduct(){

        if(isset($_GET['search'])){
            $search_text = $_GET['search'];

            $products = Product::where('name', 'LIKE', '%' . $search_text .'%')
            ->orWhere('description', 'LIKE', '%' . $search_text . '%')
            ->paginate(5)->appends(['search' => $search_text]);
        }
       
        return view('products.product-index', ['products' => $products]);
    }
    public function create() {
        $category = Product::all();
        return view('products.create', compact('category'));
    }
    public function store(Request $request) {

        try {

            $request->validate([
                'product_name' => 'required|max:255',
                'product_category' => 'required|max:255',
                'product_description' => 'required|max:255',
                'product_date_time' => 'required|max:255',
            ]
            );

            $product = new Product();
            $product->name = $request->input('product_name');
            $product->category = $request->get('product_category');
            $product->description = $request->input('product_description');
            $product->dateandtime = $request->input('product_date_time');

            $product->save();

            if($request->has('product_image')){
                foreach($request->file('product_image') as $image){
                    $imageName = $product->name.'-image-'.time().rand(1, 1000). '.'.$image->extension();
                    $image->move(public_path('img/product'), $imageName);
                    
                    $img = new Image();
                    $img->product_id = $product->id;
                    $img->url = $imageName;
                    $img->save();
                }
            }
            return back()->with('success', 'Product created successfully');
        }
        catch(\Exception $e){
            return back()->with('error', 'Something went wrong, try again.');
        }
    }
    public function edit($id){
        $product = Product::where('id', $id)->first();
        $productImages = Image::where('product_id', $id)->get();
        $category = Product::all();
        return view('products.edit', compact('product','productImages','category'));
    }
    public function delete($id){
        try{
            $product = Product::where('id', $id)->delete();
            return back()->with('success', 'Record deleted successfully');
        }
        catch(\Exception $e){
            return back()->with('error', 'Something went wrong, try again');
        }
    }
    public function deleteImage(Request $request) {

        try{
            $image = Image::find($request->id);
            unlink("img/product/".$image->url);
            Image::where("id", $image->id)->delete();
            return back()->with('success', 'Image deleted successfully');
        }
        catch(\Exception $e){
            return back()->with('error', 'Something went wrong, try again');
        }

    }
    public function update(Request $request, $id){
        try{

            $request->validate([
                'product_name' => 'required|max:255',
                'product_category' => 'required|max:255',
                'product_description' => 'required|max:255',
                'product_date_time' => 'required|max:255',
                ]
            );

            $product = Product::where('id', $id)->first();
            
            $product->name = $request->input('product_name');
            $product->category = $request->get('product_category');
            $product->description = $request->input('product_description');
            $product->dateandtime = $request->input('product_date_time');

            $product->push();

            if($request->has('product_image')){
                foreach($request->file('product_image') as $image){
                    $imageName = $product->name.'-image-'.time().rand(1, 1000). '.'.$image->extension();
                    $image->move(public_path('img/product'), $imageName);
                    
                    $img = new Image();
                    $img->product_id = $product->id;
                    $img->url = $imageName;
                    $img->save();
                }
            }
            return back()->with('success', 'Record updated successfully');
         
        }
        catch(\Exception $e){
            return back()->with('error', 'Something went wrong, try again');
        }
    }
}