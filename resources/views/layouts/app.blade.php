<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Skey Pro bản quyền siêu cấp uy tín số 1 Việt Nam') }}</title>
    {{-- Boostrap 4 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- Jquery 3.6 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('ui_invoices') }}">Quản lí đơn hàng</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Lịch sử nạp tiền</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Thông tin cá nhân</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Nạp tiền</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('register') }}">ĐĂNG KÝ</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">ĐĂNG NHẬP</a>
                    </li>
                @endguest

                @auth

                    <li class="nav-item active">
                        <a href="" class='nav-link'>Số dư {{ number_format(Auth::user()->balance, 0, ',', '.') . ' vnd' }}</a>
                    </li>
                    <li class="nav-item active">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class='nav-link btn btn-link' type='submit'>ĐĂNG XUẤT</button>
                        </form>
                    </li>
                @endauth

            </ul>

        </div>
    </nav>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Danh mục sản phẩm</h3>
                </div>
                <div class="card-body">
                    @php
                        $categories = App\Category::where('status', 'active')
                            ->where('parent_id', null)
                            ->get();
                    @endphp
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="">{{ $category->name }}</a>
                                @if ($category->getChilds() != null)
                                    <ul>
                                        @foreach ($category->getChilds() as $category_child)
                                            <li>
                                                <a href="">
                                                    {{ $category_child->name }}
                                                    @include('layouts.menu_dequy')
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                </div>
            </div>
        </div>
    </div>
    <div style='padding-top:40px'>
        <p><?php echo session()->has('message') ? session()->get('message') : ''; ?></p>
        <p style='color:red'><?php echo $errors->Any() ? $errors->first() : ''; ?></p>
        @yield('content')
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>
