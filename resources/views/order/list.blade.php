@extends('layouts.app')
@section('content')
<div class="container">
    <h4>Lịch sử mua hàng</h4>
    <p>Bạn sẽ xem được lịch sử mua hàng của bạn và trạng thái đơn hàng.</p>
    <div class="table-responsive">
        <table class='table table-bordered shadow'>
            <thead>
                <tr>
                    <th>{{ "Mã đơn hàng" }}</th>
                    <th>{{ "Ngày tạo hoá đơn" }}</th>
                    <th>{{ "Giá trị" }}</th>
                    <th>{{ "Ngày bị huỷ" }}</th>
                    <th>{{ "Trạng thái" }}</th>
                    <th>{{ "Hành động" }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->expiredDate }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('ui_order_detail',$order->id) }}" class='btn btn-sm btn-info'>Xem</a>
                        <a href="" class='btn btn-sm btn-success'>Thanh toán</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
            {{ $orders->links() }}
        </table>
        
    </div>
</div>
@endsection