@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4>Mô tả sản phẩm</h4>
                        <p>{!! $product->longDescription !!}</p>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>ĐẶT HÀNG</h3>
                                <p>Giao hàng tận nhà</p>
                            </div>
                            <div class="card-body">
                                @if ($product->typeOfSale == 'resell')
                                {{-- Sản phẩm bán nhiều lần --}}
                                    {{-- Phương thức giao --}}
                                    <p>
                                        @switch($product->typeOfDeliver)
                                            @case('auto')
                                            {{ 'Giao ngay lập tức' }}
                                            @break
                                            @case('manual')
                                            {{ 'Chờ giao 5-15p' }}
                                            @break
                                            @case('physical')
                                            {{ 'Giao hàng tận nhà' }}
                                            @break
                                        @endswitch
                                    </p>
                                    <form action="{{ route('product_order', $product->id) }}" method='post'>
                                        @csrf
                                        {{-- Yêu cầu buyer cung cấp thông tin --}}
                                        @if ($product->buyer_require != null)
                                            <div style='padding:5px; background: rgb(197, 244, 255)'>
                                                <label for="" style='font-weight:700'>Sản phẩm yêu cầu cung cấp thông
                                                    tin</label>
                                                <p>{!! $product->buyer_require !!}</p>
                                                <textarea class='form-control' name="buyer_note"
                                                    rows="3">{{ old('buyer_note') }}</textarea>
                                            </div>
                                        @endif
                                        {{-- Chọn số lượng + đặt hàng --}}

                                        <p>
                                        <div class="form-group">
                                            <label for="">Số lượng</label>
                                            <input type="number" name='amount' class="form-control" value='1' min='1'>
                                        </div>
                                        </p>
                                        <p><input type="text" name="voucher" class='form-control' placeholder="Mã giảm giá"></p>
                                        <p>
                                            <button style='width:100%' type='submit' class='btn btn-primary'>THANH
                                                TOÁN</button>
                                        </p>
                                    </form>


                                @elseif($product->typeOfSale == 'retail')
                                    @if ($product->countStock() < 1)
                                        <p><b>Sản phẩm tạm hết hàng bạn quay lại sau nhé!</b></p>
                                        <p><button class='btn-success'>Bấm vào đây nhận thông báo khi shop có hàng</button>
                                        </p>
                                    @else
                                        {{-- Còn hàng --}}
                                        {{-- Số lượng trong kho --}}
                                        <p>Tồn kho: {{ $product->countStock() }} sản phẩm (đã bán
                                            {{ $product->countSoldItems() }})</p>
                                        {{-- Phương thức giao --}}
                                        <p>
                                            @switch($product->typeOfDeliver)
                                                @case('auto')
                                                {{ 'Giao ngay lập tức' }}
                                                @break
                                                @case('manual')
                                                {{ 'Chờ giao 5-15p' }}
                                                @break
                                                @case('deliver')
                                                {{ 'Vận chuyển nhanh' }}
                                                @break
                                            @endswitch
                                        </p>
                                        <form action="{{ route('product_order', $product->id) }}" method='post'>
                                            @csrf
                                            {{-- Yêu cầu buyer cung cấp thông tin --}}
                                            @if ($product->buyer_require != null)
                                                <div style='padding:5px; background: rgb(197, 244, 255)'>
                                                    <label for="" style='font-weight:700'>Sản phẩm yêu cầu cung cấp thông
                                                        tin</label>
                                                    <p>{!! $product->buyer_require !!}</p>
                                                    <textarea class='form-control' name="buyer_note"
                                                        rows="3">{{ old('buyer_note') }}</textarea>
                                                </div>
                                            @endif
                                            {{-- Chọn số lượng + đặt hàng --}}

                                            <p>
                                            <div class="form-group">
                                                <label for="">Số lượng</label>
                                                <input type="number" name='amount' class="form-control" value='1' min='1'>
                                            </div>
                                            </p>
                                            <p><a href="" id='magiamgia_btn'>Có mã giảm giá?</a></p>
                                            <p>
                                                <button style='width:100%' type='submit' class='btn btn-primary'>THANH
                                                    TOÁN</button>
                                            </p>
                                        </form>

                                    @endif

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
