@extends('layouts.app')

@section('content')
    <div class="container">
        
{{-- Get category menu theo cấp --}}
  
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $product->name }}</h3>
                        <p>Loại: {{ $product->typeOfDeliver }}</p>
                        <p>
                        <a href="{{ route('product_detail',$product->id) }}" class='btn btn-primary'>Mua</a>
                    </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
