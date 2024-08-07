@extends('layout')
@section('title','BHShop | Thời trang')
@section('title2','Giỏ Hàng')
@section('content')
<div class="container_cart ">

    @forelse($cart as $item)
        <div class="cart-item" data-product-id="1">
            <div class="product-image">
                <img src="{{asset('src/img/'. $item['product_img'])}}" alt="Product 1">
            </div>
            <div class="product-info">
                <h4>{{$item['product_name']}}</h4>
                <p>Giá: {{ $item['product_price'] }} VND</p>
            </div>
            <div class="product-actions">
            <form method="post" action="{{ route('cart.remove', $item['product_id']) }}">
                  @csrf
                  <button class="btn btn-danger btn-sm" type="submit">Xóa</button>
                </form>
                <div class="quantity">
                    <button class="decrease-btn">-</button>
                    <span class="quantity-value">1</span>
                    <button class="increase-btn">+</button>
                </div>
            </div>
        </div>
    @empty
        <div class="cart-item">
            Cart Empty
        </div>
        @endforelse

        <!-- Add more cart items as needed -->

       <a href="/bill"> <button class="continue-btn">Tiếp Tục Đặt Hàng</button></a>
       <a href="/destroy"> <button class="continue-btn">Xóa Giỏ Hàng</button></a>
    </div>
      
@endsection
