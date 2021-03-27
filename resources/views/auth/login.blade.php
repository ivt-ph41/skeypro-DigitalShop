@extends('layouts.app')

@section('content')
    <div class="page-content section">
        <!-- Start breadcume area -->
        <div class="breadcume-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb">
                            <a title="Return to Home" href="index.html" class="home"><i class="fa fa-home"></i></a>
                            <span class="navigation-pipe">&gt;</span>
                            ĐĂNG NHẬP
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcume area -->
        <!-- LOGIN-AREA START -->
        <div class="lognin-area">
            <div class="container">
                <div class="row">
                    <!-- Registered-Customers Start -->
                    <div class="col-lg-6">
                        <form action="{{ route('login') }}" method='POST' id='form_login'>
                            @csrf
                            <div class="registered-customers">
                                <h3>ĐĂNG NHẬP</h3>
                                <div class="registered">
                                    <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập.</p>
                                    @if ($errors->has('login_password'))
                                        <p style='color:red'>{{ $errors->first('login_password') }}</p>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" class="custom-form" name="login_username"
                                                placeholder="Tên đăng nhập" value='{{ old('login_username') }}' />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="password" name='login_password' class="custom-form"
                                                placeholder="Mật khẩu" />
                                        </div>
                                    </div>
                                    <p><label class="forgot"><a href="{{ route('password.getInfo') }}">Quên mật
                                                khẩu?</a></label></p>
                                    <button class="btn btnContact" id='btn_login' type="submit">ĐĂNG NHẬP</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Registered-Customers End -->
                    <div class="col-lg-6">
                        <form action="{{ route('register') }}" method='POST' id='form_register'>
                            @csrf
                            <div class="new-customers">
                                <h3>KHÁCH HÀNG MỚI</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name='username' class="custom-form" placeholder="Tên đăng nhập"
                                            value='{{ old('username') }}' />
                                        @if ($errors->has('username'))
                                            <p style='color:red'>{{ $errors->first('username') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="email" name='email' class="custom-form" placeholder="Địa chỉ email"
                                            value='{{ old('email') }}' />
                                        @if ($errors->has('email'))
                                            <p style='color:red'>{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="password" name='password' class="custom-form" placeholder="Mật khẩu" />
                                        @if ($errors->has('password'))
                                            <p style='color:red'>{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="password" name='password_confirmation' class="custom-form"
                                            placeholder="Nhập lại mật khẩu" />
                                        @if ($errors->has('password_confirmation'))
                                            <p style='color:red'>{{ $errors->first('password_confirmation') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="terms_agreement" value='1' />
                                        Bằng cách đăng kí tài khoản bạn sẽ hoàn toàn đồng ý với <a href="">ĐIỀU KHOẢN DỊCH
                                            VỤ</a> của chúng tôi.
                                    </label>
                                    @if ($errors->has('terms_agreement'))
                                        <p style='color:red'>{{ $errors->first('terms_agreement') }}</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <!-- <input type="submit" class="custom-form custom-submit no-margin" value="register" /> -->
                                        <button class="btn btnContact" id='btn_register' type="submit">ĐĂNG KÝ</button>
                                    </div>
                                    <div class="col-md-4">
                                        <!--  <input type="submit" class="custom-form custom-submit no-margin" value="clear" /> -->
                                        <button class="btn btnContact" type="button" id="reset_form">NHẬP LẠI</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN-AREA END -->
    </div>
    <script>
        $(document).ready(function() {
            $("#btn_login").click(function(event) {
                event.preventDefault;
                $("#form_login").submit();
            });
            $("#btn_register").click(function(event) {
                event.preventDefault;
                $("#form_register").submit();
            });
        });

    </script>
@endsection
