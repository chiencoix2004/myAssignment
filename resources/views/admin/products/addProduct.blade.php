@extends('admin.layouts.default')
@section('title')
@parent
    Thêm sản phẩm 
@endsection
@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Thêm sản phẩm</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('admin.products.addPostProduct')}}" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="mb-3">
    <label for="name">Tên Sản Phẩm</label>
    <input type="text" class="form-control" id="name" name="name">
   </div>
   <div class="mb-3">
    <label for="price">Giá Sản Phẩm</label>
    <input type="number" class="form-control" id="price" name="price">
   </div>
   <div class="mb-3">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category">
        <option value="" disabled selected>Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->nameCategory }}</option>
        @endforeach
    </select>
</div>
   <div class="mb-3">
    <label for="view">View Sản Phẩm</label>
    <input type="number" class="form-control" id="view" name="view">
   </div>
   {{-- <div class="mb-3">
    <label for="category">Danh Mục</label>
    <select name="category" id="category" class="form-control">
        @foreach ($category as $value)
        <option value="{{$value->id}}">{{$value->nameCategory}}</option>
        @endforeach
    </select>
   </div> --}}
   <div class="mb-3">
    <label for="imageProduct">Ảnh Sản Phẩm</label>
    <input type="file" class="form-control" id="imageProduct" name="imageProduct" accept="image/*">
   </div>
   <button type="submit" class="btn btn-success">Thêm mới</button>
</div>
</form>
@endsection