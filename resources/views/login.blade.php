
@section('title2','Đăng nhập')
@section('content')

@extends('layout')
<style>
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height:50vh; /* Chiều cao của toàn bộ trang */
}

.center-box {
    width: 50%;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    text-align: center;
}
.center-box label {
    text-align: left; /* Căn văn bản sang trái */
    display: block; /* Hiển thị văn bản trên mỗi dòng */
    margin-bottom: 10px; /* Khoảng cách giữa các dòng văn bản */
}



</style>

<div class="container">
            <div class="center-box">
                <h2>Đăng nhập</h2>

               
            <form method="POST" action="{{route('login')}}">
                @csrf
                <input type="email" name="email" placeholder="Email" >
                <input type="password" name="password" placeholder="Password" >
                <button type="submit">Đăng nhập</button>
            </form>

            </div>
        </div>
@endsection
