@extends('admin.layouts.default')
@section('title')
    @parent
    Thêm người dùng
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Thêm người dùng</h4>
        
        <form action="{{route('admin.users.addPostUsers')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>

            <button type="submit" class="btn btn-success">Thêm mới</button>
    </div>
    </form>
@endsection
