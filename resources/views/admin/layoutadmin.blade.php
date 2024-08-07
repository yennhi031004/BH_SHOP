<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('titlead')</title>
<!-- Thêm thư viện Chart.js từ CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset('ad/css/style.css')}}">
<script src="https://kit.fontawesome.com/f88525de2e.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <h1>@yield('titlead2')</h1>
</header>
@include('admin.headerad')

@yield('contentad')

</body>
</html>
