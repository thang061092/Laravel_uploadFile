<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->nameProduct = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->nameProduct = $request->name;
        if ($request->hasFile('image')) {
            $currentImg = $product->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
            $product->save();
            return redirect()->route('products.index');
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image= $product->image;
        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $product->delete();
        return redirect()->route('products.index');
    }

}
