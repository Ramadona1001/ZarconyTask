<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index',
            'products'
        ]);
    }

    public function index()
    {
        $title = 'All Brands';
        $brands = Brand::paginate(12);
        return view('pages.brands.index',compact('brands','title'));
    }

    public function products(Brand $brand)
    {
        $title = 'Brand ('.$brand->name.') Products';
        $products = Product::where('brand_id',$brand->id)->paginate(12);
        return view('pages.brands.products',compact('products','title'));
    }

    public function create()
    {
        $title = 'New Brand';
        return view('pages.brands.create',compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        return back()->with('success','Brand created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
