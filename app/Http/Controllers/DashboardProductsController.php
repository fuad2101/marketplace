<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use App\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries', 'categories'])->where('users_id', Auth::user()->id)->get();

        return view('pages.dashboard-products', [
            'products' => $products,
        ]);
    }
    public function detail($id)
    {
        $products = Product::with('categories', 'galleries')->findOrFail($id);
        $categories = Categories::all();
        return view('pages.dashboard-products-details', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function create()
    {
        $category = Categories::all();
        return view('pages.dashboard-products-create', [
            'categories' => $category,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        // dd($data);

        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photos')->store('assets/photos', 'public'),
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-products');
    }
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id);
        $data = $request->except(['_token']);
        $data['slug'] = Str::slug($request->name);


        $product->update($data);

        // $gallery = [
        //     'products_id' => $product->id,
        //     'photos' => $request->file('photos')->store('assets/photos', 'public'),
        // ];

        // ProductGallery::create($gallery);

        return redirect()->route('dashboard-products');
    }
    public function deleteGallery(Request $request, $id)
    {
        $gallery = ProductGallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('dashboard-product-details', $gallery->products_id);
    }
    public function uploadGallery(Request $request)
    {
        $data = [
            'photos' => $request->file('photos')->store('assets/photos', 'public'),
            'products_id' => $request->products_id,
        ];

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }
}
