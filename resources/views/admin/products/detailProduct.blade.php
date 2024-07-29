@extends('admin.layouts.default')
@section('title')
@parent
Chi tiết sản phẩm 
@endsection
@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Chi tiết sản phẩm</h4>

   <div class="mb-3">
    <label for="name">Tên Sản Phẩm: <b>{{$products->name}}</b></label>
   </div>
   <div class="mb-3">
    <label for="price">Giá Sản Phẩm: <b>{{$products->price}}</b></label>
   </div>
   <div class="mb-3">
    <label for="price">View Sản Phẩm: <b>{{$products->view}}</b></label>
   </div>
   <div class="mb-3">
    <label for="imageProduct">Ảnh Sản Phẩm</label>
    <img src="{{asset($products->image)}}" alt="">
   </div>
   <a href="{{route('admin.products.listProducts') }}" class="btn btn-success">Quay lại</a>
</div>
@endsection