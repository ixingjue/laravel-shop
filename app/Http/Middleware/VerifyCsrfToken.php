<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // 标题是 Page Expired。在 Laravel 里 Page Expired 通常代表 Post 请求缺少 CSRF Token 或者 CSRF Token 过期
        // 由于我们这个 URL 是给支付宝服务器调用的，肯定不会有 CSRF Token，所以需要把这个 URL 加到 CSRF 白名单里：
        'payment/alipay/notify',
        // 微信支付
        'payment/wechat/notify',
        'payment/wechat/refund_notify',
    ];
}
