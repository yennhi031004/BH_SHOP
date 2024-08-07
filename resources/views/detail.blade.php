@extends('layout')
@section('title','BHShop | Thời trang')
@section('title2','Welcome to BH shop')
@section('content')
<div class="container_cart">
    <div class="product-detail">
        <div class="product-image">
            <img src="{{ asset('src/img/' . $getDetail->img) }}" alt="Product 1">
        </div>
        <div class="product-info">
            <h2>{{$getDetail->name}}</h2>
            <p>{{$getDetail->description}}</p>
            <p>Giá:{{ number_format($getDetail->price,3,',','.').'VND' }}</p>

            <form action="{{ route('add') }}" method="POST">
                <input type="number" name="quantity" value="1" min="1" />
                @csrf
                <input type="hidden" name="name" value="{{ $getDetail->name }}" />
                <input type="hidden" name="product_img" value="{{ $getDetail->img }}" />
                <input type="hidden" name="product_id" value="{{ $getDetail->id }}" />
                <input type="hidden" name="product_price" value="{{ $getDetail->price }}" />
                <button type="submit" class="order-button">Đặt Hàng</button>
            </form>
        </div>
    </div>

    <div class="related-products">
        <h3>Sản Phẩm Liên Quan</h3>
        @foreach($products as $item)
        <div class="product">
            <div class="product-image">
                <img src="{{ asset('src/img/' . $item->img) }}" alt="Product 2">
            </div>
            <div class="product-info">
                <h4>{{$item->name}}</h4>
                <p>Giá:{{ number_format($item->price,3,',','.').'VND' }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
