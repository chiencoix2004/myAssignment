@extends('admin.layouts.default')
@section('title')
    @parent
    Sửa sản phẩm
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Sửa sản phẩm</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.products.updatePostProduct', $products->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" value="{{ $products->name }}" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="price">Giá Sản Phẩm</label>
                <input type="text" class="form-control" value="{{ $products->price }}" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="view">View Sản Phẩm</label>
                <input type="number" class="form-control" name="view" id="view" value="{{ $products->view }}">
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $value)
                        <option @if ($products->category_id === $value->id) @selected(true) @endif
                            value="{{ $value->id }}">{{ $value->nameCategory }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="imageProduct">Ảnh Sản Phẩm</label>
                <input type="file" class="form-control" id="imageProduct" name="imageProduct" accept="image/*">

            </div>
            <div class="mb-3">
                <img class="" width="150px" height="150px" src="{{ asset($products->image) }}" alt="">
            </div>

            <button type="submit" class="btn btn-success">Sửa</button>
    </div>
    </form>
@endsection
