@extends('admin.layoutadmin')
@section('titlead','Quản lý BH Shop')
@section('titlead2','Trang sản phẩm')
@section('contentad')
<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Sản Phẩm</h2>
            <form action="{{route('productadd')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <select name="category_id" id=""> 
                    <option value="1"></option>
                    @foreach ($categories as $item)

                    <option value="{{$item->id}}">{{$item->name}}</option>

                    
                    @endforeach
                </select>
            </br>
            </br>
                <input type="text" placeholder="Tên sản phẩm" name="name" >
                <input type="text" placeholder="Giá" name="price">
                <input type="file" name="img"> 
                <input type="submit" value="Thêm">
            </form>

            <!-- <form>
                <input type="text" placeholder="Tên sản phẩm">
                <input type="text" placeholder="Giá">
                <input type="file" name="product_image"> 
                <input type="submit" value="Thêm">
            </form> -->
        </div>
        <div class="col9">
            <h2>Danh Sách Sản Phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Lượt xem</th>
                        <th>Lượt bán</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td><img src="{{asset('upload/'.$p->img)}}" alt="" style="width:4rem;"></td>
                        <td>{{$p->name}}</td>
                        <td>{{number_format($p->price,0,',','.')}}VND</td>
                        <td>{{$p->view}}</td>
                        <td>{{$p->sold}}</td>
                        <td class="action-icons">
                            <a href="{{ route ('productupdateform', $p->id)}}">EDIT</a>
                            -
                            <a href="{{ route ('productdelete', $p->id)}}">DELETE</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$products->links('pagination::bootstrap-4')}}

        </div>
    </div>
</section>

@endsection