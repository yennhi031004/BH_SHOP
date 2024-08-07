@extends('layout')
@section('title','BHShop | Thời trang')
@section('title2','Đăng ký')
@section('content')
<div class="container">
            <div class="right-box">
                <h2>Đăng ký</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="name" placeholder="Tên" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                <button type="submit">Đăng ký</button>
            </form>

            </div>
        </div>
@endsection
<style>
     .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height:70vh; /* Chiều cao của toàn bộ trang */
}
.right-box {
    width: 200px; /* Độ rộng mới của khung đăng ký */
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    text-align: center;
}

.right-box label {
    text-align: left; /* Căn văn bản sang trái */
    display: block; /* Hiển thị văn bản trên mỗi dòng */
    margin-bottom: 10px; /* Khoảng cách giữa các dòng văn bản */
}



</style>