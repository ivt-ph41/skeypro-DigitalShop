@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Hoá đơn và giao hàng
                            @switch($order->status)
                                @case('paid')
                                <span style='float:right' class='badge badge-success'>Hoàn thành</span>
                                @break
                                @case('pending')
                                <span style='float:right' class='badge badge-warning'>Chờ xử lí</span>
                                @break
                                @case('delivering')
                                <span style='float:right' class='badge badge-warning'>Đang giao hàng</span>
                                @break
                                @case('cancel')
                                <span style='float:right' class='badge badge-danger'>Đã huỷ</span>
                                @break
                            @endswitch
                        </h3>
                    </div>
                    <div class="card-body">
                        <h4>Thông tin hoá đơn số #{{ $order->id }}</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <td>Tiêu đề</td>
                                                <td>Nội dung</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style='font-weight=700'>Người tạo</td>
                                                <td>{{ $order->creator }}</td>
                                            </tr>
                                            <tr>
                                                <td style='font-weight=700'>Khách ghi chú</td>
                                                <td>{!! $order->buyer_note !!}</td>
                                            </tr>
                                            <tr>
                                                <td style='font-weight=700'>Admin ghi chú</td>
                                                <td>{!! $order->admin_note !!}</td>
                                            </tr>
                                            <tr>
                                                <td style='font-weight=700'>Thời gian</td>
                                                <td>{!! $order->created_at !!}</td>
                                            </tr>
                                            <tr>
                                                <td style='font-weight=700'>Thời gian thanh toán</td>
                                                <td>{!! $order->paidDate !!}</td>
                                            </tr>
                                            <tr>
                                                <td style='font-weight=700'>Sản phẩm</td>
                                                <td>
                                                    @foreach ($order->products as $product)
                                                        - {{ $product->name }} / số lượng: {{ $product->pivot->amount }}
                                                        / đơn giá: {{ $product->pivot->unitPrice }} <br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='font-weight=700'>Tổng hoá đơn</td>
                                                <td>{{ number_format($order->total, 0, ',', '.') . ' vnd' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>Sản phẩm</h4>
                        <div class="card">
                            <div class="card-body" style='background: #d8d8d89e;font-weight: 700;'>
                                @foreach ($order->items() as $item)
                                    <p>{{ $item->item }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-header">
                    <h3>Trợ giúp & báo lỗi</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <p>
                            <label for="">Báo lỗi sản phẩm</label>
                            <textarea name="noidung" class='form-control' rows="6"></textarea>
                        </p>
                        <p>
                            <button type='submit' class='btn btn-primary'>GỬI</button>
                        </p>
                    </form>
                    <hr>
                    <p> <a href="">Hướng dẫn sử dụng sản phẩm</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
