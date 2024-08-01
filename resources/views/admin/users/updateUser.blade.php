@extends('admin.layouts.default')
@section('title')
    @parent
    Update người dùng
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Update người dùng</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.users.updatePostUser')}}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{$users->id}}">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{$users->name}}" name="name">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{$users->email}}" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password Old</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
            </div>
            <div class="mb-3">
                <label for="password">Password New</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" value="{{$users->address}}" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" value="{{$users->phone}}" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="role">Role</label>
                <input type="number" class="form-control" value="{{$users->role}}" id="role" name="role">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
    </div>
    </form>
@endsection
