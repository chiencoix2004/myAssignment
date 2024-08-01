@extends('admin.layouts.default')
@section('title')
    @parent
    Chi tiết người dùng
@endsection
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Chi tiết người dùng</h4>
            <div class="mb-3">
                <label for="name">Name: {{$user->name}}</label>
            </div>
            <div class="mb-3">
                <label for="email">Email: {{$user->email}}</label>
            </div>
            <div class="mb-3">
                <label for="address">Address: {{$user->address}}</label>
            </div>
            <div class="mb-3">
                <label for="phone">Phone: {{$user->phone}}</label>
            </div>
            <div class="mb-3">
                <label for="phone">Vai Trò:  @if ($user->role == 1)
                    Admin
                @elseif ($user->role == 2)
                    Client
                @else
                    {{ $user->role }}
                @endif
            </label>
            </div>
            <a href="{{route('admin.users.listUsers') }}" class="btn btn-success">Quay lại</a>
    </div>
@endsection
