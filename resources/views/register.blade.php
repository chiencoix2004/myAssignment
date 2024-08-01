@extends('client.layouts.default')
@section('content')
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <br>
                    <br>
                    <div class="card">
                        <div style="text-align: center">
                            <h2>Register</h2>
                        </div>
                        <div class="card-body">
                            @if (session('message'))
                                <p class="text-danger">{{ session('message') }}</p>
                            @endif
                            <form action="{{ route('postRegister') }}" method="POST">
                                @csrf
                                <label for=""></label>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="name" class="form-control" name="name" id="name"
                                        placeholder="name">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password_Confirmation</label>
                                    <input type="password_confirmation" class="form-control" name="password_confirmation" 
                                    id="password_confirmation"
                                        placeholder="password_confirmation">
                                        @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-block">Đăng Ký</button>
                            </form>
                            <br>
                            <div class="card-footer text-center">
                                <a class="btn btn-danger" href="{{ route('login') }}">Đăng Nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
