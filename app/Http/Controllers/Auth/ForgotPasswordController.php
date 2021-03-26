<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getInfo()
    {
        return view('auth.passwords.email');
    }

    public function postInfo(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|exists:users',
                'email' => 'required|email|exists:users',
            ],
            [
                'username.required' => 'Bạn chưa nhập tên đăng nhập',
                'email.required' => 'Bạn chưa nhập email',
                'email.exists' => 'Email không tồn tại',
                'username.exists' => 'Tên đăng nhập không tồn tại',
            ]
        );

        $user = User::where('email', $request->email)->get()->first();
        if ($user->username != $request->get('username')) {
            return redirect()->back()->withErrors('Tên đăng nhập và email không khớp');
        }
        // Random token để reset mật khẩu
        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.mail', ['token' => $token], function ($message) use ($request) {
            $message->from('support@skey.pro');
            $message->to($request->email);
            $message->subject('[Skeypro] Yêu cầu khôi phục mật khẩu');
        });

        return back()->with('message', 'Chúng tôi đã gửi 1 email khôi phục đến địa chỉ email bạn đã đăng kí. Vui lòng kiểm tra tất cả hòm thư.');
    }
}
