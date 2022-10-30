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
        addToActivity(auth()->user()->id,'Vist products of brand '.$brand->name);
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
        addToActivity(auth()->user()->id,'Create New Brand that name is '.$brand->name);
        return back()->with('success','Brand created successfully');
    }

    public function edit(Brand $brand)
    {
        $title = 'Update Brand ('.$brand->name.')';
        return view('pages.brands.edit',compact('title','brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $brand->name = $request->name;
        $brand->save();
        addToActivity(auth()->user()->id,'Update Brand that name is '.$brand->name);
        return back()->with('success','Brand updated successfully');
    }

    public function delete(Brand $brand)
    {
        addToActivity(auth()->user()->id,'Delete Brand that name is '.$brand->name);
        $brand->delete();
        return back()->with('success','Brand deleted successfully');
    }
}
