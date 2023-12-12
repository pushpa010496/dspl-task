<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Product $product)
    {
        $products = Product::orderby('id','desc')->get();
        return view('products.index',compact('products'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $product = Product::create([
                'product_name' => $request->product_name,
                'category_name' => $request->category_name,
            ]);
            if($product){
                return response()->json([
                    'status'=>200,
                    'message'=>'Product added successfully !',
                ]);
            }
        }
    }

    public function storeProduct(Request $request)
    {
        $valdation = $this->validate($request,[
            'product_name' => 'required',
            'category_name' => 'required',
             'image' => 'required|image|mimes:jpg,gif,jpeg|max:2048',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        $product = Product::create([
            'product_name' => $request->product_name,
            'category_name' => $request->category_name,
            'image'=> $imageName ?? '',
        ]);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Request $request)
    {
        $product = Product::find($request->id);
        if($product){
            return response()->json([
                'status'=>200,
                'data'=> $product,
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        if($request->has('image')){
            if ($product->image) {
                $existingImagePath = public_path('images') . '/' . $product->image;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
        $product->update([
            'product_name' => $request->input('product_name'),
            'category_name' => $request->input('category_name'),
            'image' => $imageName ?? '',
        ]); 
        return redirect()->route('products.index')->with('product_update', 'Product Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->delete_id);
        //dd($product);
        if ($product->image) {
            $existingImagePath = public_path('images') . '/' . $product->image;
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }
        }
        $product->delete();
        return redirect()->route("products.index")->with("product_delete","Prodcut Deleted Successfully");
    }
}
