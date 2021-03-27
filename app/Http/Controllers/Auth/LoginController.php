<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = '/trang-chu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
       $request->validate([
           'login_username' => 'required|string|max:255|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
           'login_password' => 'required|string|min:8',
       ],
       [
        'required' => 'Vui lòng nhập đầy đủ thông tin đăng nhập',
        'login_username.regex' => 'Tên đăng nhập hoặc mật khẩu sai',
        'login_password.string' => 'Tên đăng nhập hoặc mật khẩu sai',
        'login_password.min' => 'Tên đăng nhập hoặc mật khẩu sai',
       ]);
        $username = trim($request->get('login_username'));
        $password = trim($request->get('login_password'));
       if(Auth::attempt(['username' => $username, 'password' => $password])){
           session()->flash('message','Đăng nhập thành công, chào mừng quay lại');
        return redirect('trang-chu');   
       }else{
        return redirect()->back()->withErrors('Tên đăng nhập hoặc mật khẩu sai');   
       }
    }
}
