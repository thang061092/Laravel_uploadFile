@extends('home')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới san pham</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name Product</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label >Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
