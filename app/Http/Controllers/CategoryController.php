<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categories;


class CategoryController extends Controller
{
    public function index()
    {

        $categories = Categories::get();
        $products = Product::with('galleries')->paginate(1);

        return view('pages.categories', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Categories::where('slug', $slug)->firstOrFail();
        // $category = Categories::where('slug', $slug)->firstOrFail();
        $products = Product::where('categories_id', $categories->id)->paginate(32);

        return view('pages.details', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
