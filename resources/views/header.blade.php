
<nav class="nav">
        <a href="/">Trang Chủ</a>
        <a href="/product">Sản phẩm</a>
        <a href="/about">Giới Thiệu</a>
        <a href="/contact">Liên Hệ</a>

        @auth
        <a href="{{ route('register') }}">
            {{Auth::user()->name}}
        </a>

        <a href="{{ route('logout') }}">
            Đăng Xuất
        </a>
        @endauth

        @guest
        <a href="{{ route('register') }}">Đăng ký</a>
        <a href="/login">Đăng nhập</a>
        @endguest
    </nav>
    