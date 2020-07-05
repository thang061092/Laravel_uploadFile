@extends('home')

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách San Pham</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($products) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($products as $key => $product)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $product->nameProduct }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="" style="width: 200px; height: 200px">
                                @else
                                    {{'Chưa có ảnh'}}
                                @endif
                            </td>
                            <td><a href="{{route('products.edit',$product->id)}}">sửa</a></td>
                            <td><a href="{{route('products.destroy',$product->id)}}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('products.create')}}">Thêm mới</a>
        </div>
    </div>
@endsection
