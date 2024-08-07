@extends('layout')
@section('title','BHShop | Thời trang')
@section('title2','Welcome to BH shop')
@section('content')
<div class="container">
            <h2>Sản Phẩm Mới</h2>
            <div class="product-box">
                @foreach($products as $item)
                <div class="product">
                <a href="/detail/{{$item->id}}">
                <img src="{{ asset('src/img/' . $item->img) }}" alt="" /></a>
                    <h3>{{$item->name}}</h3>
                    <p>{{ number_format($item->price,3,',','.').'VND' }}</p>
                </div>
                @endforeach
            
            </div>
            <h2>Sản Phẩm Xem nhiều</h2>
            <div class="product-box">
                @foreach($productsview as $view)
                <div class="product">
                    <a href="/product">
                    <img src="{{ asset('src/img/' . $view->img) }}" alt="" /></a>
                    <h3>{{$view->name}}</h3>
                    <p>{{ number_format($view->price,3,',','.').'VND' }}</p>
                </div>
                @endforeach
             
            <!-- </div>
            {{$pagina->links('pagination::bootstrap-4')}}
        </div> -->
@endsection
