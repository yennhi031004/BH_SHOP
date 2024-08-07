@extends('layout')
@section('title','BHShop | Thời trang')
@section('title2','Welcome to BH shop')
@section('content')
<div class="container">
            <div class="left-box">
            <div class="form"  >
                            <form action="{{ route('search') }}" method="GET" >
                            <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input" name="query" placeholder="Search anything..." >
                        <span class="left-pan"><i class="fa fa-microphone"></i></span>
                            </form>
                     
                        </div>
                <h2>Danh Mục</h2>
                <!-- Danh sách danh mục -->
                @foreach($categories as $item)
                <a href="{{route('categories',$item->id)}}">{{ $item->name }}</a>
                  @endforeach
            </div>

            <div class="right-box">
                <div class="product-list">
                @foreach($products as $item)
                <div class="product">
                <a href="/detail/{{$item->id}}">
                <img src="{{ asset('src/img/' . $item->img) }}" alt="" /></a>
                    <h3>{{$item->name}}</h3>
                    <p>{{$item->price}}</p>
                </div>
                @endforeach
            
                </div>
                <div class="pagination">
                
                {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
@endsection
