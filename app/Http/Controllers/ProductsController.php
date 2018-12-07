<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        //@fixme 为什么paginate默认是15个
        $products = Product::query()->where('on_sale', true)->paginate(16);
        return view('products.index', ['products' => $products]);
    }
}
