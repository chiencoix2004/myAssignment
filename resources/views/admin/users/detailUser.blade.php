@extends('admin.layouts.default')
@section('title')
    @parent
    Chi tiết người dùng
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Chi tiết người dùng</h4>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email">
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" value="{{$user->address}}" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" value="{{$user->phone}}" id="phone" name="phone">
            </div>

            <a href="{{route('admin.users.listUsers') }}" class="btn btn-success">Quay lại</a>
    </div>
@endsection
