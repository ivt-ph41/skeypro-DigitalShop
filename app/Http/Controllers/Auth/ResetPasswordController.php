<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
    public function getInfo($token){
        if($token == null){
            abort(404);
        }else{
            return view('auth.passwords.reset')->with(['token'=>$token]);
        }
    }
    public function postInfo(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'email|required|exists:users',
            'password' => 'required|min:8|confirmed|string',
        ],[
            'token.required' => 'Thiếu thông tin token',
            'email.email' => 'Vui lòng nhập email chính xác',
            'email.required' => 'Cần nhập địa chỉ email',
            'email.exists' => 'Email không tồn tại',
            'password.required' => 'Bạn cần nhập mật khẩu mới',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp',
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
        ]);
        // Kiểm tra dữ liệu email token cuối cùng có khớp với token không.
            $password_reset = DB::table('password_resets')->where('email',$request->get('email'))->latest('created_at')->first();
            if($password_reset == null){
                return redirect()->back()->withErrors('Không tồn tại token này.');
            }else{
                $token = $request->get('token');
                $email = $request->get('email');
                $password = $request->get('password');

                if($token == $password_reset->token){
                    $user = User::where('email',$email)->get()->first();
                    $user->password = Hash::make($password);
                    $user->save();
                    session()->flash('message','Cập nhật mật khẩu thành công! Mời bạn đăng nhập.');
                    return redirect(route('login'));
                }else{
                    return redirect()->back()->withErrors('Token không khớp, kiểm tra lần gửi yêu cầu khôi phục cuối cùng.');
                }
            }
    }

}
