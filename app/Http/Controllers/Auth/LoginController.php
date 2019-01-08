<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 重写 showLoginForm 方法
     * @url https://laravel-china.org/topics/16682?#reply73955
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm(Request $request)
    {
        if ($request->session()->has('url.intended')) {
            if (strpos($request->session()->get('url.intended'), '/admin')) {
                $request->session()->forget('url.intended');
            }
        }
        return view('auth.login');
    }

    /**
     * 重写 sendLoginResponse 实现未登录加入购物车
     * @url https://laravel-china.org/topics/20818?#reply77456
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $user = $request->user();
        // 读取session
        $skus = $request->session()->get('sku_id');
        // 判断 session 是否存在
        if (isset($skus)) {
            foreach ($skus as $value) {
                // 遍历数据
                $arr = explode('-', $value);
                if ($item = $user->cartItems()->where('product_sku_id', $arr[0])->first()) {
                    $item->update([
                        'amount' => $item->amount + $arr[1],
                    ]);
                } else {
                    $item = new CartItem(['amount' => $arr[1]]);
                    $item->user()->associate($user);
                    $item->productSku()->associate($arr[0]);
                    $item->save();
                }
            }
            $request->session()->forget('sku_id');
        }

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }
}
