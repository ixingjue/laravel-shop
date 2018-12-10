<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\Request;
use App\Jobs\closeOrder;
use App\Models\Order;
use App\Models\ProductSku;
use App\Services\OrderService;
use Carbon\Carbon;
use App\Models\UserAddress;
use App\Services\CartService;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query()
            // 使用 with 方法预加载，避免N + 1问题
            ->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();
        return view('orders.index', ['orders' => $orders]);
    }

    // 利用 Laravel 的自动解析功能注入 CartService 类
    public function store(OrderRequest $request, OrderService $orderService)
    {
        //        $user = $request->user();
        //        // 开启一个数据库事务
        //        // 别忘了把 $cartService 加入 use 中
        //        $order = \DB::transaction(function () use ($user, $request, $cartService) {
        //            $address = UserAddress::find($request->input('address_id'));
        //            // 更新此地址的最后使用时间
        //            $address->update(['last_used_at' => Carbon::now()]);
        //            // 创建一个订单
        //            $order = new Order([
        //                'address' => [ // 将地址信息放入订单中
        //                    'address' => $address->full_address,
        //                    'zip' => $address->zip,
        //                    'contact_name' => $address->contact_name,
        //                    'contact_phone' => $address->contact_phone,
        //                ],
        //                'remark' => $request->input('remark'),
        //                'total_amount' => 0,
        //            ]);
        //            // 订单关联到当前用户
        //            $order->user()->associate($user);
        //            //写入数据库
        //            $order->save();
        //
        //            $totalAmount = 0;
        //            $items = $request->input('items');
        //            // 遍历用户提交的 SKU
        //            foreach ($items as $data) {
        //                $sku = ProductSku::find($data['sku_id']);
        //                // 创建一个 OrderItem 并直接与当前订单关联
        //                $item = $order->items()->make([
        //                    'amount' => $data['amount'],
        //                    'price' => $sku->price,
        //                ]);
        //                $item->product()->associate($sku->product_id);
        //                $item->productSku()->associate($sku);
        //                $item->save();
        //                $totalAmount += $sku->price * $data['amount'];
        //                if ($sku->decreaseStock($data['amount']) <= 0) {
        //                    if ($sku->decreaseStock($data['amount']) <= 0) {
        //                        throw new InvalidRequestException('该商品库存不足');
        //                    }
        //                }
        //            }
        //
        //            // 更新订单总金额
        //            $order->update(['total_amount' => $totalAmount]);
        //            // 将下单的商品从购物车中移除
        //            // $skuIds = collect($items)->pluck('sku_id');
        //            // $user->cartItems()->whereIn('product_sku_id', $skuIds)->delete();
        //            $skuIds = collect($request->input('items'))->pluck('sku_id')->all();
        //            $cartService->remove($skuIds);
        //            return $order;
        //        });
        //        $this->dispatch(new closeOrder($order, config('app.order_ttl')));
        $user = $request->user();
        $address = UserAddress::find($request->input('address_id'));
        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load('items.productSku', 'items.product')]);
    }
}