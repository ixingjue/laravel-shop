<?php

namespace App\Services;

use App\Models\CartItem;
use Auth;

class CartService
{
    public function get()
    {
        $user = Auth::user();
        if (!$user) {
            return session()->get('sku_id');
        }
        return $user->cartItems()->with('productSku.product')->get();
    }

    public function add($skuId, $amount)
    {
        $user = Auth::user();

        // 判断是否登录
        if (!$user) {
            // 如果未登录，将数据存储 session 中
            // @fixme 解决并发情况下数据错乱的问题
            session()->push('sku_id', $skuId . '-' . $amount);
        } else {
            // 从数据库中查询该商品是否已经在购物车中
            if ($item = $user->cartItems()->where('product_sku_id', $skuId)->first()) {
                // 如果存在则直接叠加商品数量
                $item->update([
                    'amount' => $item->amount + $amount,
                ]);
            } else {
                // 否则创建一个新的购物车记录
                $item = new CartItem(['amount' => $amount]);
                $item->user()->associate($user);
                $item->productSku()->associate($skuId);
                $item->save();
            }
            return $item;
        }
    }

    /**
     * @array $skuIds
     */
    public function remove($skuIds)
    {
        $user = Auth::user();
        // 判断是否是未登录并且session有相应数值
        if (!$user) {
            // 删除session数组的值
            $tmp = session()->get('sku_id');
            foreach ($tmp as $k => $v) {
                $sku_ids = explode('-', $v);
                if (is_array($skuIds)) {
                    foreach ($skuIds as $skuId) {
                        if ($sku_ids[0] == $skuId) {
                            unset($tmp[$k]);
                        }
                    }
                } else {
                    if ($sku_ids[0] == $skuIds) {
                        unset($tmp[$k]);
                    }
                }
            }
            session()->put('sku_id', $tmp);
        } else {
            // 可以传单个 ID，也可以传 ID 数组
            if (!is_array($skuIds)) {
                $skuIds = [$skuIds];
            }
            $user->cartItems()->whereIn('product_sku_id', $skuIds)->delete();
        }
    }
}