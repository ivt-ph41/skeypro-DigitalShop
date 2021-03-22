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
                @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ $invoice->expiredDate }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>
                        <a href="{{ route('ui_invoice_detail',$invoice->id) }}" class='btn btn-sm btn-info'>Xem</a>
                        <a href="" class='btn btn-sm btn-success'>Thanh toán</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
            {{ $invoices->links() }}
        </table>
        
    </div>
</div>
@endsection