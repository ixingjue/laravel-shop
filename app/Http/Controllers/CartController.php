<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Http\Requests\Request;
use App\Models\ProductSku;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    // 利用 Laravel 的自动解析功能注入 CartService 类
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function add(AddCartRequest $request)
    {
        $this->cartService->add($request->input('sku_id'), $request->input('amount'));
        return [];
    }

    public function index(Request $request)
    {
        //$cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();
        $cartItems = $this->cartService->get();
        $user = $request->user();
        if ($user) {
            $addresses = $user->addresses()->orderBy('last_used_at', 'desc')->get();
        } else {
            $addresses = [];
        }
        return view('cart.index', ['cartItems' => $cartItems, 'addresses' => $addresses]);
    }

    public function remove(ProductSku $sku, Request $request)
    {
        //@fixme https://laravel-china.org/topics/20615
        //$request->user()->cartItems()->where('product_sku_id', $sku->id)->delete();
        $this->cartService->remove($sku->id);
        return [];
    }
}
