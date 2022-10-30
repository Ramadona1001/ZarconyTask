<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index'
        ]);
    }

    public function index()
    {
        $title = 'All Products';
        $products = Product::paginate(12);
        return view('pages.products.index',compact('products','title'));
    }

    public function create()
    {
        $title = 'New Product';
        $brands = Brand::all();
        return view('pages.products.create',compact('brands','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'sku' => 'required|unique:products,sku|max:255',
            'details' => 'required|min:2',
            'price' => 'required|numeric|min:0.1',
            'brand' => 'required|exists:brands,id',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->sku = $request->sku;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->brand_id = $request->brand;
        $product->save();

        return back()->with('success','Product created successfully');
    }

    public function show(Product $product)
    {
        $title = $product->title.' details';
        return view('pages.products.single',compact('product','title'));
    }

    public function edit(Product $product)
    {
        $title = 'Update Product ('.$product->title.')';
        $brands = Brand::all();
        return view('pages.products.edit',compact('title','product','brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'sku' => 'required|max:255|unique:products,sku,'.$product->id,
            'details' => 'required|min:2',
            'price' => 'required|numeric|min:0.1',
            'brand' => 'required|exists:brands,id',
        ]);

        $product->title = $request->title;
        $product->sku = $request->sku;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->brand_id = $request->brand;
        $product->save();

        return back()->with('success','Product updated successfully');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return back()->with('success','Product deleted successfully');
    }

}
